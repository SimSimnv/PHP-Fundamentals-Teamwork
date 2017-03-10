<?php
require_once 'app.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $crudService = new \ForumServices\CrudServices\CrudService($db);
    $question = $crudService->listQuestionDetails($id);
}else{
    header('location:all_questions.php');
}
$viewsRenderer->renderView('details_page_view',$question);