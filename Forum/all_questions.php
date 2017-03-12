<?php
include_once 'app.php';
$crudService = new \ForumServices\CrudServices\CrudService($db);

$page=$crudService->getCurrentPage();

$questions = $crudService->listQuestionsByPage($page);
$viewsRenderer->renderView('all_questions_view',$questions, $crudService);
