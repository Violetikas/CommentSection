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


    public function saveComment($name, $parentCommentId, $comment, $mail)
    {
        $sql = "INSERT INTO comment (name, parent_comment_id, comment, mail, date)
    VALUES (?, ?, ?, ?, now() )";
        $stmt = $this->manager->prepare($sql);
        $stmt->execute([$name, $parentCommentId, $comment, $mail]);
        return $this->manager->lastInsertId();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM comment ORDER BY date";
        $stmt = $this->manager->prepare($sql);
        $stmt->execute();

        $grouped = [null => []];

        foreach ($stmt as $comment) {
            $grouped[$comment['parent_comment_id']][] = $comment;
        }

        return $grouped;
    }

    public function fetchComment($commentId)
    {
        $sql = "SELECT * FROM comment WHERE comment_id = ?";
        $stmt = $this->manager->prepare($sql);
        $stmt->execute([$commentId]);

        return $stmt->fetch();
    }
}
