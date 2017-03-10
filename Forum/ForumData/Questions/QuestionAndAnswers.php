<?php


namespace ForumData\Questions;


class QuestionAndAnswers
{
    private $question;
    private $AllAnswers;


    public function getQuestion()
    {
        return $this->question;
    }
    public function setQuestion($question)
    {
        $this->question = $question;
    }


    public function getAllAnswers()
    {
        return $this->AllAnswers;
    }
    public function setAllAnswers($AllAnswers)
    {
        $this->AllAnswers = $AllAnswers;
    }


}