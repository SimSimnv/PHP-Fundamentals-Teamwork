<?php
include 'app.php';

if($sessionService->isLogged() != true){
    $sessionService->setMessage('Login in order to edit your profile.','error');
    $sessionService->redirect('login.php');
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
    $sessionService->setMessage('Profile edit successful.','info');
}


if(isset($_POST['changePassword'])
    && !empty($_POST['newpassword'])
    && !empty($_POST['confirm']))
{
    $userId = $sessionService->getUserId();
    $newPassword = $_POST['newpassword'];
    $confirm = $_POST['confirm'];

    if($newPassword !== $confirm){
        $sessionService->setMessage('Passwords mismatch.','error');
        $sessionService->redirect('editProfile.php');
    }

    $forumService->changePassword($userId, $newPassword, $confirm);
    $sessionService->setMessage('Password change successful.','info');
}



$userInfo=$forumService->getUserInfo($sessionService->getUserId());
$viewsRenderer->renderView("editProfile_view",$userInfo);
