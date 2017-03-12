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


    public function setMessage(string $infoMessage, string $messageType)
    {
        $type=strtolower($messageType);
        if($type!='error' && $type!='info'){
            throw new \Error("Message can be error or info!");
        }
        $_SESSION['infoMessage']=$infoMessage;
        $_SESSION['messageType']=$messageType;
    }
    public function getMessage():Message
    {
        if(!$this->checkForMessage()){
            throw new \Error("No message");
        }
        return new Message($_SESSION['infoMessage'],$_SESSION['messageType']);
    }
    public function unsetMessage()
    {
        unset($_SESSION['infoMessage']);
        unset($_SESSION['messageType']);
    }
    public function checkForMessage():bool{
        return isset($_SESSION['infoMessage']);
    }

    public function redirect($file)
    {
         header("location:$file");
         exit;
    }
}