<?php
require __DIR__ . '/../vendor/autoload.php';

$getComment = new \Orca\Repository\ContentRepository();

$comments = $getComment->getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; style-src 'self' https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css 'sha256-iLRIDfWbrDWQ0NijtGVqwoRhn5cqp8kcgZ3cKPZGXUw=';">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CommentSection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="commentSection container-fluid mb-5">
    <h2 id="cont" class="commentTitle">Comment form</h2>
    <?php require __DIR__ . '/../views/form.php'; ?>
</div>
<div class="comment-list">
    <?php foreach ($comments[null] as $comment) {
        require __DIR__ . '/../views/comment.php';
    } ?>
    <div class="comment-placeholder"></div>
</div>
<script src="js/javascript.js"></script>
</body>
