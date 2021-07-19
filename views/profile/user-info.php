<?php
  require_once('../../models/database.php');
?>

    <div class="mx-5">
        <?php
          echo "<img src={$_SESSION['image_link']} style='width: 150px; border-radius: 50%;'>" ;
        ?>
    </div>
  <div class="mt-5 bg-dark text-warning" style="border-radius: 5px;">
		<?php
		echo"
			<center><h2><strong>About</strong></h2></center>
			<p><i class='fas fa-address-book me-2 ms-2'></i><strong>Name: </strong>{$_SESSION['username']}</p>
			<p><i class='fas fa-user-circle me-2 ms-2'></i><strong>Gender: </strong>{$_SESSION['gender']}</p>
			<p><i class='fas fa-envelope me-2 ms-2'></i><strong>Email: </strong>{$_SESSION['email']}</p>
		";
		?>
	</div>
