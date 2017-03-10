<?php
include 'app.php';
if(!isset($_GET['id'])){
    header("Location: all_questions.php");
    exit;
}

$crudService=new \ForumServices\CrudServices\CrudService($db);

if(isset($_POST['answerQuestion']) && !empty($_POST['body'])){


    $crudService->answerQuestion($_GET['id'], $_POST['author'], $_POST['email'], $_POST['body']);
}

$questionDetails=$crudService->listQuestionDetails($_GET['id']);
$viewsRenderer->renderView('question_view',$questionDetails);