<?php
include_once 'app.php';
if(!$sessionService->isLogged()){
    header('location:login.php');
}
$crudService = new \ForumServices\CrudServices\CrudService($db);
$questions = $crudService->listAllQuestions();

$viewsRenderer->renderView('all_questions_view',$questions);
