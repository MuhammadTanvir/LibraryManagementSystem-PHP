<?php
include_once ('../../../../vendor/autoload.php');
use App\Bitm\Library\Issue\Issue;


$issue= new Issue();
$issue->prepare($_GET)->delete();