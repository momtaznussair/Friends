<?php

require_once ('/xampp/htdocs/friends/models/database.php');

class updatedata{
    private $username;
    private $password;
    private $userId;
    private $db;
    public function __construct($username,$password,$userId )
    {
        $this->username = $username;
        $this->password = $password;
        $this->userId=$userId;
        $this->db=new Database();

    }

    public function updatedata()
    {
        $this->db->query("UPDATE user set username = :username , `password` = :password  WHERE id = :id");

         $this->db->bind(':username', $this->username);
         $this->db->bind(':password', $this->password);
         $this->db->bind(':id', $this->userId);


        $this->db->execute();
    }

}
?>