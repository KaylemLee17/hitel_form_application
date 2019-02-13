<?php
//start session
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] ! == true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css">
    <script src="main.js"></script>
</head>
<body>
    <div class="page-head">
        <h1>Hello, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the online hotel booking form!</h1>
    </div>

    <p>
        <a href="reste-pw.php" class="reset-btn">Forgot password? Reset password here.</a>
        <a href="logout.php" class="logout-btn">Sign out</a>
    </p>
</body>
</html>