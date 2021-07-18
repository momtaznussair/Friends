<?php 

include "../../models/posts/getPost.php";



$getPosts = new getPostModel($_SESSION['id']);
$allPosts = $getPosts->get_posts();
?>