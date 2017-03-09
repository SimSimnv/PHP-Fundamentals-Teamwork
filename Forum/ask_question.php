<?php
require_once 'app.php';
if(!$sessionService->isLogged()){
    header('location:login.php');
}
if(isset($_POST['ask'])){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $userId = $_SESSION['user_id'];
    $crudService = new \ForumServices\CrudServices\CrudService($db,$sessionService);
    $crudService->askQuestion($title,$body,$userId);
    header('location:all_questions.php');
    exit;
}
$viewsRenderer->renderView('ask_question_view');