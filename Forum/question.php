<?php
require_once 'app.php';
if(!isset($_GET['id'])){
    header("Location: all_questions.php");
    exit;
}

$crudService=new \ForumServices\CrudServices\CrudService($db);
$id = $_GET['id'];
if(isset($_POST['answerQuestion']) && !empty($_POST['body'])){
    $crudService->answerQuestion($id, $_POST['author'], $_POST['email'], $_POST['body']);
}
$questionDetails=$crudService->listQuestionDetails($id);
$viewsRenderer->renderView('question_view',$questionDetails);
