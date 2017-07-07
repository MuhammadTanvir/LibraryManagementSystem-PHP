<?php

include '../Authentication/gate.php';

use App\Bitm\Library\Book\Book;
use App\Bitm\Library\Category\Category;
use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

$book = new Book();
$allBook = $book->prepare($_POST)->count();

$category = new Category();
$allCategory = $category->prepare($_POST)->index();

$allTitle=$book->title();
$comma_separated_title= '"'.implode('","',$allTitle).'"';

$allAuthor=$book->author();
$comma_separated_author= '"'.implode('","',$allAuthor).'"';

$comma_separated='"'.$comma_separated_title.$comma_separated_author.'"';

$totalItem=$book->count();
if(array_key_exists('itemPerPage',$_SESSION)) {
    if(array_key_exists('itemPerPage',$_GET)){
        $_SESSION['itemPerPage']=$_GET['itemPerPage'];
    }
}
else{
    $_SESSION['itemPerPage']=5;
}
$itemPerPage= $_SESSION['itemPerPage'];
$noOfPage=ceil($totalItem/$itemPerPage);
$pagination="";
if(array_key_exists('pageNo',$_GET)){
    $pageNo= $_GET['pageNo'];
}else {
    $pageNo = 1;
}
for($i=1;$i<=$noOfPage;$i++){
    $active=($i==$pageNo)?"active":"";
    $pagination.="<li class='$active'><a href='index.php?pageNo=$i'>$i</a></li>";
}

$pageStartFrom=$itemPerPage*($pageNo-1);

if(strtoupper($_SERVER['REQUEST_METHOD']=='GET')) {
    $allBook = $book->paginator($pageStartFrom, $itemPerPage);
}
if(strtoupper($_SERVER['REQUEST_METHOD']=='POST')) {
    $allBook = $book->prepare($_POST)->index();
}


if(strtoupper(($_SERVER['REQUEST_METHOD']=='GET')) && isset($_GET['search'])) {
    $allBook = $book->prepare($_GET)->index();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Library Management System 2016</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../../../resource/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../../../resource/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../../../resource/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../../../resource/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style=" background-color: #fff;">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=""><i class="fa fa-fw fa-dashboard"></i> Library Management System - Dashboard</a>
        </div>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="../dashboard.php"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="create.php"> <i class="fa fa-fw fa-book"></i> Add Books</a>
                </li>
                <li class="active">
                    <a href="index.php"><i class="fa fa-fw fa-th"></i> All Book in Library</a>
                </li>
                <li>
                    <a href="../Student/create.php"><i class="fa fa-fw fa-male"></i> Add Students</a>
                </li>
                <li>
                    <a href="../Student/index.php"><i class="fa fa-fw fa-users"></i> All Students List</a>
                </li>
                <li>
                    <a href="../Issue/create.php"><i class="fa fa-fw fa-sign-out"></i> Issue/Return Book</a>
                </li>
                <li>
                    <a href="../Issue/index.php"><i class="fa fa-fw fa-list-ul"></i> View all books currently issued</a>
                </li>
                <li>
                    <a href="../Authentication/logout.php"><i class="fa fa-fw fa-wrench"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header breadcrumb">
                    All Books List
                </h1>
            </div>
        </div>
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <div id="message">
                        <?php
                        if((array_key_exists('message',$_SESSION))&& !empty($_SESSION['message'])) {
                            echo Message::message();
                        }
                        ?>
                    </div>

                    <form role="form" action="index.php" method="post" class="form-inline">
                        <div class="form-group col-lg-4">
                            <label>Filter by Title:</label>
                            <input class="form-control" type="text" name="filterByTitle" value="" id="title">
                        </div>
                        <button type="submit" class="btn btn-primary">Go!</button>

                    </form>

                    <br>

                    <div class="table-responsive col-md-12 text-center ">

                        <form role="form" action="index.php" method="get" class="form-inline navbar-left">
                            <div class="form-group">
                                <label>Search:</label>
                                <input  class="form-control" type="text" name="search" value="" id="search">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                            <br>

                        </form>

                        <form role="form" action="index.php" class="navbar-right">
                            <select class="form-control"  id="sel1" name="itemPerPage"  onchange='this.form.submit()'>
                                <option<?php if($itemPerPage==5){?> selected <?php }?>>5</option>
                                <option<?php if($itemPerPage==10){?> selected <?php }?>>10</option>
                                <option<?php if($itemPerPage==15){?> selected <?php }?>>15</option>
                                <option<?php if($itemPerPage==20){?> selected <?php }?>>20</option>
                                <option<?php if($itemPerPage==25){?> selected <?php }?>>25</option>
                            </select><noscript><input type="submit" value="Submit"></noscript>
                        </form> <br/>

                        <table class="table table-striped table-bordered" style="margin-top: 30px">
                            <thead align="center">
                            <tr>
                                <th>Sl.</th>
                                <th>Acc No.</th>
                                <th>Book Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th class="action">copies</th>
                                <th>Book Pub</th>
                                <th>Publisher Name</th>
                                <th>ISBN</th>
                                <th>Copyright Year</th>
                                <th>Date Added</th>
                                <th class="action">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $sl=0;
                            foreach ($allBook as $book){
                                $sl++?>
                                <tr>
                                    <td><?php echo $sl+$pageStartFrom?></td>
                                    <td><?php echo $book->book_id ?></td>
                                    <td><?php echo $book->book_title ?></td>
                                    <td><?php echo $book->category_id ?></td>
                                    <td><?php echo $book->author ?></td>
                                    <td><?php echo $book->book_copies ?></td>
                                    <td><?php echo $book->book_pub ?></td>
                                    <td><?php echo $book->publisher_name ?></td>
                                    <td><?php echo $book->isbn ?></td>
                                    <td><?php echo $book->copyright_year ?></td>
                                    <td><?php echo $book->date_added ?></td>
                                    <td>
                                        <a href="edit.php?book_id=<?php echo $book->book_id ?>" ><i class="fa fa-edit"></i></a>
                                        <a href="delete.php?book_id=<?php echo $book->book_id ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php }?>

                            </tbody>
                        </table>

                        <?php if(strtoupper($_SERVER['REQUEST_METHOD']=='GET')) { ?>
                                    <ul class="pagination navbar-right">
                                <?php if( $pageNo > 1 ): ?>
                                    <li><a href="index.php?pageNo=<?php $prev = $pageNo-1; echo $prev; ?>">Prev</a></li>
                                <?php endif; ?>

                                <?php echo $pagination; ?>

                                <?php  if( $pageNo < $noOfPage ): ?>
                                    <li><a href="index.php?pageNo=<?php $next = $pageNo+1; echo $next;?>">Next</a></li>
                                <?php endif; ?>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
</div>

<!-- jQuery -->
<script src="../../../../resource/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../../../resource/js/bootstrap.min.js"></script>
<script>
    $('#message').show().delay(3000).fadeOut();
</script>

<script>
    $( function() {
        var availableTags = [
            <?php echo $comma_separated_title?>
        ];
        $( "#title" ).autocomplete({
            source: availableTags
        });
    } );
</script>

<script>
    $( function() {
        var availableTags = [
            <?php echo $comma_separated_author?>
        ];
        $( "#author" ).autocomplete({
            source: availableTags
        });
    } );
</script>

<script>
    $( function() {
        var availableTags = [
            <?php echo $comma_separated?>
        ];
        $( "#search" ).autocomplete({
            source: availableTags
        });
    } );
</script>

<!-- Morris Charts JavaScript -->
<script src="../../../../resource/js/plugins/morris/raphael.min.js"></script>
<script src="../../../../resource/js/plugins/morris/morris.min.js"></script>
<script src="../../../../resource/js/plugins/morris/morris-data.js"></script>

</body>

</html>
