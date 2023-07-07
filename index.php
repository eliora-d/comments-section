<?php 
    require_once 'config/database.php';
    require_once 'helpers/function.php';
    require_once 'helpers/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php component('components/head.php');?>
</head>
<body>
    <?php
        component('components/header.php');
    ?>
    <div class="content">
        <?php
            if(!isset($_GET['page'])) redirect('index.php?page=components/home.php');
            else component($_GET['page']);
        ?>
    </div>
    <?php component('components/footer.php') ?>
</body>
</html>