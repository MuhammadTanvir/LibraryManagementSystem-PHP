<?php
namespace App\Bitm\Library\User;

use App\Bitm\Library\Model\Database as DB;
use App\Bitm\Library\Utility\Utility;
use App\Bitm\Library\Message\Message;

class Author extends DB{
        public $email = "";
        public $password = "";
    public $conn;

        public function __construct(){parent::__construct();}

    public function prepare($data = Array()){
        if(array_key_exists('email', $data)){
            $this->email = $data['email'];
        }
        if(array_key_exists('password', $data)){
            $this->password = md5($data['password']);
        }
        return $this;
    }

    public function is_exist(){
        $query = "SELECT * FROM `users` WHERE `email`='". $this->email ."'";

        $result = mysqli_query($this->conn, $query);
        $row= mysqli_num_rows($result);

        if($row>0){
            return TRUE;
        }
        else {
            return FALSE;
        }

    }

    public function is_registered(){
        $query = "SELECT * FROM `users` WHERE `email`='" . $this->email . "' AND `password`='" . $this->password . "'";
        $result = mysqli_query($this->conn, $query);
        $row= mysqli_num_rows($result);

        if($row>0){
            return TRUE;
        }
        else {
            return FALSE;
        }

    }

    public function log_out(){
        $_SESSION['user_email']="";
        return TRUE;
    }

    public function is_loggedin()
    {
        if ((array_key_exists('user_email', $_SESSION)) && (!empty($_SESSION['user_email']))) {
            return TRUE;
        }

    }


    public function view(){
        $query="SELECT * FROM `library`.`users` WHERE `email`='".$_SESSION['user_email']."'";
        $result=mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result)){
            return $row;
        }
    }

    public function change_pass(){

        if (isset($_POST['submit']) && $_POST['submit'] = "submit")
        {
            $email = mysqli_real_escape_string($this->conn,$_POST['email']);
            $newpassword = md5($_POST['newpassword']);
            $confirmnewpassword = md5($_POST['confirmnewpassword']);

            $result = mysqli_query($this->conn,"SELECT password FROM users WHERE email='$email'");

            if (!$result)
            {
                echo "The email entered does not exist!";
            }

            //else
              // if ($this->password != mysqli_result($this->result, 0)) {
                //   echo "Entered an incorrect password";
               //}

            if ($newpassword == $confirmnewpassword) {
                $sql = mysqli_query($this->conn,"UPDATE users SET password = '$newpassword' WHERE email = '$email'");
            }

            if ($sql) {
                Message::message("<div class='alert alert-danger'>New password set successfully.</div>");
                return Utility::redirect('../../index.php');
            } else {
                echo "New password and confirm password must be the same!";
                header("Location:../../index.php");
            }
        }

    }



}


