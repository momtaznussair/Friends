<?php 
require_once('../../models/database.php');

class getPostModel{
    private $user_id;
    // private $per_page = 4;
    // private $start_from = ($page-1) * $per_page;
    // public function __construct($user_id , $start_from , $per_page)

    public function __construct($user_id )
    {
        $this->user_id = $user_id;
        // $this->start_from = $start_from;
        // $this->per_page = $per_page;
        $this->db = new Database();
    }
    
    public function get_posts(){
        // order by 1 desc limit :start_from , :per_page
        $this->db->query("select * from post where user_id = :user_id ORDER BY created_at DESC");
        $this->db->bind(':user_id' , $this->user_id);
        // $this->db->bind(':start_from' , $this->start_from);
        // $this->db->bind(':per_page' , $this->per_page);
        $posts = $this->db->resultset(); 
        if(!isset($posts)){
            return false;
        }else{
            return $posts;
        }
    }

    // public function getUser($user_id){
    //     $this->db->query('select * from users where id=:id');
    //     $this->db->bind(':id' , $user_id);
    //     return $this->db->execute();
    // }

    public function getAllPosts(){
        return $this->db->query('select * from posts');
    }


}
?>