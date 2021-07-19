<div class="border p-3">
        <h1>All Friends</h1>
        <?php
            // require_once "./controllers/users/friend.php";
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
                        <form class='d-inline ms-auto' action='/friends/controllers/users/friend.php' method='post'>
                            <input type='hidden' name='fr_id' value='{$row[0]['id']}'>
                            <input type='submit' class='btn btn-secondary' name='unfriend' value='Unfriend'>
                        </form>
                    ";
                    echo "</div>";
                }
            }
            
        ?>
    </div>
    <!-- <div class="col-6"> -->

    </div>