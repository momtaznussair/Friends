<?php 

include "../../models/posts/deletePost.php";
session_start();

if(isset($_POST['deletePost'])){
  $deletePosts = new DeletePostModel($_POST['delete'] , $_SESSION['id']);
  $deletePosts->delete_posts();
  // if($allPosts){
    header('Location:/friends/views/profile/profile.php');
  // }
}else{
  echo 'error';
}
?>