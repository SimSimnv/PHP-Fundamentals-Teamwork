<?php
include 'app.php';

$sessionService->unsetUser();
header("Location: home.php");
exit;

