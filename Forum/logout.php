<?php
include 'app.php';

$sessionService->unsetUser();

$sessionService->setMessage('Logout successful.','info');
header("Location: home.php");
exit;

