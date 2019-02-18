<?php
session_start();
    include_once 'user.php';
    $user = new User(); $uid = $_SESSION['uid'];
    if (!$user->get_session()){
        header("location:login.php");
    }
    if (isset($_GET['q'])){
        $user->user_logout();
    header("location:login.php");
 }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/styles.css">
    <script src="main.js"></script>
</head>
<body>
<div id="container">
    <div id="header"><a href="login.php?q=logout">LOGOUT</a></div>
    <div id="main-body">
    <h1>Hello <?php $user->get_username($uid); ?> and welcome to online hotel booking.</h1>
</div>

<div class="form">
    <form action="index.php" method="post">
        <div>
            Check in date:
            <input type="date" name="date" id="date" class="form">
            <br>
            Check out date:
            <input type="date" name="date" id="date" class="form">
        </div>
        <div class="hotel">
            
        </div>
        <br>
        <button type="submit" name="submit" class="submit_btn">Submit</button>
    </form>
</div>

<div id="footer"></div>

</body>
</html>