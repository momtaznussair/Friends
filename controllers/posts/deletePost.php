<?php 

include "../../models/posts/deletePost.php";

if(isset($_POST['deletePost'])){
  $deletePosts = new DeletePostModel($_POST['delete']);
  $allPosts = $deletePosts->delete_posts($id,$_user_id);
  if($allPosts){
    header('Location:../../views/posts/profile.php');
  }
}
?>