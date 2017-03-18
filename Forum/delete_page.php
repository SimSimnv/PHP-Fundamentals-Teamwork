<?php
require_once 'app.php';
if(!$sessionService->isAdminLogged()){
    $sessionService->setMessage('Cannot access this page!','error');
    $sessionService->redirect('home.php');
}

$questionsInfo = '';
$crudService = new \ForumServices\CrudServices\CrudService($db);

if(isset($_GET['id'])){
    $questionsInfo = $crudService->listQuestionDetails($_GET['id']);
}else{
    $sessionService->setMessage('Enter a valid question id!','error');
    $sessionService->redirect('admin_panel.php');
}

if(isset($_POST['delete_question'])){
    $crudService->deleteQuestion($_POST['question_id']);
    $sessionService->setMessage('Question successfully deleted!','info');
    $sessionService->redirect('admin_panel.php');
}


$viewsRenderer->renderView('delete_page_view',$questionsInfo);