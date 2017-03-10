<?php


namespace ForumData\Answers;


class AllAnswers
{
    /**
     * @var $answers Answer[]|\Generator
     */

    private $answers;

    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * @param callable $answers
     */
    public function setAnswers(callable $answers)
    {

        $this->answers = $answers();
    }

    public function addAnswer($answer)
    {
        $this->answers[] = $answer;
    }
}