<?php

namespace ForumServices\CrudServices;

use ForumData\Answers\AllAnswers;
use ForumData\Answers\Answer;
use ForumData\Questions\AllQuestions;
use ForumData\Questions\Question;
use ForumData\Questions\QuestionAndAnswers;
use ForumServices\CrudServices\CrudServiceInterface;
use ForumAdapter\DatabaseInterface;

class CrudService implements CrudServiceInterface
{
    /* @var DatabaseInterface*/
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db=$db;
    }

    public function askQuestion($title, $body, $userId)
    {
        $stmt = $this->db->prepare('INSERT INTO questions (title,body,user_id) VALUES (?,?,?)');
        $stmt->execute([$title,$body,$userId]);
    }

    public function listAllQuestions()
    {
        $allQuestions = new AllQuestions();
        $stmt = $this->db->prepare('SELECT 
questions.id, 
questions.title, 
questions.body,
questions.user_id,
users.username
FROM 
questions
INNER JOIN 
users
ON 
questions.user_id = users.id;
');
        $stmt->execute();
        $questions = function () use ($stmt) {
            while ($question = $stmt->fetchObject(Question::class)){
                yield $question;
            }
        };
        $allQuestions->setQuestions($questions);

        return $allQuestions;

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
            throw new \Exception("Invalid answer");
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
        question_id=?";

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
            q.id=?";

        $questionStmt=$this->db->prepare($questionQuery);
        $questionStmt->execute([$questionId]);
        $question=$questionStmt->fetchObject(Question::class);


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

        return $allAnswers;

    }
    public function cutLongText(string $string, int $length = 100)
    {
        if(strlen($string) > 100)
            return substr($string, 0, $length) . '...';
        return $string;
    }
}