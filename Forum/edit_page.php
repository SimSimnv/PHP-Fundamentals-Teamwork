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
}
else{
    $sessionService->setMessage('Enter a valid question id!','error');
    $sessionService->redirect('admin_panel.php');
}
if(isset($_POST['edit_question']) && !empty($_POST['title']) && !empty($_POST['body']) && !empty($_POST['tags'])){
    $tags = $_POST['tags'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $id = $_POST['question_id'];
    $crudService->editQuestion($title,$body,$id);
    $crudService->addTagsToQuestion($tags,$id);
    $sessionService->setMessage('Question successfully edited!','info');
    $sessionService->redirect('admin_panel.php');
}
$viewsRenderer->renderView('edit_page_view',$questionsInfo);