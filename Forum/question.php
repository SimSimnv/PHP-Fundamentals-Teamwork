<?php
require_once 'app.php';
$questionDetails = null;
if(isset($_GET['id'])){
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
}
elseif(isset($_POST['title'])) {
    $crudService = new \ForumServices\CrudServices\CrudService($db);
    $id = null;
    $questionDetails = null;
    $title = $_POST['title'];
    $questionDetails = $crudService->listQuestionDetailsByTitle($title);
    if ($questionDetails === false) {
        $sessionService->setMessage('Invalid search argument.', 'error');
        $sessionService->redirect($_POST['url']);
    }

    if (isset($_POST['answerQuestion'])) {
        if (empty($_POST['body'])) {
            $sessionService->setMessage('Answer body cannot be empty.', 'error');
            $sessionService->redirect("question.php?id=$id");
        }
        $id = $questionDetails->getQuestion()->getId();
        $crudService->answerQuestion($id, $_POST['author'], $_POST['email'], $_POST['body']);
        $sessionService->setMessage('Answered question.', 'info');
    }
}else{
    $sessionService->setMessage('Search a question or go to Questions in order to access this page.','error');
    $sessionService->redirect('all_questions.php');
}
$viewsRenderer->renderView('question_view',$questionDetails);
