<?php
session_start();

include_once ('../../../../vendor/autoload.php');

use App\Bitm\Library\User\User;
use App\Bitm\Library\User\Author;
use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

$auth=new Author();
$exist=$auth->prepare($_POST)->is_exist();

if($exist){
    Message::setMessage("<div class='alert alert-danger'><strong>Taken!</strong> Email has already been taken .</div>");
    return Utility::redirect('../../../../index.php');
}
else{
    $obj= new User();
    $obj->prepare($_POST)->store();
}
