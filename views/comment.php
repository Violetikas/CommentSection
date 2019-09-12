<div class="card mb-5" data-comment-id="<?php echo $comment['comment_id'] ?>">
    <div class="card-header">
        <span class="font-bold"><?php echo $comment['name']; ?></span>
        <?php echo $comment['date']; ?>
        <button type="button" class="btn btn-light btn-sm button-reply float-right">Reply</button>
    </div>
    <div class="card-body">
        <?php echo $comment['comment']; ?>
    </div>
    <!-- TODO: render child comments -->
    <div class="comment-placeholder"></div>
    <div class="form-placeholder"></div>
</div>
