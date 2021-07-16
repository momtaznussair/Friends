<?php 
session_start();
?>

<?php include "../../includes/navbar.php"; ?>
<?php include "../../includes/head.php"; ?>
<?php echo $_SESSION['id']?>

<!-- bodey content  -->

<!-- posts  -->

<div class="row">
    <div class="col-3">

    </div>
    <div class="col-6">
        <?php include_once('./posts.php'); ?>
    </div>
    <div class="col-3">
        
    </div>
</div>

