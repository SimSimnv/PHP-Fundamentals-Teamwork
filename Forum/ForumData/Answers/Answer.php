<?php


namespace ForumData\Answers;


class Answer
{
    private $id;
    private $author;
    private $email;
    private $body;
    private $question_id;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }


    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getBody()
    {
        return $this->body;
    }
    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getQuestionId()
    {
        return $this->question_id;
    }
    public function setQuestionId($question_id)
    {
        $this->question_id = $question_id;
    }

}