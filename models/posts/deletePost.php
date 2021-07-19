<?php

require_once('/xampp/htdocs/friends/models/database.php');

  class DeletePostModel {

    private $post_id;
    private $user_id;

    public function __construct($post_id , $user_id)
    {
      $this->post_id = $post_id;
      $this->user_id = $user_id;
      $this->db = new Database();
    }
    public function delete_posts(){
      $this->db->query("delete from post where post.id = :id and user_id=:user_id");
      $this->db->bind(':id' , $this->post_id);
      $this->db->bind(':user_id' , $this->user_id);
      $deleted = $this->db->resultset();
      if($deleted){
        return true;
      }else{
        return false;
      }
  }


  }

  


?>