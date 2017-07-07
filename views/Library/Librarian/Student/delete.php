<?php
include_once('../../../../vendor/autoload.php');
use App\Bitm\Library\Student\Student;

$student= new Student();
$student->prepare($_GET)->delete();