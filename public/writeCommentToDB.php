<?php

require __DIR__ . '/../vendor/autoload.php';

$name = $_POST['name'];
$parentCommentId = $_POST['parent_comment_id'] ?? null;
$comment = $_POST['comment'];
$mail = $_POST['mail'];

$saveComment = new \Orca\Repository\ContentRepository();

if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $commentId = $saveComment->saveComment($name, $parentCommentId, $comment, $mail);
    $comment = $saveComment->fetchComment($commentId);

    if ($parentCommentId != null) {
        require __DIR__ . '/../views/replyComment.php';
    } else {
        require __DIR__ . '/../views/comment.php';
    }
} else {
    echo "<div class=\"alert alert-primary\">Please submit a valid email address</div>";
}
