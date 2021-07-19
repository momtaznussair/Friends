<?php 
session_start();
?>

<?php include "../../includes/navbar.php"; ?>
<?php include "../../includes/head.php"; ?>

<!-- bodey content  -->

<!-- posts  -->

<div class="row">
    <div class="col-3 m-2">
    <?php include_once('./user-info.php'); ?>

    </div>
    <div class="col-6">
        <?php include_once('./posts.php'); ?>
    </div>
    <div class="col-3">
        
    </div>
</div>

