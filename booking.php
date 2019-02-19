<?php
session_start();
include_once 'classes.php';
    include_once 'user.php';
    $user = new User(); $uid = $_SESSION['uid'];
    if (!$user->get_session()){
        header("location:login.php");
    }
    if (isset($_GET['q'])){
        $user->user_logout();
    header("location:login.php");
 }

 if(isset($_POST['submit'])) {
     $mkBooking = new bookings;
     $mkBooking->postToDb($conn);

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
    <form action="booking.php" method="post">
        <div>
            Check in date:
            <input type="date" name="date1" id="date" class="form">
            <br>
            <br>
            Check out date:
            <input type="date" name="date2" id="date" class="form">
            <br>
            <div>
                <br>
            <select value="No. of guests" name="adults">
                <option name="guests" id="0">No. of adults</option>
                <option name="guests" id="1">1</option>
                <option name="guests" id="2">2</option>
                <option name="guests" id="3">3</option>
                <option name="guests" id="4">4</option>
            </select>
            <select value="No. of guests" name="children">
                <option name="guests" id="0">No. of children</option>
                <option name="guests" id="1">1</option>
                <option name="guests" id="2">2</option>
                <option name="guests" id="3">3</option>
                <option name="guests" id="4">4</option>
            </select>
            </div>
            <br>
            <div>
            <select value="Amount of rooms" name="rooms">
                <option name="rooms" id="">No. of rooms</option>
                <option name="rooms" id="">1</option>
                <option name="rooms" id="">2</option>
                <option name="rooms" id="">3</option>
                <option name="rooms" id="">4</option>
            </select>
            </div>
            <br>
            <div class="hotel">
            <select value="Hotels">
                <option name="hotels" id="" disabled="disabled">--Select hotel--</option>
                <option name="hotels" id="">2</option>
                <option name="hotels" id="">3</option>
                <option name="hotels" id="">4</option>
            </select>
        </div>
        <br>
        <button type="submit" name="submit" class="submit_btn">Submit</button>
    </form>
</div>

<div id="footer"></div>

</body>
</html>