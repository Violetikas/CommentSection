<div class="container card mb-5" style="size: 70em; background-color: #dddddd" data-comment-id="<?php echo $comment['comment_id'] ?>">
    <div class="card-header">
        <strong><?php echo $comment['name']; ?></strong>
        <?php echo $comment['date']; ?>
    </div>
    <div class="card-body">
        <?php echo $comment['comment']; ?>
    </div>
</div>