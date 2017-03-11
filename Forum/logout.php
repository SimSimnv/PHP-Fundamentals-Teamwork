<?php
include 'app.php';
if(!$sessionService->isLogged()){
    $sessionService->setMessage('Can\' logout before logging in.','error');
    $sessionService->redirect('home.php');
}
$sessionService->unsetUser();

$sessionService->setMessage('Logout successful.','info');
$sessionService->redirect('home.php');
