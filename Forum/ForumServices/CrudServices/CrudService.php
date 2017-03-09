<?php

namespace ForumServices\CrudServices;

use ForumData\Questions\AllQuestions;
use ForumData\Questions\Question;
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
}