<?php


namespace ForumCore;


use ForumServices\SessionServices\SessionServiceInterface;

class ViewsRenderer
{
    const VIEWS_FOLDER="ForumViews";
    /* @var SessionServiceInterface*/
    private $sessionService;

    public function __construct(SessionServiceInterface $sessionService)
    {
        $this->sessionService=$sessionService;
    }

    public function renderView(string $viewName, $data=null)
    {
        $sessionService=$this->sessionService;
        include self::VIEWS_FOLDER.DIRECTORY_SEPARATOR."SharedViews/nav_view.php";
        include self::VIEWS_FOLDER.DIRECTORY_SEPARATOR.$viewName.".php";
        include self::VIEWS_FOLDER.DIRECTORY_SEPARATOR."SharedViews/footer_view.php";
    }
}