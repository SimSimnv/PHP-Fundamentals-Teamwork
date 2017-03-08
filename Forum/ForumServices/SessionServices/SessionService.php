<?php


namespace ForumServices\SessionServices;


class SessionService implements SessionServiceInterface
{
    public function setUser(string $user_id, string $username)
    {
        $_SESSION['username']=$username;
        $_SESSION['user_id']=$user_id;
    }
    public function unsetUser()
    {
        unset($_SESSION['username']);
        unset($_SESSION['user_id']);
    }
    public function isLogged():bool
    {
        return isset($_SESSION['user_id']);
    }
    public function getUserId():string
    {
        if(!$this->isLogged()){
            throw new \Exception("User isn't logged!");
        }
        return $_SESSION['user_id'];
    }
    public function getUserName():string
    {
        if(!$this->isLogged()){
            throw new \Exception("User isn't logged!");
        }
        return $_SESSION['username'];
    }
}