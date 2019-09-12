<?php

require __DIR__ . '/../vendor/autoload.php';

$name = $_POST['name'];
$comment = $_POST['comment'];
$mail = $_POST['mail'];

$saveComment = new \Orca\Repository\ContentRepository();

if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $commentId = $saveComment->saveComment($name, $comment, $mail);
    $comment = $saveComment->fetchComment($commentId);

// TODO: render child differently
    require __DIR__ . '/../views/comment.php';
} else {
    echo "<h2>Please insert a valid email address</h2>";
}
