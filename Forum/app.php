<?php
session_start();

spl_autoload_register(function($class){
    include $class.'.php';
});

$db= new \ForumAdapter\PDODatabase(
    \ForumConfig\DBConfig::DB_HOST,
    \ForumConfig\DBConfig::DB_NAME,
    \ForumConfig\DBConfig::DB_USER,
    \ForumConfig\DBConfig::DB_PASS
);

$encryptionService=new \ForumServices\EncryptionServices\EncryptionService();
$sessionService=new \ForumServices\SessionServices\SessionService();
$viewsRenderer=new \ForumCore\ViewsRenderer($sessionService);
