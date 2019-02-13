<?php
    //session start
    if(!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must login first!";
        header('location: login.php');
    }

    if(isset($_GET[logout])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kaylem's Hotel booking form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <script src="/js/main.js"></script>
</head>
<body>
    <div>
        <div class="heading">
            <h2>Online Hotel Booking Form</h2>
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
</body>
</html>

