<?php
include 'app.php';

if($sessionService->isLogged() != true){
    header("Location: home.php");
    exit;
}




if(isset($_POST['update'])
    && !empty($_POST['username'])
    && !empty($_POST['email'])
    && !empty($_POST['password']))
{
    $userid = $sessionService->getUserId();
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $forumService = new \ForumServices\MainService\ForumService($db,$encryptionService,$sessionService);
    $forumService->editProfile($userid, $username, $email, $password);
    $viewsRenderer->renderView("editProfile_OK_view");
}


if(isset($_POST['changePassword'])
    && !empty($_POST['oldpassword'])
    && !empty($_POST['newpassword'])
    && !empty($_POST['confirm']))
{
    $userid = $sessionService->getUserId();
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $confirm = $_POST['confirm'];

    $forumService = new \ForumServices\MainService\ForumService($db,$encryptionService,$sessionService);
    $forumService->changePassword($userid, $oldpassword, $newpassword, $confirm);
    $viewsRenderer->renderView("editProfile_OK_view");
}

$viewsRenderer->renderView("editProfile_view");
