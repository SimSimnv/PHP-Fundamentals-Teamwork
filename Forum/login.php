<?php
include 'app.php';
if($sessionService->isLogged()){
    header("Location: home.php");
    exit;
}

if(isset($_POST['login'])
    && !empty($_POST['username'])
    && !empty($_POST['password']))
{
    $forumService=new \ForumServices\MainService\ForumService($db,$encryptionService,$sessionService);
    $forumService->login($_POST['username'],$_POST['password']);

    $sessionService->setMessage('Login successful.','info');
    header("Location: home.php");
    exit;
}


$viewsRenderer->renderView("login_view");