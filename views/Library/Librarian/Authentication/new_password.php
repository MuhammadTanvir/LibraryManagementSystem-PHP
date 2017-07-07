<?php
include_once('../vendor/autoload.php');
use App\Message\Message;
use App\Utility\Utility;
session_start()?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System\Register\Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="../Resource/Theme/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Resource/Theme/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Resource/Theme/css/form-elements.css">
    <link rel="stylesheet" href="../Resource/Theme/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../Resource/Theme/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../Resource/Theme/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../Resource/Theme/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../Resource/Theme/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../Resource/Theme/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

<?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
    echo Message::message();
}
?>

<!-- Top content -->
<div class="top-content">
    <div class="container">

        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text">
                <h1> Library Management System</h1>
                <div class="description">
                    <p>
                        This is a  library management system.To access to this system you have to Login First.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class=" col-sm-offset-5 col-sm-10  show-forms">
                <span class="show-register-form active ">Change Password</span>

            </div>
        </div>





        <div class="row register-form">

            <div class="col-sm-4 col-sm-offset-4">
                <form role="form" action="Authentication/change_password.php" method="post" class="r-form">
                    <div class="form-group">
                        <label class="sr-only" for="r-form-first-name">Email</label>
                        <input type="email" name="email" placeholder="Email..." class="r-form-first-name form-control" id="r-form-first-name">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="r-form-last-name">Password</label>
                        <input type="password" name="password" placeholder="Old password..." class="r-form-last-name form-control" id="r-form-last-name">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="r-form-email">New Password</label>
                        <input type="password" name="newpassword" placeholder="New Password..." class="r-form-email form-control" id="r-form-email">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="r-form-email">Confirm New Password</label>
                        <input type="password" name="confirmnewpassword" placeholder="Confirm New Password..." class="r-form-email form-control" id="r-form-email">
                    </div>


                    <button type="submit" name="submit" value="submit" class="btn">Change !</button>
                </form>
                <div class="social-login">
                    <p>Or login with:</p>
                    <div class="social-login-buttons">
                        <a class="btn btn-link-1" href="#"><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-link-1" href="#"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-link-1" href="#"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
            </div>


        </div>

        <div class="row login-form">
            <div class="col-sm-4 col-sm-offset-4">

            </div>


        </div>

    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-sm-offset-2">
                <div class="footer-border"></div>
                <p>Made by <a href="https://www.facebook.com/groups/1249070245103366/" target="_blank">Code Warriors</a>.</p>
            </div>

        </div>
    </div>
</footer>

<!-- Javascript -->
<script src="../Resource/Theme/js/jquery-1.11.1.min.js"></script>
<script src="../Resource/Theme/bootstrap/js/bootstrap.min.js"></script>
<script src="../Resource/Theme/js/jquery.backstretch.min.js"></script>
<script src="../Resource/Theme/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../Resource/Theme/js/placeholder.js"></script>
<![endif]-->

</body>

</html>