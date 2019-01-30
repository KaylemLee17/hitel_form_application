<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kaylem's Hotel booking form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.7.2/css/bulma.min.css" /> -->
    <link rel="stylesheet" href="css/main.css">
    <script src="main.js"></script>
</head>
<body>
    <div class="heading">
        <h2>Online Hotel Booking Form</h2>
    </div>
    <div class="form">
        <form action="index.php" method="post">
            <div>
                <p>Name:</p>
                <input type="text" name="Name" class="name" placeholder="Name">
            </div>
            <div>
                <p>Surname:</p>
                <input type="text" name="Surname" class="name" placeholder="Surname">
            </div>
            <div>
                <p>Number of nights:</p>
                <input type="number" name="number" id="">
            </div>
            <div>
                <p>Name of Hotel:</p>
                <select name="Hotel name" id="" disabled="disabled">-Select one-
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
            <button type="submit" name="submit" class="add_btn">Submit</button>
        </form>
    </div>
</body>
</html>