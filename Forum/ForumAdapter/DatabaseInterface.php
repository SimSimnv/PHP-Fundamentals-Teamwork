<?php


namespace ForumAdapter;


interface DatabaseInterface
{
    public function prepare(string $query):DatabaseStatementInterface;
    public function lastInsertId();
}