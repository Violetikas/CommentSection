<?php

namespace Orca\Repository;

use Orca\DataBaseManager;


class ContentRepository
{
    private $manager;

    public function __construct()
    {
        $this->manager = (new DataBaseManager())->getConnection();
    }


    public function saveComment($name, $comment, $mail)
    {
        $sql = "INSERT INTO comment (name, comment, mail, date)
    VALUES (?, ?, ?, now() )";
        $stmt = $this->manager->prepare($sql);
        $stmt->execute([$name, $comment, $mail]);
        return $this->manager->lastInsertId();
    }

    public function getComment()
    {
        $sql = "SELECT * FROM comment ORDER BY date";
        $stmt = $this->manager->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function fetchComment($commentId)
    {
        $sql = "SELECT * FROM comment WHERE comment_id = ?";
        $stmt = $this->manager->prepare($sql);
        $stmt->execute([$commentId]);

        return $stmt->fetch();
    }
}
