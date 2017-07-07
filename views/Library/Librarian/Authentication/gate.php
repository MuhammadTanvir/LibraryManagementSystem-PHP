<?php

session_start();
include_once ('../../../../vendor/autoload.php');

use App\Bitm\Library\User\User;
use App\Bitm\Library\User\Author;
use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

$auth=new Author();
$status=$auth->is_loggedin();
if($status== FALSE){
    Message::message("<div class=\"alert alert-danger\">
  <strong>Taken!</strong> You have to log in before view this page
</div>");
    return Utility::redirect('../../../../index.php');
}
?>