<?php
require __DIR__ . '/../vendor/autoload.php';

$getComment = new \Orca\Repository\ContentRepository();

$comments = $getComment->getComment();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CommentSection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="commentSection container-fluid">
    <h2 id="cont" class="commentTitle">Comment form</h2>
    <form class="comment-form" method="post" action="writeCommentToDB.php">
        <div class="form-row">

            <div class="col">
                <label for="mail">Email*</label>
                <input type="email" class="form-control" name="mail" id="mail" required>
            </div>

            <div class="col">
                <label for="name">Name*</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
        </div>
        <span class="form-group">
            <label for="content">Comment*</label>
            <textarea name="comment" class="form-control" id="content" rows="3" required></textarea>
        </span class="form-group"><br>
        <input id="submit" class="btn btn-light" type="submit">
    </form>
</div>
<?php if ($comments) : ?>
<div class="">
    <?php foreach ($comments as $comment): ?>
        <div>
            <?php echo $comment['name']; ?>
            <?php echo $comment['date']; ?>
            <?php echo $comment['comment']; ?>
        </div>
    <?php endforeach; ?>
    <div class="comment-placeholder"></div>
</div>
<?php endif; ?>
<script src="js/javascript.js"></script>
</body>
