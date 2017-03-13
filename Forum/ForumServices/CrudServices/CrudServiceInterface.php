<?php

namespace ForumServices\CrudServices;

interface CrudServiceInterface
{
    public function askQuestion($title,$body,$userId,$tagsString=null);

    public function addTagsToQuestion(string $tagsString, $questionId);

    public function listAllQuestions();

    public function listQuestionsByPage(int $page);

    public function getMaxPage():int;

    public function answerQuestion(string $questionId, string $author, string $email, string $body);

    public function listQuestionDetails(string $questionId);

    public function cutLongText(string $string, int $length = 100);

}