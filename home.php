<?php
session_start();
require_once 'user.php';

//internilizing user class
$user = new User;

//Creating bookings table if not exists
$user->db->query("CREATE TABLE IF NOT EXISTS bookings(
    bookingId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    hotel_Name VARCHAR (128) NOT NULL,
    date_in DATETIME NOT NULL,
    date_out DATETIME NOT NULL,
    num_adults INT (2) NOT NULL,
    num_child INT (1),
    num_rooms INT (1) NOT NULL,
    hotel_booked INT (1) NOT NULL DEFAULT 0)");

    $userID = $_SESSION['userID'];

    if (!$user->get_session()){
        header("location: login.php");
    }

    if(isset($_GET['q'])) {
        $user->user_logout();
        header("location: login.php");
    }

    if(isset($_POST['confirm'])) {
        $bookedID = $_SESSION['bookedID'];
        $user->confirm_booking($bookedID);
        header("location: confirmed.php");
    }   elseif(isset($_POST['cancelled'])) {
        header("location: confirmed.php");
    }
?>
<!-- end php -->
<!-- start html -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles.css">
    <script src="main.js"></script>
</head>
<body>
    <nav>
        Signed in as <?php $user->get_username($userID); ?>
    </nav>
    <section class="container">
        <h2 class="heading">Make a hotel reservation</h2>
        <!-- start form -->
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="hotel">--Select hotel--</label>
            <select name="hotel_name" id="">
                <option value="">--Please select a hotel of your choice.</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </form>
            <div class="input">
                <div>
                    <label for="check-in date">Check-in Date:</label>
                    <input type="date" name="date1" value="date1">
                </div>
                <div>
                    <label for="check-in date">Check-out Date:</label>
                    <input type="date" name="date2" value="date2">
                </div>
            </div>

            <div class="input">
                <div class="adults">
                    <label for="adults">No.of adults</label>
                    <input type="number" name="num_adults" min="1" max="15" value="1">
                </div>

                <div class="input">
                    <label for="children">No. of children</label>
                    <input type="number" name="num_children" min="0" max="15" value="1">
                </div>
            </div>

            <div class="input">
                <label for="No.of rooms">No. of rooms:</label>
                <input type="number" name="num_rooms" min="1" max="10">
            </div>

            <div class="submit-btn">
                <button type="submit">Submit</button>
            </div>
        </form>
        <!-- end of form -->

        <h2 class="heading" id="home">Welcome to Kay's online hotel reservations</h2>
        <p class="slogan">Making hotel reservations simple.</p>

        <div class="hotel1">
            <h3>Hotel 1</h3>
            <div class="img">
                <img src="/img/.." alt="">
            </div>
            <div class="info">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque cumque maxime quisquam? Repudiandae voluptas soluta ducimus vitae atque, culpa sunt modi rem sit consequatur, corrupti nulla tenetur non necessitatibus magnam?
            </div>
        </div>
        <div class="hotel2">
            <h3>Hotel 2</h3>
            <div class="img">
                <img src="/img/.." alt="">
            </div>
            <div class="info">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque cumque maxime quisquam? Repudiandae voluptas soluta ducimus vitae atque, culpa sunt modi rem sit consequatur, corrupti nulla tenetur non necessitatibus magnam?
            </div>
        </div>
        <div class="hotel3">
            <h3>Hotel 3</h3>
            <div class="img">
                <img src="/img/.." alt="">
            </div>
            <div class="info">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque cumque maxime quisquam? Repudiandae voluptas soluta ducimus vitae atque, culpa sunt modi rem sit consequatur, corrupti nulla tenetur non necessitatibus magnam?
            </div>
        </div>
    </section>

    <?php
    if(isset($_POST['submit'])){

    }
?>
    <script>
        document.getElementById("home").style.display = "none";
    </script>

    <?php
        if ($user->make_booking()) { ?>
        <?php $bookedID = $user->get_booking_id();
        $_SESSION['bookedID'] = $bookedID;
        
    ?>

    <div class="confirm-info">
        <div>
            Hello, <?php $user->get_fullname($userID); ?> , you are booking the <?php $user->get_hotel(); ?> hotel, for the dates of <?php $user->get_date1(); ?> to <?php $user->get_date2 ?>.
        </div>
        
        <ul>
            <li>Reservation I.D: <?php $user->display_resID(); ?></li>
            <li>No.of nights:<?php $user->get_num_nights(); ?></li>
            <li>No. of adults:<?php $user->get_num_adults(); ?></li>
            <li>No. of children:<?php $user->get_num_children ?></li>
            <li>No. of rooms:<?php $user->get_num_children ?></li>
            <li>Daily rate:<?php $user->get_rate(); ?></li>
        </ul>

        <p>Total cost: <?php $user->get_total(); ?></p>
    </div>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <button type="submit" name="confirm">Confirm reservation</button>
        </div>
        <div>
            <button name="cancel">Cancel reservation</button>
        </div>
    </form>

    <?php
        } else { 
            echo "Hello, $user->get_fullname($userID) Our records shows that you have alredy made this booking.";
        }

        //insert data into table
        $sql = INSERT INTO bookings('bookingId', 'hotel_name','date_in', 'date_out', 'num_adults', 'num_children', 'num_rooms', 'hotel_booked') VALUES ('?', '?', '?', '?', '?', '?', '?', '?');
    ?>

    <button class="home-btn">Home</button>

    <!-- jQuery script for axaj -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $('select').change(function() {
            var sel = $('select option: selected');
            if (sel.val() == hotel1) {
                $('.first').css('display', "block");
                $('.second').css('display', "none");
                $('.third').css('display', "none");
                $('.bookin').css('display', "none");
            }   elseif (sel.var() == hotel2) {
                    $('.first').css('display', "none");
                    $('.second').css('display', "block");
                    $('.third').css('display', "none");
                    $('.bookin').css('display', "none");
            }   elseif (sel.var() == hotel3) {
                    $('.first').css('display', "none");
                    $('.second').css('display', "none");
                    $('.third').css('display', "block");
                    $('.bookin').css('display', "none");
            }   elseif (sel.var() == "") {
                    $('.first').css('display', "none");
                    $('.second').css('display', "none");
                    $('.third').css('display', "none");
                    $('.bookin').css('display', "none");
            }
        });
    </script>
</body>
</html>


    