<?php

namespace ForumServices\CrudServices;

use ForumCore\ForumException;
use ForumData\Answers\AllAnswers;
use ForumData\Answers\Answer;
use ForumData\Questions\AllQuestions;
use ForumData\Questions\Question;
use ForumData\Questions\QuestionAndAnswers;
use ForumData\Tags\Tag;
use ForumServices\CrudServices\CrudServiceInterface;
use ForumAdapter\DatabaseInterface;
use ForumServices\SessionServices\SessionService;

class CrudService implements CrudServiceInterface
{
    /* @var DatabaseInterface*/
    private $db;
    private $sessionService;

    public function __construct(DatabaseInterface $db, SessionService $sessionService = null)
    {
        $this->db=$db;
        $this->sessionService = $sessionService;
    }

    public function askQuestion($title, $body, $userId, $tagsString=null)
    {
        $stmt = $this->db->prepare('INSERT INTO questions (title,body,user_id) VALUES (?,?,?)');
        $stmt->execute([$title,$body,$userId]);

        $questionId=$this->db->lastInsertId();
        $this->addTagsToQuestion($tagsString,$questionId);
    }

    public function addTagsToQuestion(string $tagsString, $questionId)
    {
        $tagsString=strtolower($tagsString);
        $tagsArr = preg_split('/,/', $tagsString, NULL, PREG_SPLIT_NO_EMPTY);
        $tagsArr=array_filter(array_map('trim',$tagsArr),function($tag){
            return $tag!='';
        });

        foreach ($tagsArr as $tag){
            //creating tags that don't exist
            $stmt=$this->db->prepare("INSERT INTO tags (`name`) VALUES (?) ON DUPLICATE KEY UPDATE tags.name = ?;");
            $stmt->execute([$tag,$tag]);

            //inserting question and tag id to intermediate table
            $questionsTagsQuery="
            REPLACE INTO 
              questions_tags 
                (`question_id`,`tag_id`) 
            VALUES 
            (?,
                (
                    SELECT 
                        tags.id
                        FROM
                        tags
                    WHERE 
                        tags.name=?
                )
            );
            ";
            $QtStatement=$this->db->prepare($questionsTagsQuery);
            $QtStatement->execute([$questionId,$tag]);
        }
    }

    private function listQuestions($limitQuery=null){
        $allQuestions = new AllQuestions();
        $questionsQuery="
          SELECT 
            questions.id, 
            questions.title, 
            questions.body,
            questions.user_id,
            users.username,
            questions.views
          FROM 
            questions
          INNER JOIN 
            users
          ON 
            questions.user_id = users.id
          WHERE deleted_on IS NULL
          ORDER BY questions.id DESC
         ";

        if($limitQuery!==null){
            $questionsQuery.=$limitQuery;
        }

        $stmt = $this->db->prepare($questionsQuery);
        $stmt->execute();

        $questions = function () use ($stmt) {
            while ($question = $stmt->fetchObject(Question::class)){
                /* @var $question Question*/
                $tags=$this->listTagsByQuestionId($question->getId());
                $question->setTags($tags);

                yield $question;
            }
        };
        $allQuestions->setQuestions($questions);

        return $allQuestions;
    }

    public function listAllQuestions()
    {
        return $this->listQuestions();
    }

    public function listQuestionsByPage(int $page)
    {
        $maxPage=$this->getMaxPage();
        if($page>$maxPage){
            $page=$maxPage;
        }

        $page--;
        if($page<0){
            $page=0;
        }
        $page*=5;

        $limitQuery="LIMIT {$page} , 5";
        return $this->listQuestions($limitQuery);
    }

    public function listTagsByQuestionId($questionId)
    {
        $tagsQuery="
            SELECT 
              tags.name
            FROM
              tags
            INNER JOIN
              questions_tags
            ON
              tags.id=questions_tags.tag_id
            WHERE
             questions_tags.question_id=?";
        $stmt=$this->db->prepare($tagsQuery);
        $stmt->execute([$questionId]);
        $tags = function () use ($stmt) {
            while ($tag = $stmt->fetchObject(Tag::class)){
                yield $tag;
            }
        };
        return $tags;
    }

    public function getMaxPage(): int
    {
        $stmt=$this->db->prepare("SELECT COUNT(*) FROM questions WHERE deleted_on IS NULL");
        $stmt->execute();
        $totalEntries=$stmt->fetch()['COUNT(*)'];
        return ceil($totalEntries/5);
    }

    public function getCurrentPage():int{
        return intval(isset($_GET['page'])?$_GET['page']:1);
    }

    public function answerQuestion(string $questionId, string $author, string $email, string $body)
    {

        $answerQuery="
            INSERT INTO 
            answers
            (author,email,body,question_id) 
            VALUES
            (?,?,?,?)";
        $stmt=$this->db->prepare($answerQuery);
        $result=$stmt->execute([$author,$email,$body,$questionId]);
        if($result===false){
            throw new ForumException("Invalid answer");
        }
    }

    public function listQuestionDetails(string $questionId)
    {
        /* @var $allAnswers QuestionAndAnswers*/
        $allAnswers=new QuestionAndAnswers();

        $answersQuery="
        SELECT 
        *
        FROM
        answers
        WHERE
        question_id=?
        ORDER BY id DESC
        ";

        $questionQuery="
            SELECT 
            q.id,
            q.title,
            q.body,
            u.username
            FROM
            questions AS q
            INNER JOIN 
            users AS u ON
            u.id=q.user_id
            WHERE
            q.id=?
            AND deleted_on IS NULL
            ";

        $questionStmt=$this->db->prepare($questionQuery);
        $questionStmt->execute([$questionId]);
        $question=$questionStmt->fetchObject(Question::class);
        if($question===false){
            $this->sessionService->setMessage('Question request failed','error');
            $this->sessionService->redirect('all_questions.php');
        }

        $stmt=$this->db->prepare($answersQuery);
        $stmt->execute([$questionId]);
        $numberOfRowsAffected = $stmt->rowCount();
        $allAnswers->setNumberOfRowsAffected($numberOfRowsAffected);

        $answers = function () use ($stmt) {
            while ($answer = $stmt->fetchObject(Answer::class)){
                yield $answer;
            }
        };

        $allAnswers->setAllAnswers($answers);
        $allAnswers->setQuestion($question);
        /** @var $question Question*/
        $tags=$this->listTagsByQuestionId($question->getId());
        $question->setTags($tags);

        $this->increaseQuestionViews($questionId);

        return $allAnswers;

    }

    public function listQuestionDetailsByTitle(string $title)
    {
        /* @var $allAnswers QuestionAndAnswers*/
        $allAnswers=new QuestionAndAnswers();

        $answersQuery="
        SELECT 
        *
        FROM
        answers
        WHERE
        question_id=?";

        $questionQuery="
            SELECT 
            id,
            title,
            body
            FROM
            questions 
            WHERE
            title LIKE ?
            AND deleted_on IS NULL
            ";

        $questionStmt=$this->db->prepare($questionQuery);
        $questionStmt->execute(["%$title%"]);
        /**
         * @var $question Question
         */
        $question=$questionStmt->fetchObject(Question::class);
        if($question === false){
            return false;
        }
        $id = $question->getId();
        $stmt=$this->db->prepare($answersQuery);
        $stmt->execute([$id]);
        $numberOfRowsAffected = $stmt->rowCount();
        $allAnswers->setNumberOfRowsAffected($numberOfRowsAffected);

        $answers = function () use ($stmt) {
            while ($answer = $stmt->fetchObject(Answer::class)){
                yield $answer;
            }
        };

        $allAnswers->setAllAnswers($answers);
        $allAnswers->setQuestion($question);

        $this->increaseQuestionViews($id);

        return $allAnswers;

    }

    public function cutLongText(string $string, int $length = 100)
    {
        if(strlen($string) > 100)
            return substr($string, 0, $length) . '...';
        return $string;
    }

    public function questionsCount()
    {
        return $this->db->lastInsertId();
    }

    private function increaseQuestionViews($questionId)
    {
        $query="UPDATE questions SET views=views+1 WHERE id=?";
        $stmt=$this->db->prepare($query);
        $stmt->execute([$questionId]);
    }

    public function editQuestion($title, $body, $id)
    {
        $query = 'UPDATE questions SET title = ?, body = ? WHERE id = ?;';
        $stmt = $this->db->prepare($query);
        $stmt->execute([$title,$body,$id]);
    }

    public function deleteQuestion($id)
    {
        $query = 'UPDATE questions SET deleted_on=NOW() WHERE id = ?;';
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
    }


}