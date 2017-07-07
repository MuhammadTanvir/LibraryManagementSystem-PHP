<?php
//var_dump($_POST);
//echo $_POST['title']; 

include_once ('../../../../vendor/autoload.php');

use App\Bitm\SEIP1292\User\User;

$user=new User();
$user->prepare($_POST);
$user->store();

?>