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
    <div class="form-group">
        <label for="content">Comment*</label>
        <textarea name="comment" class="form-control" id="content" rows="3" required></textarea>
    </div>
    <input id="submit" class="btn btn-light button-main" type="submit">
</form>
