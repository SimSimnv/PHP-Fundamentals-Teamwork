<?php


namespace ForumAdapter;


interface DatabaseStatementInterface
{
    public function execute(array $params=[]);
    public function fetch();
    public function fetchAll();
    public function fetchObject($className);
    public function rowCount();
    public function errorInfo();
}