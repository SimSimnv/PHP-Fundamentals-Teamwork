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

    public function setAdminUser(string $adminId, string $username)
    {
        $_SESSION['admin_id'] = $adminId;
        $_SESSION['admin_username'] = $username;
    }

    public function isAdminLogged():bool
    {
        return isset($_SESSION['admin_id']);
    }

    public function unsetAdminUser()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_username']);
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

    public function setQuestionId($id)
    {
        $_SESSION['question_id'] = $id;
    }

    public function getQuestionId()
    {
        return $_SESSION['question_id'];
    }

    public function isQuestionIdSet()
    {
        return isset($_SESSION['question_id']);
    }

    public function unsetQuestionId()
    {
        unset($_SESSION['question_id']);
    }

    public function setQuestionTitle($title)
    {
        $_SESSION['question_title'] = $title;
    }

    public function getQuestionTitle()
    {
        return $_SESSION['question_title'];
    }

    public function isQuestionTitleSet()
    {
        return isset($_SESSION['question_title']);
    }

    public function unsetQuestionTitle()
    {
        unset($_SESSION['question_title']);
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