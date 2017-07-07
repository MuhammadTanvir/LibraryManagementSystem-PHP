<?php
namespace App\Bitm\Library\Student;

use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;


class Student{
    public $first_name="";
    public $last_name="";
    public $id="";
    public $gender="";
    public $address="";
    public $contact="";
    public $email="";
    public $session="";
//    public $status="";
    public $search="";
    public $conn;

    public function prepare($data=array())
    {
        if (array_key_exists("first_name", $data)) {
            $this->first_name = $data['first_name'];
        }
        if (array_key_exists("last_name", $data)) {
            $this->last_name = $data['last_name'];
        }
        if (array_key_exists("id", $data)) {
            $this->id = $data['id'];
        }
        if (array_key_exists("gender", $data)) {
            $this->gender = $data['gender'];
        }
        if (array_key_exists("address", $data)) {
            $this->address = $data['address'];
        }
        if (array_key_exists("contact", $data)) {
            $this->contact = $data['contact'];
        }
        if (array_key_exists("email", $data)) {
            $this->email = $data['email'];
        }

        if (array_key_exists("session", $data)) {
            $this->session= $data['session'];
        }
//        if (array_key_exists("status", $data)) {
//            $this->status= $data['status'];
//        }
        if (array_key_exists("search", $data)) {
            $this->search= $data['search'];
        }
        return $this;
    }


    public function __construct(){
        $this->conn= mysqli_connect("localhost","root","","library") or die("Database connection establish failed");
    }


    public function store()
    {
        $query = "INSERT INTO `library`.`student` (`student_id`, `first_name`, `last_name`, `gender`, `address`, `contact`, `email`,`session`) VALUES ('{$this->id}', '{$this->first_name}', '{$this->last_name}', '{$this->gender}', '{$this->address}', '{$this->contact}', '{$this->email}', '{$this->session}')";
        //echo $query;
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been stored successfully.
</div>");
            Utility::redirect('index.php');

        } else {
            Message::message("<div class=\"alert alert-info\">
  <strong>Error!</strong> Data has been stored successfully.
</div>");
            Utility::redirect('index.php');

        }
    }


    public  function index(){
        $_allStudent=array();
        $whereClause= " 1=1 ";

        if(!empty($this->search)){
            $whereClause .= " AND student_id LIKE '%".$this->search."%'";
        }
        $query= "SELECT * FROM `student` WHERE ".$whereClause;
        //$query= "SELECT * FROM `book` WHERE ".$whereClause;
        //echo $query;
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allStudent[]=$row;
        }
        return $_allStudent;
    }

    public function view(){
        $query="SELECT * FROM `student` WHERE `student_id`=".$this->id;
        // echo $query;
        $result= mysqli_query($this->conn,$query);
        $row= mysqli_fetch_object($result);
        return $row;
    }

    public function update(){
        $query= "UPDATE `library`.`student` SET `student_id` = '{$this->id}',`first_name` = '{$this->first_name}', `last_name` = '{$this->last_name}', `gender` = '{$this->gender}', `address` = '{$this->address}', `contact` = '{$this->contact}', `email` = '{$this->email}', `session` = '{$this->session}', `status` = '{$this->status}' WHERE `student`.`student_id` =" .$this->id;
        $result = mysqli_query($this->conn, $query);
        if($result){
            Message::message("<div class=\"alert alert-info\">
  <strong>Updated!</strong> Data has been updated successfully.
</div>");
            Utility::redirect('index.php');

        }
        else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been updated successfully.
</div>");
            Utility::redirect('index.php');

        }

    }
    public function delete()
    {
        $query = "DELETE FROM `library`.`student` WHERE `student`.`student_id` =".$this->id;;
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            Message::message("<div class=\"alert alert-info\">
  <strong>Updated!</strong> Data has been deleted successfully.
</div>");
            Utility::redirect('index.php');

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Error!</strong> Data has not been deleted successfully.
</div>");
            Utility::redirect('index.php');


        }
    }
    public function count(){
        $query="SELECT COUNT(*) AS totalItem FROM `student` ";
        $result= mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];
    }

    public function paginator($pageStartFrom=0,$Limit=5){
        $query="SELECT * FROM `student` LIMIT ".$pageStartFrom.",".$Limit;
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            $_allInfo[]=$row;
        }
        return $_allInfo;

    }
//    public function allFirstName(){
//        $_allStudent= array();
//        $query="SELECT first_name FROM `student`";
//        $result= mysqli_query($this->conn,$query);
//        while($row=mysqli_fetch_assoc($result)){
//            $_allStudent[]=$row['first_name'];
//        }
//        return $_allStudent;
//    }
//    public function allLastName(){
//        $_allStudent= array();
//        $query="SELECT last_name FROM `student`";
//        $result= mysqli_query($this->conn,$query);
//        while($row=mysqli_fetch_assoc($result)){
//            $_allStudent[]=$row['last_name'];
//        }
//        return $_allStudent;
//    }
//

    public function allId(){
        $_allStudent= array();
        $query="SELECT student_id FROM `student`";
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result)){
            $_allStudent[]=$row['student_id'];
        }
        return $_allStudent;
    }

}