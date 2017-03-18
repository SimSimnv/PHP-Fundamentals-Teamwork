<?php


namespace ForumData\Questions;


use ForumData\Tags\Tag;

class Question
{
    private $id;
    private $title;
    private $body;
    private $username;
    private $tags;
    private $views;

    /**
     * @return Tag[]|\Generator
     */

    public function getTags()
    {
        return $this->tags;
    }
    /**
     * @var $tags Tag[]|\Generator
     */
    public function setTags(callable $tags)
    {
        $this->tags = $tags();
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }


    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }


    public function getBody()
    {
        return $this->body;
    }
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param mixed $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }





}