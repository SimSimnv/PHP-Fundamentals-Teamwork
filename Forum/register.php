<?php
include 'app.php';

if($sessionService->isLogged()){
    header("Location: home.php");
    exit;
}

if(isset($_POST['register'])
    && !empty($_POST['username'])
    && !empty($_POST['email'])
    && !empty($_POST['password']))
{
    $forumService=new \ForumServices\MainService\ForumService($db,$encryptionService,$sessionService);
    $forumService->register($_POST['username'],$_POST['email'],$_POST['password'],$_POST['confirm']);
    header("Location: login.php");
}


$viewsRenderer->renderView("register_view");

