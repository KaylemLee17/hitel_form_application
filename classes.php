<?php
    class bookings {
        
        public $adults;
        public $children;
        public $hotel;
        public $date1;
        public $date2;

        function postToDb($conn) {
            $this->adults = $_POST['adults'];
            $this->children = $_POST['children'];
            $this->hotel = $_POST['hotel'];
            $this->date1 = $_POST['date1'];
            $this->date2 =$_POST['date2'];

            if($conn->query("INSERT INTO bookings(adults, children, hotel, date1, date2) VALUES('$this->adults', '$this->children', '$this->hotel', '$this->date1', '$this->date2')")) {

            }   else {
                echo "ERROR 404." . $conn->error;
            }
        }
    }
?>