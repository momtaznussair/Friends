<?php

    // session_start();
    // require "../../models/users/login.php";
    require "/xampp/htdocs/friends/models/users/friend.php";
    // require DOCUMENT_ROOT."/friends/models/users/friend.php";


    $friend = new friend();

    $allIds = $friend->getAllFriendsIDs($_SESSION['id']);

    $allData = [];

    foreach($allIds as $fr_id){
        $dataID = $fr_id['friend_id'];
        $data = $friend->getFriendData($fr_id['friend_id']);
        array_push($allData,$data);
    }

    if(isset($_POST['unfriend'])){
        session_start();
        $fr_id = $_POST['fr_id'] + 0;
        $us_id = $_SESSION['id'];
        // echo $fr_id;
        // echo $us_id;
        $friend->removeFriend($us_id,$fr_id);
        header('location:/friends');
        
    }

    $allUnFriends = $friend->getAllUnFriends();

    if(isset($_POST['friend'])){
        session_start();
        $us_id = $_SESSION['id'];
        $fr_id = $_POST['fr_id'];
        $friend->addFriend($us_id,$fr_id);
        header("location:/friends");
    }
?>