<?php

namespace ForumServices\CrudServices;

interface CrudServiceInterface
{
    public function askQuestion($title,$body,$userId);

    public function listAllQuestions();
}