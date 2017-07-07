<?php
namespace App\Bitm\Library\User;

include_once('../../../../vendor/autoload.php');

use App\Bitm\Library\Utility\Utility;
use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Model\Database as DB;

class User extends DB{
    public $table="users";
    public $first_name="";
    public $last_name="";
    public $email="";
    public $password="";
    public $id="";

    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data=array()){
        if(array_key_exists('first_name',$data)){
            $this->first_name=$data['first_name'];
        }
        if(array_key_exists('last_name',$data)){
            $this->last_name=$data['last_name'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }

        return $this;


    }

    public function store(){
        $query="INSERT INTO `library`.`users` (`first_name`, `last_name`, `email`, `password`) VALUES ('".$this->first_name."', '".$this->last_name."', '".$this->email."', '".$this->password."')";
        $result= mysqli_query($this->conn,$query);
        if($result){
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> You have successfully register.
                </div>");
            Utility::redirect("../../../../index.php");
        } 
        else{
            Message::message("<div class=\"alert alert-danger\">
                            <strong>Failed!</strong> You have .not successfully register.</div>");
            Utility::redirect("../../index.php");
        }

    }




}
