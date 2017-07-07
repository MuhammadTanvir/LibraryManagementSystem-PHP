<?php
session_start();

include_once ('../../../../vendor/autoload.php');

use App\Bitm\Library\User\User;
use App\Bitm\Library\User\Author;
use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

$auth=new Author();
$sta=$auth->change_pass($_POST);


