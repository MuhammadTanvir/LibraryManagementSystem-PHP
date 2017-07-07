<?php
include_once('../../../../vendor/autoload.php');

use App\Bitm\SEIP1292\User\User;
use App\Bitm\SEIP1292\Utility\Utility;

$user= new User();
$singleItem=$user->prepare($_GET)->view();
//Utility::dd($singleItem);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>LMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../../Resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../../Resources/bootstrap/js/bootstrap.js">
</head>
<body>
<div class="container">
    <h2>Update User Info...</h2>
    <form role="form" action="update.php" method="post">
        <div class="form-group">
            <label>Update Book Title:</label>
            <input type="hidden" name="id" value="<?php echo $singleItem->id?>">
            <input type="text" name="title" class="form-control" id="" value="<?php echo $singleItem->title?>">
        </div>

        <button type="submit" class="btn btn-default">Update</button>
    </form>
</div>
<footer class="container-fluid text-center" style="background: lightgrey">
    <br>
    <p style="">All Rights Reserved...</p>
    <br>
</footer>
</body>
</html>