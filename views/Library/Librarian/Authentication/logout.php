<?php
session_start();
include_once ('../../../../vendor/autoload.php');

use App\Bitm\Library\User\User;
use App\Bitm\Library\User\Author;
use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

$auth=new Author();
$status=$auth->log_out();
if($status){
    Message::message("You are successfully logged-out");
    return Utility::redirect('../../../../index.php');
}