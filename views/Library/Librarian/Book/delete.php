<?php
include_once ('../../../../vendor/autoload.php');
use App\Bitm\Library\Book\Book;


$book= new Book();
$book->prepare($_GET)->delete();