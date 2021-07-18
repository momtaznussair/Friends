<?php 
require_once('../../models/database.php');

class getPostModel{
    private $user_id;

    public function __construct($user_id )
    {
        $this->user_id = $user_id;
        $this->db = new Database();
    }
    
    public function get_posts(){
        $this->db->query("select * from post where user_id = :user_id ORDER BY created_at DESC");
        $this->db->bind(':user_id' , $this->user_id);
        $posts = $this->db->resultset();
        if(!isset($posts)){
            return false;
        }else{
            return $posts;
        }
    }

    public function getAllPosts(){
        return $this->db->query('select * from posts');
    }


}
?>