<?php
session_start();
include_once ('../../../../vendor/autoload.php');

use App\Bitm\Library\Student\Student;
use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

$student = new Student();
$totalStudent=$student->prepare($_POST)->count();

$allId= $student->allId();
//
//$allFirstName= $student->allFirstName();
//$allLastName= $student->allLastName();
//$commaSeparated= implode('","',$allFirstName);
//$commaSeparatedString= implode('","',$allLastName);
////$commaSeparatedStrings= implode('","',$allInfo);
//
//////Utility::dd($commaSeparatedString);
//$allTD= '"'.$commaSeparated.$commaSeparatedString.'"';

if(array_key_exists('itemPerPage',$_SESSION)) {
    if(array_key_exists('itemPerPage',$_GET)){
        $_SESSION['itemPerPage']=$_GET['itemPerPage'];
    }

}
else{
    $_SESSION['itemPerPage']=5;
}
$itemPerPage= $_SESSION['itemPerPage'];


$noOfPage=ceil($totalStudent/$itemPerPage);
////Utility::d($noOfPage);

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
$allStudent = $student->paginator($pageStartFrom, $itemPerPage);
}

if(strtoupper($_SERVER['REQUEST_METHOD']=='POST')) {
    $allStudent = $student->prepare($_POST)->index();
}


if(strtoupper(($_SERVER['REQUEST_METHOD']=='GET')) && isset($_GET['search'])) {
    $allStudent = $student->prepare($_GET)->index();
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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
                    <a href="../Book/create.php"> <i class="fa fa-fw fa-book"></i> Add Books</a>
                </li>
                <li>
                    <a href="../Book/index.php"><i class="fa fa-fw fa-th"></i> All Book in Library</a>
                </li>
                <li>
                    <a href="create.php"><i class="fa fa-fw fa-male"></i> Add Students</a>
                </li>
                <li class="active">
                    <a href="index.php"><i class="fa fa-fw fa-users"></i> All Students List</a>
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
                    All Students List
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

                    <form role="form" action="index.php" class="navbar-right">
                    <select  id="sel1" name="itemPerPage">


                            <option<?php if($itemPerPage==5){?> selected <?php }?>>5</option>
                            <option<?php if($itemPerPage==10){?> selected <?php }?>>10</option>
                            <option<?php if($itemPerPage==15){?> selected <?php }?>>15</option>
                            <option<?php if($itemPerPage==20){?> selected <?php }?>>20</option>
                            <option<?php if($itemPerPage==25){?> selected <?php }?>>25</option>
                        </select><button type="submit">View:</button>
                    </form> <br/>


                </div>

<!--                <form role="form" action="index.php" method="post" class="form-inline">-->
<!--                    <div class="form-group col-lg-4">-->
<!--                        <label>Filter by First Name:</label>-->
<!--                        <input class="form-control" type="text" name="filterByfirstName" value="" id="first_name">-->
<!--                    </div>-->
<!--                    <div class="form-group col-lg-4">-->
<!--                        <label>Filter by Last Name:</label>-->
<!--                        <input class="form-control" type="text" name="filterByLastName" value="" id="last_name">-->
<!--                    </div>-->
<!--                    <button type="submit" class="btn btn-default">Submit!</button>-->
<!---->
<!--                </form>-->
<!---->
<!--                <br>-->


                <form role="form" action="index.php" method="get">
                        <div class="form-group">
                            <label>Search:</label>
                            <input type="text" name="search" value=""id="search">
                            <button type="submit">Search By ID </button>
                        </div>


                        <table class="table table-striped table-bordered" style="margin-top: 15px">
                            <thead align="center">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Student Id</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Contact No.</th>
                                    <th>Email</th>
                                    <th>Session</th>
<!--                                    <th>Status</th>-->
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sl=0;
                                foreach ($allStudent as $student){
                                    $sl++?>
                                    <tr>
                                        <td><?php echo $student->first_name." ".$student->last_name?></td>
                                        <td><?php echo $student->student_id ?></td>
                                        <td><?php echo $student->gender ?></td>
                                        <td><?php echo $student->address ?></td>
                                        <td><?php echo $student->contact ?></td>
                                        <td><?php echo $student->email ?></td>
                                        <td><?php echo $student->session ?></td>
<!--                                        <td>--><?php //echo $student->status ?><!--</td>-->
                                        <td><a href="view.php?id=<?php echo $student->student_id ?>" class="btn btn-danger" role="button">View</a>
                                            <a href="edit.php?id=<?php echo $student->student_id ?>" class="btn btn-primary" role="button">Edit</a>
                                            <a href="delete.php?id=<?php echo $student->student_id ?>" class="btn btn-danger" role="button">Delete</a>
                                        </td>
                                    </tr>
                                <?php }?>

                                </tbody>
                            </table>

                                <ul class="pagination navbar-right">
                                <?php
                                $prev=$pageNo-1;
                                if($pageNo>1)

                                    echo "<li><a href='index.php?pageNo=$prev'>Previous</a></li>" ?>
                                <?php echo $pagination ?>

                                <?php
                                $next=$pageNo+1;
                                if($pageNo<$noOfPage)
                                    echo "<li><a href='index.php?pageNo=$next'>Next</a></li>" ?>

                            </ul>
                        </div>

                </div>
                <script>
                    $('#message').show().delay(3000).fadeOut();
                </script>



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
                        <?php echo $allID ?>
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