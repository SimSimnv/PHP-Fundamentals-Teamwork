<?php
include_once 'app.php';
$crudService = new \ForumServices\CrudServices\CrudService($db);
$questions = $crudService->listAllQuestions();
$viewsRenderer->renderView('all_questions_view',$questions, $crudService);
