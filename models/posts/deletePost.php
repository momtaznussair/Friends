<?php

require_once('/xampp/htdocs/friends/models/database.php');

  class DeletePostModel {

    private $id;
    private $user_id;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function delete_posts($id,$user_id){
      $this->db->query("delete from post where id = :id and user_id = :user_id");
      $this->db->bind(':id' , $id);
      $this->db->bind(':user_id' , $user_id);
      $this->db->execute();
  }


  }

  


?>