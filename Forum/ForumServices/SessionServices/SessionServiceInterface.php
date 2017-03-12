<?php


namespace ForumServices\SessionServices;


interface SessionServiceInterface
{
    public function setUser(string $user_id, string $username);
    public function unsetUser();
    public function isLogged():bool;
    public function getUserId():string;
    public function getUserName():string;


    public function setMessage(string $infoMessage, string $messageType);
    public function getMessage();
    public function unsetMessage();

    public function redirect($file);
}