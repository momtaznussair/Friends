<?php 
session_start();
?>

<?php include "../../includes/navbar.php"; ?>
<?php include "../../includes/head.php"; ?>
<?php require_once "../../controllers/users/friend.php";?>


<!-- bodey content  -->

<!-- posts  -->

<div class="row">
    <div class="col-3  mt-5">
    <?php include_once('./user-info.php'); ?>

    </div>
    <div class="col-5">
        <?php include_once('./posts.php'); ?>
    </div>
    <div class="col-3  mt-5">
        <?php require_once('addFriends.php') ?>
    </div>
</div>
<div class="row">
    <div class="col-3">
    <?php require_once('removeFriends.php') ?>
    </div>
</div>

