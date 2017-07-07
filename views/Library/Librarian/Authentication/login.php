<?php
session_start();

include_once ('../../../../vendor/autoload.php');

use App\Bitm\Library\User\User;
use App\Bitm\Library\User\Author;
use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

$auth=new Author();
$status=$auth->prepare($_POST)->is_registered();
if($status){
    $_SESSION['user_email']=$_POST['email'];
    return Utility::redirect('../dashboard.php');
}
else{
    Message::message("<div class='alert alert-danger'>Wrong Email or password !</div>");
    return Utility::redirect('../../../../index.php');

}
