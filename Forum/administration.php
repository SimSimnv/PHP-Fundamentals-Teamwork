<?php
require_once 'app.php';

if($sessionService->isAdminLogged()){
    $sessionService->setMessage('You are already logged in as the administrator.','info');
    $sessionService->redirect('home.php');
}

if(isset($_POST['login_admin']))
{
    if(empty($_POST['username']) || empty($_POST['password'])){
        $sessionService->setMessage('Username and Password cannot be empty.','error');
        $sessionService->redirect('administration.php');
    }
    $forumService=new \ForumServices\MainService\ForumService($db,$encryptionService,$sessionService);
    $forumService->adminLogin($_POST['username'],$_POST['password']);

    $sessionService->setMessage('Login as the administrator successful.','info');
    $sessionService->redirect('admin_panel.php');
}


$viewsRenderer->renderView('administration_login_view');