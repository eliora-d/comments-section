<div class="now-showing">
  <form action="../controllers/controller_addcomment.php" class="insert-comment" method="post">
    <textarea name="comment" id="comment" cols="30" rows="3"></textarea>
    <input type="submit" value="Insert Comment">
  </form>
  <div class="now-showing-header">Comments</div>
  <div class="now-showing-content">  
    <?php
      $db = conn_db();
      $query = "SELECT comments.id, comments.user_id, users.username, comments.comment FROM comments LEFT JOIN users ON users.id = comments.user_id";
      $result = $db->query($query);
      while($comment = $result->fetch_assoc()) {
    ?>
    <form action="../index.php" class="comment-detail">
      <p><?= $comment['comment'] ?></p>
      <br>
      <?php if($comment['user_id'] != null) { ?>
        by: <?= $comment['username'] ?>
        <?php if(isset($_SESSION['id'])) { ?>
          <input type="submit" value="Edit Comment">
          <input type="hidden" name="id" value="<?= $comment['id'] ?>">
          <input type="hidden" name="page" value="components/detail.php">
        <?php } ?>
      <?php } ?>
    </form>
    <?php
      }
    ?>
  </div>
</div>