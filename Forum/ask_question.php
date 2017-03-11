<?php
require_once 'app.php';
if(!$sessionService->isLogged()){
    $sessionService->setMessage('Log in in order to ask a question.','error');
    $sessionService->redirect('login.php');
}
if(isset($_POST['ask'])){
    if(empty($_POST['title']) || empty($_POST['body'])){
        $sessionService->setMessage('Title and body cannot be empty.','error');
        $sessionService->redirect('ask_question.php');
    }
    $title = $_POST['title'];
    $body = $_POST['body'];
    $userId = $_SESSION['user_id'];
    $crudService = new \ForumServices\CrudServices\CrudService($db,$sessionService);
    $crudService->askQuestion($title,$body,$userId);
    $sessionService->setMessage('Question asked.','info');
    $sessionService->redirect('all_questions.php');
}
$viewsRenderer->renderView('ask_question_view');