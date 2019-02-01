<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kaylem's Hotel booking form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.7.2/css/bulma.min.css" /> -->
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
                    <p>Name:</p>
                    <input type="text" name="Name" class="form" placeholder="Name" required>
                </div>
                <div>
                    <p>Surname:</p>
                    <input type="text" name="Surname" class="form" placeholder="Surname" reqired>
                </div>
                <div>
                    Check in date:
                    <input type="date" name="date" id="date" class="form">
                    <br>
                    Check out date:
                    <input type="date" name="date" id="date" class="form">
                </div>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">--Select Hotel--</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div> 
                <br>
                <button type="submit" name="submit" class="submit_btn">Submit</button>
            </form>
        
    </div>
</body>
</html>

