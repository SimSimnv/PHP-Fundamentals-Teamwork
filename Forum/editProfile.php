<?php
include 'app.php';

if($sessionService->isLogged() != true){
    $sessionService->setMessage('Log in in order to edit your profile.','error');
    $sessionService->redirect('home.php');
}
$forumService=new \ForumServices\MainService\ForumService($db,$encryptionService,$sessionService);

if(isset($_POST['update']))
{
    if(empty($_POST['username']) || empty($_POST['email'])){
        $sessionService->setMessage('Username and Email are mandatory fields.','error');
        $sessionService->redirect('editProfile.php');
    }
    $userId = $sessionService->getUserId();
    $username = $_POST['username'];
    $email = $_POST['email'];

    $forumService->editProfile($userId, $username, $email);
    $sessionService->setUser($userId,$username);
    $sessionService->setMessage('Profile edit successful.','info');
}


if(isset($_POST['changePassword']))
{
    if(empty($_POST['newpassword']) || empty($_POST['confirm'])){
        $sessionService->setMessage('Password and Confirm New Password are mandatory fields.','error');
        $sessionService->redirect('editProfile.php');
    }

    if($_POST['newpassword'] !== $_POST['confirm']){
        $sessionService->setMessage('Passwords mismatch.','error');
        $sessionService->redirect('editProfile.php');
    }

    $userId = $sessionService->getUserId();
    $newPassword = $_POST['newpassword'];
    $confirm = $_POST['confirm'];

    $forumService->changePassword($userId, $newPassword, $confirm);
    $sessionService->setMessage('Password change successful.','info');
}



$userInfo=$forumService->getUserInfo($sessionService->getUserId());
$viewsRenderer->renderView("editProfile_view",$userInfo);
