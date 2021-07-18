<?php 

// require_once (DOCUMENT_ROOT.'/friends/models/database.php');
require_once ('/xampp/htdocs/friends/models/database.php');

    class friend{
        private $user_id;
        private $friend_id;
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function getAllFriendsIDs($id){
            $this->db->query("SELECT friend_id FROM friends WHERE user_id =:id");
            $this->db->bind(':id', $id);
            $result = $this->db->resultset();
            return $result;
        }

        function getFriendData($id){
            $this->db->query("SELECT id,username,image_link FROM user WHERE id = :id");
            $this->db->bind(':id', $id);
            $data = $this->db->resultset();
            return $data;
        }

        function removeFriend($us_id,$fr_id){
            $this->db->query("delete from friends where friend_id = :fr_id and user_id = :us_id");
            $this->db->bind(':fr_id',$fr_id);
            $this->db->bind(':us_id' , $us_id);
            $this->db->execute();

            $this->db->query("delete from friends where friend_id = :fr_id and user_id = :us_id");
            $this->db->bind(':fr_id',$us_id);
            $this->db->bind(':us_id' , $fr_id);
            $this->db->execute();
        }

        function getAllUnFriends(){
            $this->db->query(" SELECT id,username,image_link FROM user WHERE id != :us_id AND id NOT IN ( SELECT friend_id from friends where user_id = :us_id );
            ");
            $this->db->bind("us_id" , $_SESSION['id']);
            // $this->db->bind("frs_id", $id);
            return $this->db->resultset();
        }

        function addFriend($us_id,$fr_id){
            // $this->db->query("INSERT INTO friends SET user_id=:us_id , friend_id=:fr_id");
            $this->db->query("INSERT INTO friends (user_id ,friend_id ) VALUE (:us_id , :fr_id) , (:fr_id, :us_id) ");
            $this->db->bind(':us_id',$us_id);
            $this->db->bind(":fr_id", $fr_id);
            $this->db->execute();
            return $this->db->lastinsertid();
        }
    }

?>