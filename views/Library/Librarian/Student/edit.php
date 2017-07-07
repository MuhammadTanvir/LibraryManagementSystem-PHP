<?php
session_start();
include_once('../../../../vendor/autoload.php');

use App\Bitm\Library\Student\Student;
use App\Bitm\Library\Utility\Utility;
use App\Bitm\Library\Message\Message;

$student= new Student();
$singleItem=$student->prepare($_GET)->view();
//Utility::dd($singleItem);


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
                        Edit Student Info
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
                            <label class="col-lg-3 text-right">Edit First Name:</label>
                            <div class="col-lg-7"><input type="text" class="span4" id="inputEmail" name="first_name" value="<?php echo $singleItem->first_name ?>" required><br>
                        </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 text-right">Edit Last Name:</label>
                                <div class="col-lg-7"><input type="text" class="span4" id="inputEmail" name="last_name" value="<?php echo $singleItem->last_name ?>" required><br>
                                </div>
                                </div>

                        <div class="form-group">
                            <label class="col-lg-3 text-right">Gender:</label>
                            <div class="col-lg-7"><select name=gender"" required>
                                            <option   value="male">Male</option>
                                            <option  value="female">Female</option>
                                        </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 text-right">Edit Address:</label>
                                <div class="col-lg-7"><input type="text" class="span4" id="inputEmail" name="address" value="<?php echo $singleItem->address ?>" required><br>
                                </div>
                                </div>

                            <div class="form-group">
                                <label class="col-lg-3 text-right">Edit Contact No.:</label>
                                <div class="col-lg-7"><input type="tel" class="span4" id="inputEmail" name="contact" value="<?php echo $singleItem->contact ?>" required><br>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 text-right">Edit Email:</label>
                                <div class="col-lg-7"><input type="tel" class="span4" id="inputEmail" name="email" value="<?php echo $singleItem->email ?>" required><br>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 text-right">Edit Session:</label>
                                <div class="col-lg-7"><input type="tel" class="span4" id="inputEmail" name="session" value="<?php echo $singleItem->session ?>" required><br>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 text-right">Edit Status:</label>
                                <div class="col-lg-7"><input type="tel" class="span4" id="inputEmail" name="status" value="<?php echo $singleItem->status ?>" required><br>
                                </div>
                            </div>
                <br>
                <br>

                            <div class="col-lg-6 text-right"><button type="submit" class="btn btn-default text-center">Update</button><br><br></div>

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
