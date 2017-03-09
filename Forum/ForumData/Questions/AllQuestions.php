<?php
/**
 * Created by PhpStorm.
 * User: zotak
 * Date: 3/9/2017
 * Time: 5:27 PM
 */

namespace ForumData\Questions;


class AllQuestions
{
    /**
     * @var $questions Question[]|\Generator
     */

    private $questions;

    /**
     * @var $questions Question[]|\Generator
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * @param callable $questions
     */
    public function setQuestions(callable $questions)
    {
        $generator = $questions();
        $this->questions = $generator;
    }

    public function addQuestion($question)
    {
        $this->questions[] = $question;
    }

}