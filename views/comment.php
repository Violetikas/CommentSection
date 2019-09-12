<div class="container card mb-5" style="background-color: #dddddd"
     data-comment-id="<?php echo $comment['comment_id'] ?>">
    <div class="card-header">
        <strong><?php echo $comment['name']; ?></strong>
        <?php echo $comment['date']; ?>
        <button type="button" class="btn btn-light btn-sm button-reply float-right">Reply</button>
    </div>
    <div class="card-body">
        <?php echo $comment['comment']; ?>
    </div>
    <?php foreach ($comments[$comment['comment_id']] ?? [] as $childComment): ?>
        <div class="container card mb-5" style="size: 70em; background-color: #dddddd"
             data-comment-id="<?php echo $childComment['comment_id'] ?>">
            <div class="card-header">
                <strong><?php echo $childComment['name']; ?></strong>
                <?php echo $childComment['date']; ?>
            </div>
            <div class="card-body">
                <?php echo $childComment['comment']; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="comment-placeholder"></div>
    <div class="form-placeholder"></div>
</div>
