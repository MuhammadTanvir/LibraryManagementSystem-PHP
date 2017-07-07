<?php
session_start();
include_once ('../../../../vendor/autoload.php');

use App\Bitm\Library\Transaction\Borrow;
use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

$borrow =new Borrow();
$allItem= $borrow-> prepare($_POST)-> index();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Borrow Book List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
    <h2>Borrow</h2> <br> <br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Acc No.</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Add</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $sl=0;
                foreach($allItem as $borrow){
                    $sl++; ?>
                    <tr>
                        <td><?php echo $sl?></td>
                        <td><?php echo $borrow->book_id ?></td>
                        <td><?php echo $borrow->book_title ?></td>
                        <td><?php echo $borrow->author ?></td>
                        <td><?php echo $borrow->category ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </form>

</div>

</body>
</html>

