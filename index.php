<?php
include_once ('vendor/autoload.php');

use App\Bitm\Library\Message\Message;
use App\Bitm\Library\Utility\Utility;

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
    <link rel="stylesheet" href="resource/Theme/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/Theme/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="resource/Theme/css/form-elements.css">
    <link rel="stylesheet" href="resource/Theme/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="resource/Theme/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="resource/Theme/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="resource/Theme/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="resource/Theme/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="resource/Theme/ico/apple-touch-icon-57-precomposed.png">

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
                        <!--This is a  library management system.To access to this system you have to Login First.-->
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class=" col-sm-offset-5 col-sm-10  show-forms">
                <span class="show-register-form active  ">Register</span>
                <span class="show-forms-divider">/</span>
                <span class="show-login-form ">Login</span>
            </div>
        </div>





        <div class="row login-form ">

            <div class="col-sm-4 col-sm-offset-4">
                <form role="form" action="views/Library/Librarian/Authentication/login.php" method="post" class="l-form">
                    <div class="form-group">
                        <label class="sr-only" for="l-form-username">Email...</label>
                        <input type="text" name="email" placeholder="Enter Email ..." class="l-form-username form-control" id="l-form-username">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="l-form-password">Password</label>
                        <input type="password" name="password" placeholder="Password..." class="l-form-password form-control" id="l-form-password">
                    </div>
                    <div class="col-sm-6"><a href="views/Library/Librarian/Authentication/new_password.php">Change Password</a></div>
                    <button type="submit" class="btn">Sign in!</button>
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

        <div class="row register-form ">
            <div class="col-sm-4 col-sm-offset-4">
                <form role="form" action="views/Library/Librarian/Authentication/registration.php" method="post" class="r-form">
                    <div class="form-group">
                        <label class="sr-only" for="r-form-first-name">First name</label>
                        <input type="text" name="first_name" placeholder="First name..." class="r-form-first-name form-control" id="r-form-first-name">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="r-form-last-name">Last name</label>
                        <input type="text" name="last_name" placeholder="Last name..." class="r-form-last-name form-control" id="r-form-last-name">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="r-form-email">Email</label>
                        <input type="email" name="email" placeholder="Email..." class="r-form-email form-control" id="r-form-email">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="r-form-email">Password</label>
                        <input type="password" name="password" placeholder="Password..." class="r-form-email form-control" id="r-form-email">
                    </div>


                    <button type="submit" class="btn">Sign me up!</button>
                </form>
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
<script src="resource/Theme/js/jquery-1.11.1.min.js"></script>
<script src="resource/Theme/bootstrap/js/bootstrap.min.js"></script>
<script src="resource/Theme/js/jquery.backstretch.min.js"></script>
<script src="resource/Theme/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="resource/Theme/js/placeholder.js"></script>
<![endif]-->
</script>

<script>
    $('#message').show().delay(3000).fadeOut();
</script>


</body>
</html>


</body>

</html>