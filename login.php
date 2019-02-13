<?php
    //Start session
    session_start();

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: welcome.php");
        exit;
    }

    //include config
    require_once "config.php";

    $username = $password = "";
    $username_err = $pw_err ="";

    //check if username is empty
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty(trim($_POST["username"]))) {
            $username_err = "Please enter username.";
        }   else {
            $username = trim($_POST["username"]);
        }

    //check if password is empty
    if(empty(trim($_POST["password"]))) {
        $pw_err = "Please enter your password.";
    }   else {
        $password = trim($_POST["password"]);
    }

    //validate credentails
    if(empty($username_err) && empty($pw_err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        if($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_username);

            //set parameters
            $param_username = $username;
            if($stmt->execute()) {
                //store restult
                $stmt->store_result();

                //check if username exists, verify pw
                if($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $username, $hashed_pw);

                    if($stmt->fetch()) {
                        if(password_verify($password, $hashed_pw)) {

                            //pw is correct - start session
                            session_start();

                            //store data in session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            
                            header("location: welcome.php");
                        }   else {
                            $pw_err = "The password you entered is invalid.";
                        }
                    }
                }   else {
                    $username_err = "No account was found with that username.";
                }
            }   else {
                echo "Something went wrong, try again in 10 years.";
            }
        }
        //close stmt
        $stmt->close();
    }

        //close connection
        $mysqli->close();

    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <h2 class="login">Login</h2>
    <p>Fill in your credentials to login.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
            <span>
                <?php echo $username_err; ?>
            </span>
        </div>
        <br>
        <div>
            <?php echo (!empty($pw_err)) ? 'has-error' : ''; ?>
            <label for="password">Password:</label>
            <input type="password" name="password">
            <span><?php echo $pw_err; ?></span>
        </div>
        <br>
        <div>
            <input type="submit" class="submit-btn" value="login">
        </div>
        <p>Don't have an account? <a href="register.php">Sign up now!</a></p>
    </form>
</body>
</html>