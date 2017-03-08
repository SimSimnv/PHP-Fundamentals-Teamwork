<?php


namespace ForumAdapter;


class PDOStatement implements DatabaseStatementInterface
{

    /* @var $stmt \PDOStatement*/
    private $stmt;
    public function __construct(\PDOStatement $stmt)
    {
        $this->stmt=$stmt;
    }

    public function execute(array $params = [])
    {
        return $this->stmt->execute($params);
    }

    public function fetch()
    {
        return $this->stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchAll()
    {
        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchObject($className)
    {
        return $this->stmt->fetchObject($className);
    }
}