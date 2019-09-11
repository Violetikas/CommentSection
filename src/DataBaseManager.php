<?php

declare(strict_types=1);

namespace Orca;

class DataBaseManager
{
    private $con;

    public function __construct()
    {
        $dbName = $this->getDbName();
        $dbUserName = $this->getDbUserName();
        $dbPass = $this->getDbPass();

        if (!isset($this->con) || $this->con instanceof \PDO) {
            $this->con = new \PDO("mysql:host=mysql;port=3306;dbname=$dbName;charset=utf8", $dbUserName, $dbPass, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]);
        }
        return $this->con;
    }

    private function getDbName()
    {
        return 'Orca';
    }

    private function getDbUserName()
    {
        return 'Orca';
    }

    private function getDbPass()
    {
        return 'orcateam';
    }

    public function getConnection()
    {
        return $this->con;
    }
}
