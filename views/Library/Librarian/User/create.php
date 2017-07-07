<!DOCTYPE html>
<html lang="en">
<head>
    <title>Library Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>



<div class="container">
    <h2>Add User...</h2>
    <br><br>
    <form role="form" action="store.php" method="post">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" id="" placeholder="Enter username" required>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" id="" placeholder="Enter password" required>
        </div>

        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="firstname" class="form-control" id="" placeholder="Enter First Name" required>
        </div>

        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lastname" class="form-control" id="" placeholder="Enter Last Name" required>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

<br><br>
</body>
</html>
