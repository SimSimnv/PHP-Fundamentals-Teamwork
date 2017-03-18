<?php
include 'app.php';
if(!$sessionService->isAdminLogged()){
    $sessionService->setMessage('Can\' logout before logging in.','error');
    $sessionService->redirect('home.php');
}
$sessionService->unsetAdminUser();

$sessionService->setMessage('Logout successful.','info');
$sessionService->redirect('home.php');
