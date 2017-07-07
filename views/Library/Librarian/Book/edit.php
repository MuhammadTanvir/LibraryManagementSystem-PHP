<?php
session_start();
include '../Authentication/gate.php';

use App\Bitm\Library\Book\Book;
use App\Bitm\Library\Utility\Utility;
use App\Bitm\Library\Message\Message;

$book = new Book();
$singleItem=$book->prepare($_GET)->view();

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
                    <a href="create.php"><i class="fa fa-fw fa-book"></i> Add Books</a>
                </li>
                <li>
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

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Edit Books
                    </h1>
                    <ol class="breadcrumb">

                        <li class="active">
                            <i class="fa fa-edit"></i> Forms
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">

                    <form role="form" action="update.php" method="post" class="form-horizontal">

                        <div class="form-group">
                            <input type="hidden" name="book_id"  value="<?php echo $singleItem->book_id?>">
                            <label class="col-lg-3 text-right">Book_title:</label>
                            <div class="col-lg-7"><input type="text" class="span4" id="inputEmail" name="book_title" value="<?php echo $singleItem->book_title?>" required><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 text-right">Category</label>
                            <div class="col-lg-7"><select name="category" required>
                                    <option <?php if ($singleItem->category == "Periodical") { echo "selected"; }?>>Periodical</option>
                                    <option <?php if ($singleItem->category == "English") { echo "selected"; }?>>English</option>
                                    <option <?php if ($singleItem->category == "Math") { echo "selected"; }?>>Math</option>
                                    <option <?php if ($singleItem->category == "Science") { echo "selected"; }?>>Science</option>
                                    <option <?php if ($singleItem->category == "Encyclopedia") { echo "selected"; }?>>Encyclopedia</option>
                                    <option <?php if ($singleItem->category == "Filipiniana") { echo "selected"; }?>>Filipiniana</option>
                                    <option <?php if ($singleItem->category == "Newspaper") { echo "selected"; }?>>Newspaper</option>
                                    <option <?php if ($singleItem->category == "General") { echo "selected"; }?>>General</option>
                                    <option <?php if ($singleItem->category == "References") { echo "selected"; }?>>References</option>
                                </select><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 text-right">Author:</label>
                            <div class="col-lg-7">	<input type="text"  class="span4" id="inputPassword" name="author"  value="<?php echo $singleItem->author?>" required><br>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 text-right">Book Copies:</label>
                            <div class="col-lg-7"><input type="text" class="span1" id="inputPassword" name="book_copies"  value="<?php echo $singleItem->book_copies?>" required><br>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 text-right">Book Publication: </label>
                            <div class="col-lg-7"><input type="text"  class="span4" id="inputPassword" name="book_pub"  value="<?php echo $singleItem->book_pub?>" required><br>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 text-right">Publisher Name:</label>
                            <div class="col-lg-7"><input type="text"  class="span4" id="inputPassword" name="publisher_name"  value="<?php echo $singleItem->publisher_name?>" required><br>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 text-right">Isbn:</label>
                            <div class="col-lg-7"><input type="text"  class="span4" id="inputPassword" name="isbn"  value="<?php echo $singleItem->isbn?>" required><br>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 text-right">Copyright Year:</label>
                            <div class="col-lg-7"><input type="text" id="inputPassword" name="copyright_year"  value="<?php echo $singleItem->copyright_year?>" required><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 text-right">Date Added:</label>
                            <div class="col-lg-7"><input type="date" name="date_added" class="" id="date" value="<?php echo $singleItem->date_added?>"><br/>
                            </div>
                        </div>


                        <div class="col-lg-6 text-right"><button type="submit" class="btn btn-default text-center">Update Books</button><br><br></div>

                    </form>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

</div>

<!-- jQuery -->
<script src="../../../../resource/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../../../resource/js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../../../../resource/js/plugins/morris/raphael.min.js"></script>
<script src="../../../../resource/js/plugins/morris/morris.min.js"></script>
<script src="../../../../resource/js/plugins/morris/morris-data.js"></script>

</body>

</html>
