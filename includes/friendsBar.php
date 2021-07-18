<div class="row m-5">
    <div class="col-3 border p-3">
        <h1>All Friends</h1>
        <?php
            require_once "./controllers/users/friend.php";
            $friendsData = $allData;
            if($friendsData == null){
                echo "<h3>No Friends Yet</h3>";
            }else{
                foreach($friendsData as $row){
                    echo "<div class='friend mb-3 d-flex'>";
                    echo "<img src='{$row[0]['image_link']}' width='100' height= '100'>";
                    echo "<span class='h2 ms-2'>{$row[0]['username']}</span>";
                    // echo $row[0]['id'];
                    echo "
                        <form class='d-inline ms-auto' action='./controllers/users/friend.php' method='post'>
                            <input type='hidden' name='fr_id' value='{$row[0]['id']}'>
                            <input type='submit' class='btn btn-secondary' name='unfriend' value='Unfriend'>
                        </form>
                    ";
                    echo "</div>";
                }
            }
            
        ?>
    </div>
    <div class="col-6">

    </div>
    <div class="col-3 border p-3">
        <h2>People You May Know</h2>
        <?php 

            require_once "./controllers/users/friend.php";
            // var_dump( $allUnFriends);
            if($allUnFriends != null){
                foreach($allUnFriends as $row ){
                    echo "<div class='unfriend mb-3 d-flex'>";
                    echo "<img src='{$row['image_link']}' width='100' height= '100'>";
                    echo "<span class='h2 ms-2'>{$row['username']}</span>";
                    // echo $row[0]['id'];
                    echo "
                        <form class='d-inline ms-auto' action='./controllers/users/friend.php' method='post'>
                            <input type='hidden' name='fr_id' value='{$row['id']}'>
                            <input type='submit' class='btn btn-primary' name='friend' value='Add Friend'>
                        </form>
                    ";
                    echo "</div>";
                }
            }else{
                echo "<h3>You have added all users</h3>";
            }
            
        
        ?>
    </div>
</div>