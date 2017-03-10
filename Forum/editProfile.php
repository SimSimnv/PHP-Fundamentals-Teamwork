<?php
include 'app.php';

if($sessionService->isLogged() != true){
    header("Location: home.php");
    exit;
}
$forumService=new \ForumServices\MainService\ForumService($db,$encryptionService,$sessionService);

if(isset($_POST['update'])
    && !empty($_POST['username'])
    && !empty($_POST['email']))
{
    $userId = $sessionService->getUserId();
    $username = $_POST['username'];
    $email = $_POST['email'];

    $forumService->editProfile($userId, $username, $email);
    $sessionService->setUser($userId,$username);
}


if(isset($_POST['changePassword'])
    && !empty($_POST['newpassword'])
    && !empty($_POST['confirm']))
{
    $userId = $sessionService->getUserId();
    $newPassword = $_POST['newpassword'];
    $confirm = $_POST['confirm'];

    $forumService->changePassword($userId, $newPassword, $confirm);
}



$userInfo=$forumService->getUserInfo($sessionService->getUserId());
$viewsRenderer->renderView("editProfile_view",$userInfo);
