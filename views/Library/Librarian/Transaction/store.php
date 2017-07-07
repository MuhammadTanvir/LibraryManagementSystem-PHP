<?php
include_once ('../../../../vendor/autoload.php');
//var_dump($_POST);

use App\Bitm\Library\Transaction\Borrow;


$borrow = new Borrow();
$borrow->prepare($_POST)->store();
//$book->store();
