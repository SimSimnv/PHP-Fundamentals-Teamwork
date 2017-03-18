<?php
require_once 'app.php';

if(!$sessionService->isAdminLogged()){
    $sessionService->setMessage('Cannot access this page!','error');
    $sessionService->redirect('home.php');
}

$crudService = new \ForumServices\CrudServices\CrudService($db);

$page=$crudService->getCurrentPage();

$questions = $crudService->listQuestionsByPage($page);

$viewsRenderer->renderView('admin_panel_view',$questions, $crudService);