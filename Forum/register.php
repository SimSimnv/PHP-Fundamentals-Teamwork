<?php
include 'app.php';

if($sessionService->isLogged()){
    $sessionService->setMessage('Logout in order to register.','error');
    $sessionService->redirect('home.php');
}

if(isset($_POST['register']))
{
    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['confirm'])){
        $sessionService->setMessage('All fields are required.','error');
        $sessionService->redirect('register.php');
    }

    if($_POST['password'] !== $_POST['confirm']){
        $sessionService->setMessage('Passwords mismatch.','error');
        $sessionService->redirect('register.php');
    }

    $forumService=new \ForumServices\MainService\ForumService($db,$encryptionService,$sessionService);
    $forumService->register($_POST['username'],$_POST['email'],$_POST['password'],$_POST['confirm']);
    $sessionService->setMessage('Register successful.','info');
    $sessionService->redirect('login.php');
}


$viewsRenderer->renderView("register_view");

