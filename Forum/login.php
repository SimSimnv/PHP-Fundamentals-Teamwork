<?php
include 'app.php';
if($sessionService->isLogged()){
    $sessionService->redirect('home.php');
}

if(isset($_POST['login']))
{
    if(empty($_POST['username']) || empty($_POST['password'])){
        $sessionService->setMessage('Username and Password cannot be empty.','error');
        $sessionService->redirect('login.php');
    }
    $forumService=new \ForumServices\MainService\ForumService($db,$encryptionService,$sessionService);
    $forumService->login($_POST['username'],$_POST['password']);

    $sessionService->setMessage('Login successful.','info');
    $sessionService->redirect('home.php');
}


$viewsRenderer->renderView("login_view");