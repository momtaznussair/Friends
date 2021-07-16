<?php 
require "../../models/posts/addPost.php";
session_start();

// echo $_SESSION['image'];

//error array 
$errors = array('body' => '', 'image_link'=> '');


//validate body
if(isset($_POST['submit']))
{

    $body = $_POST['body'];
    $_SESSION['image'] = $_FILES['image'] ['name'];

    //validate body
    $body = htmlentities($body);
    $body = htmlspecialchars($body);
    $body = strip_tags($body);
    $body = str_replace(' ','' , $body);
    $body = ucfirst(strtolower($body));
    $_SESSION['body'] = $body;


    // validating image
    if(strlen($_FILES["image"]["name"]) !== 0){
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
        
        $expensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$expensions) === false){
            $_SESSION['errors']["imageError"] = "Extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152) {
            $_SESSION['errors']["imageError"] ='Max file size is 2 MB ';
        }
        $uniqueName = uniqid();
        $imagePath = "/friends/assets/images/posts_pics/".$uniqueName.".".$file_ext;
        $imageDestination = DOCUMENT_ROOT . "/friends/assets/images/posts_pics/".$uniqueName.".".$file_ext;
        if(!move_uploaded_file($file_tmp,$imageDestination))
        {
            $_SESSION['errors']["imageError"] = "Sorry Couldn't save your image";
        }
        $_SESSION["imagePath"]=$imagePath;



        
    }
    

    if(strlen($_SESSION['body'] <= 0)){
        $errors['body'] = 'please write something first and use 250 or less than 250 words!';
        $_SESSION['empty'] = $errors['body'];
        header("Location:/friends/views/profile/profile.php");
    }else{
        

        $insertPost = new postModel($_SESSION['body'] ,$imagePath ,$_SESSION['id']);
        $newPost = $insertPost->insertPost();
        header("Location:/friends/views/profile/profile.php");
    }
}

?>