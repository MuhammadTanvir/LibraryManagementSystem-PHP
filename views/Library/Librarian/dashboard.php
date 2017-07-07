<?php
session_start();
include_once ('../../../vendor/autoload.php');

use App\Bitm\Library\User\User;
use App\Bitm\Library\User\Author;
use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

$auth=new Author();
$status=$auth->is_loggedin();
if($status== FALSE){
    Message::message("<div class=\"alert alert-danger\">
  <strong>Taken!</strong> You have to log in before view this page
</div>");
    return Utility::redirect('../../../index.php');
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Library Management System 2016</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../../resource/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../../resource/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../../resource/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../../resource/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <li class="active">
                    <a href="dashboard.php"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="Book/create.php"><i class="fa fa-fw fa-book"></i> Add Books</a>
                </li>
                <li>
                    <a href="Book/index.php"><i class="fa fa-fw fa-th"></i> All Book in Library</a>
                </li>
                <li>
                    <a href="Student/create.php"><i class="fa fa-fw fa-male"></i> Add Students</a>
                </li>
                <li>
                    <a href="Student/index.php"><i class="fa fa-fw fa-users"></i> All Students List</a>
                </li>
                <li>
                    <a href="Issue/create.php"><i class="fa fa-fw fa-sign-out"></i> Issue/Return Book</a>
                </li>
                <li>
                    <a href="Issue/index.php"><i class="fa fa-fw fa-list-ul"></i> View all books currently issued</a>
                </li>

                <li>
                    <a href="Authentication/logout.php"><i class="fa fa-fw fa-wrench"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-center text-info">
                                    <i class="fa fa-th-list fa-5x"></i>
                                </div>
                                <div class="col-xs-12 text-center ">
                                    <div class="huge"><a href="Book/index.php"> All Books</a></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-center  text-info" >
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <div  style="font-size: 34px"><a href="Student/index.php">All Students</a></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-center  text-info" >
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <div class="huge"><a href="Issue/index.php">Issue Books</a></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="../../../resource/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../../resource/js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../../../resource/js/plugins/morris/raphael.min.js"></script>
<script src="../../../resource/js/plugins/morris/morris.min.js"></script>
<script src="../../../resource/js/plugins/morris/morris-data.js"></script>
<!-- Script to Activate the Carousel -->

</script>

<script>
    $('#message').show().delay(3000).fadeOut();
</script>



</body>
</html>


</body>

</html>
