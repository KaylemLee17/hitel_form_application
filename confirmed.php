<?php
    //start session
    session_start();

    //include user.php
    require_once 'user.php';

    //instansiate user class
    $user = new User;

    $userID = $_SESSION['userID'];
    $bookedID = $_SESSION[bookedID];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/styles.css">
    <script src="main.js"></script>
</head>
<body>
    <div>
        <?php
            if(user->check_booking_confirmed($bookedID)) {
                echo "Your reservation has been successfully confirmed.";
            }   else {
                echo "Your reservation was cancelled.";
            }
        ?>
        <br>
        <a href="home.php">Home</a>
    </div>
</body>
</html>