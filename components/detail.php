<?php
    require_once 'config/database.php';
    require_once 'helpers/function.php';
    require_once 'helpers/session.php';
    
    if(isset($_GET['id'])) {
        $db = conn_db();
        $id = $_GET['id'];
        $query = "SELECT * FROM comments WHERE comments.id = $id";
        $result = $db->query($query);
        $result = $result->fetch_assoc();
?>

<div class="now-showing">
  <form action="../controllers/controller_updatecomment.php" class="insert-comment" method="post">
    <textarea name="comment" id="comment" cols="30" rows="3"><?= $result['comment'] ?></textarea>
    <input type="hidden" name="id" value="<?= $result['id'] ?>">
    <input type="submit" value="Update Comment">
  </form>
</div>

<?php 
    }
?>