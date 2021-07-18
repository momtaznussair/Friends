<?php 
require_once('../../models/database.php');

class postModel{
    private $body;
    private $image;
    private $user_id;

    public function __construct($body  , $image , $user_id)
    {
        $this->body = $body;
        $this->image = $image;
        $this->user_id = $user_id;
        $this->db = new Database();
    }

    public function insertPost()
    {
        $this->db->query("insert into post (body , image_link,  user_id) values (:body , :image,  :user_id)");
        $this->db->bind(':body' , $this->body);
        $this->db->bind(':image' , $this->image);
        $this->db->bind(':user_id' , $this->user_id);
        $this->db->execute();
        return $this->db->lastinsertid();
    }

}

?>