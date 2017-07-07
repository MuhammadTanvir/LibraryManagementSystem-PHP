<?php
include_once ('../../../../vendor/autoload.php');
//var_dump($_POST);

use App\Bitm\Library\Student\Student;
$student=new Student();
$singleStudent=$student->prepare($_GET)->view();
//Utility::d($singleBook);
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

<body>

<div class="container">
    <h2>View Student</h2>
    <ul class="list-group">
        <li class="list-group-item">First Name: <?php echo $singleStudent->first_name?></li>
        <li class="list-group-item">Last name: <?php echo $singleStudent->last_name?></li>
        <li class="list-group-item">ID: <?php echo $singleStudent->student_id?></li>
        <li class="list-group-item">Gender: <?php echo $singleStudent->gender?></li>
        <li class="list-group-item">Address: <?php echo $singleStudent->address ?></li>
        <li class="list-group-item">Contact No: <?php echo $singleStudent->contact?></li>
        <li class="list-group-item">Email: <?php echo $singleStudent->email ?></li>
        <li class="list-group-item">Session: <?php echo $singleStudent->session ?></li>
        <li class="list-group-item">Status: <?php echo $singleStudent->status ?></li>

    </ul>
</div>

<script src="../../../../resource/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../../../resource/js/bootstrap.min.js"></script>

<script src="../../../../resource/js/plugins/morris/raphael.min.js"></script>
<script src="../../../../resource/js/plugins/morris/morris.min.js"></script>
<script src="../../../../resource/js/plugins/morris/morris-data.js"></script>

</body>
</html>

