<?php 

include_once('../../includes/head.php');
include "../../config.php";

//$user_id = $_SESSION['id'];
?>

<head>
    <style>
        #f .form-control{
            border-radius: 10px;
            background-color: lightskyblue;
            resize:none;
        }
        .row .post-content {
            border: 1px solid red;
            /* height: 150px; */
        }
        .user_image .image{
            border-radius: 50%;
            height:75px;
            width:75px;
            /* background-color: yellow; */
        }

        .post-content{
            border-radius:20px;
            background-color: lightcyan;
        }
        .post-content .post_img{
            width : 100%;
            height:250px;
        }
    </style>
</head>

<body>
    <?php //include "../../includes/navbar.php"?>
    <div class="row mt-5">
        <div id="insert_posts" class="col-sm-12">
            <center>
                <form action="/friends/controllers/posts/addPost.php" method="post" id="f" enctype="multipart/form-data">
                    <textarea class="form-control text-light" id="body" rows="4" name="body" placeholder="What's in your mind?"></textarea><br>
                    <?php
                        // session_start();
                            if(isset($_SESSION['empty'])){
                                echo "<p class='fw-bold text-danger'>{$_SESSION['empty']} </p>";
                                unset($_SESSION['empty']);
                            }
                        ?>
                    <label class="btn btn-danger" id="upload_image_button">
                        <input type="file" name="image" size="30">
                    </label>
                    <button class="btn btn-dark" id="btn-post" type="submit" name="submit">POST</button>
                </form>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <center>
                <h2 class="text-dark"><strong>News Feed</strong></h2>
            </center>
            
            <?php 
                include_once('../../controllers/posts/getPost.php');
                // if($allPosts){
                //     var_dump($allPosts);
                // }else{
                //     echo "none";
                // }
                // var_dump($allPosts);
            ?>
            <div class="container">
                <?php foreach ($allPosts as $key => $post) { ?>
                    <div class="post mb-5">
                        <div class="row post-header">
                            <div class="user_image col-2">
                                <img class="image" src="<?php echo $_SESSION['image_link'] ?>">
                                <span class="h5 text-primary"><?php echo $_SESSION['username'] ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="post-content p-3 col-12">
                                <p class="small fw-bold"><?php echo $post['created_at'] ?></p>
                                <p class="fs-5 fw-bold post-body"><?php echo $post['body'] ; ?></p>
                                <!-- <img class="post_img" src="<?php //echo $post['image_link'] ?>"> -->

                                <?php
                                    if(isset($post["image_link"])){
                                        echo '<img class="post_img" src="';
                                        echo $post['image_link'];
                                        echo '" alt="Profile Picture" />';

                                    }else{
                                        echo ($_SESSION["gender"] == "male" ?  '<i class="fas fa-user text-light"></i>' : '<i class="fas fa-female" style="color:#E95771; font-size:1.5rem;" ></i>');
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <pre>







    </pre>

</body>