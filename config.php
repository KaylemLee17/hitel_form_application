<?php
    include_once('user.php');

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PW', '');
    define('DB_NAME', 'hotel_booking_form');

    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PW, DB_NAME);

    if($mysqli === false) {
        die("ERROR: Could not connect." . $mysqli->connect_error);
    }

?>