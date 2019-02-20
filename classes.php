<?php
require_once 'user.php';

    class sql{
        public $db;
        public function __construct(){
            $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            if(mysqli_connect_errno()) {
                echo "Error: Could not connect to database.";
                    exit;
            }
            $_SESSION['db'] = $this->db;
        }

    }
    class bookings {
        
        public $adults;
        public $children;
        public $hotel;
        public $date1;
        public $date2;

        function postToDb($db) {
            $this->adults = $_POST['adults'];
            $this->children = $_POST['children'];
            $this->hotel = $_POST['hotel'];
            $this->date1 = $_POST['date1'];
            $this->date2 =$_POST['date2'];

            if($db->query("INSERT INTO bookings('adults', 'children', 'hotel', 'date1', 'date2') VALUES('$this->adults', '$this->children', '$this->hotel', '$this->date1', '$this->date2')")) {
                
            }   else {
                echo "ERROR 404." . $db->error;
            }
        }
    }
?>