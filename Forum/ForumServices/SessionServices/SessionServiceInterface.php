<?php


namespace ForumServices\SessionServices;


interface SessionServiceInterface
{
    public function setUser(string $user_id, string $username);

    public function unsetUser();

    public function isLogged():bool;

    public function setAdminUser(string $adminId, string $username);

    public function isAdminLogged();

    public function unsetAdminUser();

    public function getUserId():string;

    public function getUserName():string;

    public function setQuestionId($id);

    public function getQuestionId();

    public function isQuestionIdSet();

    public function unsetQuestionId();

    public function setQuestionTitle($title);

    public function getQuestionTitle();

    public function isQuestionTitleSet();

    public function unsetQuestionTitle();

    public function setMessage(string $infoMessage, string $messageType);

    public function getMessage();

    public function unsetMessage();

    public function redirect($file);
}