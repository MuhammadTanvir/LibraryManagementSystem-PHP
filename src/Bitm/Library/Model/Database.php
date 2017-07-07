<?php
namespace App\Bitm\Library\Model;
class Database{
   public $conn;
    public function __construct(){
        
        $this->conn= mysqli_connect("localhost","root","","library") or die("Database connection establish failed");
        
    }
    
}