<?php
namespace App\Model;
class Database{
   public $conn;
    public function __construct(){
        
        $this->conn= mysqli_connect("localhost","root","","library");
        
    }
    
}