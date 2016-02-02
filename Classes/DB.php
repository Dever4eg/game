<?php

namespace Dever4eg\Classes;

use PDO;

class DB
{
    private $dbh;

    private $className = 'stdClass';

    public function __construct()
    {
        $this->dbh = new PDO('mysql:dbname=db_the_craft;host=192.168.1.3', 'root', '');
    }

    public function SetClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}