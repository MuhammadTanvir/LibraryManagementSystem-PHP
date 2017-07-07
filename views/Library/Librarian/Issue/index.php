

<?php
//session_start();
include '../Authentication/gate.php';

include_once ('../../../../vendor/autoload.php');
//var_dump($_POST);

use App\Bitm\Library\Issue\Issue;
use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

$issue = new Issue();
//$allIssue = $issue->prepare($_POST)->index();
//Utility::d($allBook);

$allStudent=$issue->studentID();
$comma_separated_student= '"'.implode('","',$allStudent).'"';

if(strtoupper($_SERVER['REQUEST_METHOD']=='GET')) {
    $allIssue = $issue->prepare($_POST)->index();
}
if(strtoupper($_SERVER['REQUEST_METHOD']=='POST')) {
    $allIssue = $issue->prepare($_POST)->index();
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
                <li class="active">
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

                    <div class="container">
                        <h2>All Issued Info:</h2> <br><br>
                        <a href="create.php" class="btn btn-info" role="button">Add Issue</a> <br><br>

                        <form role="form" action="index.php" method="post">
                            <div class="form-group">
                                <label>Student ID For Return:</label>
                                <input type="text" name="filterByStudent" value="" id="title">

                                <button type="submit">Submit!</button>
                            </div>
                        </form> <br>

                        <div id="message">
                            <?php
                            if((array_key_exists('message',$_SESSION))&& !empty($_SESSION['message'])) {
                                echo Message::message();
                            }
                            ?>
                        </div> <br>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Student ID</th>
                                    <th>Book ID</th>
                                    <th>Due Date</th>
                                    <th>Issue Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $sl=0;
                                foreach ($allIssue as $issue){
                                    $sl++; ?>
                                    <tr>
                                        <td><?php echo $sl ?></td>
                                        <td><?php echo $issue->student_id?></td>
                                        <td><?php echo $issue->book_id?></td>
                                        <td><?php echo $issue->due_date ?></td>
                                        <td><?php echo $issue->issue_date ?></td>
                                        <td>
                                             <a href="delete.php?id=<?php echo $issue->issue_id ?>" class="btn btn-danger" role="button">Return</a>
                                        </td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>

                        </div>
                    </div>


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
    $('#message').show().delay(2000).fadeOut();
</script>

<script>
    $( function() {
        var availableTags = [
            <?php echo $comma_separated_student?>
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



