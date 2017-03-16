<?php

session_start();

spl_autoload_register(function($class) {
    $class = str_replace("\\", "/", $class);
    require_once $class . '.php';
});

$sessionService = new \ForumServices\SessionServices\SessionService();
set_exception_handler(function(\ForumCore\ForumException $e) use ($sessionService){

    $infoMessage=$e->getMessage();
    $sessionService->setMessage($infoMessage,'error');

    $location=$e->getTrace()[0]['function'];
    header("Location: {$location}.php");
    exit;
});

$db= new \ForumAdapter\PDODatabase(
    \ForumConfig\DBConfig::DB_HOST,
    \ForumConfig\DBConfig::DB_NAME,
    \ForumConfig\DBConfig::DB_USER,
    \ForumConfig\DBConfig::DB_PASS
);

$encryptionService = new \ForumServices\EncryptionServices\EncryptionService();
$viewsRenderer = new \ForumCore\ViewsRenderer($sessionService);
 
