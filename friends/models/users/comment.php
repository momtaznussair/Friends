<?php 

// require_once ('/xampp/htdocs/friends/models/database.php');
require_once (DOCUMENT_ROOT.'/friends/models/database.php');


    class comment{
        private $post_id;
        private $user_id;
        private $body;
        private $img_link;
        private $db;

        function __construct($post_id , $user_id , $body , $img_link)
        {
            $this->post_id = $post_id;
            $this->user_id = $user_id;
            $this->body=$body;
            $this->img_link = $img_link;
            $this->db= new Database();
        }


        function retrieveAllPostComments($post_id){
            $this->db->query("SELECT body , image_link from comments where post_id = :post_id");
            $this->db->bind(':post_id', $post_id);
            $this->db->execute();
            return $this->db->lastinsertid(); 
        }

        


    }




?>