<?php

require __DIR__ . '/../vendor/autoload.php';

$name = $_POST['name'];
$comment = $_POST['comment'];
$mail = $_POST['mail'];

$saveComment = new \Orca\Repository\ContentRepository();

$commentId = $saveComment->saveComment($name, $comment, $mail);
$comment = $saveComment->fetchComment($commentId);

?>
<div>
    <?php echo $comment['name']; ?>
    <?php echo $comment['date']; ?>
    <?php echo $comment['comment']; ?>
</div>
