<?php


namespace ForumAdapter;


class PDODatabase implements DatabaseInterface
{
    /* @var $pdo \PDO*/
    private $pdo;
    public function __construct(string $host, string $dbName, string $user, string $pass)
    {

        $dsn="mysql:host=".$host.";dbname=".$dbName.';charset=utf8';
        $this->pdo=new \PDO($dsn,$user,$pass);
    }

    public function prepare(string $query): DatabaseStatementInterface
    {
        $stmt=$this->pdo->prepare($query);
        return new PDOStatement($stmt);
    }
}