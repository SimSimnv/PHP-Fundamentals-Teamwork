<?php
require_once 'app.php';
$questionDetails = null;
if(isset($_GET['id'])){
    $crudService=new \ForumServices\CrudServices\CrudService($db);
    $sessionService->setQuestionId($_GET['id']);
    $id = $sessionService->getQuestionId();
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
    $questionDetails = null;
    $sessionService->setQuestionTitle($_POST['title']);
    $title = $sessionService->getQuestionTitle();
    $questionDetails = $crudService->listQuestionDetailsByTitle($title);
    if ($questionDetails === false) {
        $sessionService->setMessage('Invalid search argument.', 'error');
        $sessionService->redirect($_POST['url']);
    }
    $sessionService->setQuestionId($questionDetails->getQuestion()->getId());
}
elseif(isset($_POST['answerQuestion'])){
    $crudService = new \ForumServices\CrudServices\CrudService($db);
    $id = $sessionService->getQuestionId();
    if (empty($_POST['body'])) {
        $sessionService->unsetQuestionTitle();
        $sessionService->unsetQuestionId();
        $sessionService->setMessage('Answer body cannot be empty.', 'error');
        $sessionService->redirect("question.php?id=$id");
    }
    $crudService->answerQuestion($id, $_POST['author'], $_POST['email'], $_POST['body']);
    $sessionService->setMessage('Answered question.', 'info');
    $questionDetails=$crudService->listQuestionDetails($id);
    $sessionService->unsetQuestionId();
}
else{
    $sessionService->setMessage('Search a question or go to Questions in order to access this page.','error');
    $sessionService->redirect('all_questions.php');
}
if($sessionService->isQuestionIdSet()){
    $sessionService->unsetQuestionId();
}
if($sessionService->isQuestionTitleSet()){
    $sessionService->unsetQuestionTitle();
}
$viewsRenderer->renderView('question_view',$questionDetails);
