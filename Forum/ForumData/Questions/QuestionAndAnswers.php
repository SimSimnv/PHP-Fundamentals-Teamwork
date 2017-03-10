<?php


namespace ForumData\Questions;

use ForumData\Answers\Answer;

class QuestionAndAnswers
{
    private $question;
    private $AllAnswers;
    private $numberOfRowsAffected;

    /**
     * @return Question
     */

    public function getQuestion()
    {
        return $this->question;
    }
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return Answer[]
     */

    public function getAllAnswers()
    {
        return $this->AllAnswers;
    }

    /**
     * @param callable $answers
     */

    public function setAllAnswers(callable $answers)
    {
        $this->AllAnswers = $answers();
    }

    /**
     * @param mixed $numberOfRowsAffected
     */
    public function setNumberOfRowsAffected($numberOfRowsAffected)
    {
        $this->numberOfRowsAffected = $numberOfRowsAffected;
    }

    public function areThereAnyAnswers()
    {
        return $this->numberOfRowsAffected == 0 ? false : true ;
    }






}