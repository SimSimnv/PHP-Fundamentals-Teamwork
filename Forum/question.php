<?php
require_once 'app.php';
if(!isset($_GET['id'])){
    $sessionService->setMessage('Don\'t try this at home.','error');
    $sessionService->redirect('all_questions.php');
}

$crudService=new \ForumServices\CrudServices\CrudService($db);
$id = $_GET['id'];
if(isset($_POST['answerQuestion'])){
    if(empty($_POST['body'])){
        $sessionService->setMessage('Answer body cannot be empty.','error');
        $sessionService->redirect("question.php?id=$id");
    }
    $crudService->answerQuestion($id, $_POST['author'], $_POST['email'], $_POST['body']);
    $sessionService->setMessage('Answered question.','info');
}
$questionDetails=$crudService->listQuestionDetails($id);
$viewsRenderer->renderView('question_view',$questionDetails);
