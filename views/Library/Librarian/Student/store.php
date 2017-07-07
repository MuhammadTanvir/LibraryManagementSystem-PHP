<?php
include_once ('../../../../vendor/autoload.php');
//var_dump($_POST);

use App\Bitm\Library\Student\Student;


$student = new Student();
$student->prepare($_POST)->store();
//$book->store();



