<?php
session_start();
include_once ('../../../../vendor/autoload.php');


use App\Bitm\SEIP1292\User\User;
use App\Bitm\SEIP1292\Utility\Utility;
use App\Bitm\SEIP1292\Message\Message;

$user = new User();

//Utility::d($allBook);

$totalItem = $user->count();
//Utility::dd($totalItem);

if (array_key_exists('itemPerPage',$_SESSION)) {
    if (array_key_exists('itemPerPage',$_GET)) {
        $_SESSION['itemPerPage'] = $_GET['itemPerPage'];
    }
    //else {
    //    $_SESSION['itemPerPage'] = 5;
    //}
}
else {
    $_SESSION['itemPerPage'] = 5;
}
$itemPerPage = $_SESSION['itemPerPage'];

$noOfPage= ceil($totalItem/$itemPerPage);
//Utility::d($noOfPage);

$pagination = "";
if (array_key_exists('pageNo',$_GET)){
    $pageNo= $_GET['pageNo'];
}
else{
    $pageNo=1;
}
for ($i=1; $i<=$noOfPage; $i++){
    $active=($i==$pageNo)?"active":"";
    $pagination.= "<li class='$active'><a href='index.php?pageNo=$i'>$i</a></li>";
}



$pageStartFrom = $itemPerPage*($pageNo-1);

$prevPage=$pageNo-1;
$nextPage=$pageNo+1;

$allUser=$user->paginator($pageStartFrom, $itemPerPage);

?>


<!DOCTYPE html>
<html>
<head>
    <title>LBS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../../Resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../../Resources/bootstrap/js/bootstrap.js">
</head>

<body>

<div class="container">
    <h2>Users List:</h2>
    <br>
   <a href=""></a>
    <a href="create.php" class="btn btn-info" role="button">Add User</a>
    <!-- <a href="trashed.php" class="btn btn-primary" role="button">View Trashed Item</a><br><br>-->

    <div id="message">
        <?php
        if((array_key_exists('message',$_SESSION))&& !empty($_SESSION['message'])) {
            echo Message::message();
        }
        ?>
    </div>

    <form role="form" action="index.php">
        <div class="form-group">
            <label for="sel1">Select item per page (select one):</label>
            <select class="form-control" id="sel1" name="itemPerPage">
                <option<?php if($itemPerPage==5){?> selected <?php }?>>5</option>
                <option<?php if($itemPerPage==10){?> selected <?php }?>>10</option>
                <option<?php if($itemPerPage==15){?> selected <?php }?>>15</option>
                <option<?php if($itemPerPage==20){?> selected <?php }?>>20</option>
                <option<?php if($itemPerPage==25){?> selected <?php }?>>25</option>
            </select>


        </div>
        <button type="submit" class="btn btn-default">GO!</button>
    </form>
    <br><br>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>SL#</th>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sl=0;
            foreach ($allUser as $user){
                $sl++;
                ?>
                <tr>
                    <td><?php echo $sl+$pageStartFrom ?></td>
                    <td><?php echo $user->user_id?></td>
                    <td><?php echo $user->username?></td>
                    <td><?php echo $user->password?></td>
                    <td><?php echo $user->firstname?></td>
                    <td><?php echo $user->lastname?></td>
                    <td>
                    <!-- <a href="view.php?id=--><?php //echo $book->id?><!--" class="btn btn-info" role="button">View</a>-->
                        <a href="edit.php?id=<?php echo $user->user_id?>" class="btn btn-primary" role="button">Edit</a>
                        <a href="delete.php?id=<?php echo $user->user_id ?>" class="btn btn-danger" role="button">Delete</a>
                    <!-- <a href="trash.php?id=--><?php //echo $book->id ?><!--" class="btn btn-info" role="button">Trash</a>-->
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

        <ul class="pagination">
            <?php if($pageNo>1){?>
                <li><a href="index.php?pageNo=<?php echo $prevPage?>">Prev</a></li>
            <?php }?>

            <?php echo $pagination?>

            <?php if($pageNo<$noOfPage){?>
                <li><a href="index.php?pageNo=<?php echo $nextPage?>">Next</a></li>
            <?php }?>
        </ul>
    </div>
</div>

<script>
    $('#message').show().delay(2000).fadeOut();
</script>

</body>
</html>
