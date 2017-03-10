<?php


namespace ForumServices\SessionServices;


class Message
{
    private $message;
    private $type;

    public function __construct(string $infoMessage, string $messageType)
    {
        $this->setMessage($infoMessage);
        $this->setType($messageType);
    }

    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
    }


}