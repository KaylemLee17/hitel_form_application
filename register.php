<?php
    //include the connect file
    require_once "config.php";

    $username = $password = $confirm_pw = "";
    $username_err = $pw_err = $confirm_pw_err = "";

    //Validate username
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
        }   else {
            $sql = "SELECT id FROM users WHERE username = ?";

            if($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("s", $param_username);

                $stmt->bind_param("s", $param_username);

                $param_username = trim($_POST["username"]);

                if($stmt->execute()) {
                    $stmt->store_result();

                    if($stmt->num_rows == 1) {
                        $username_err = "This username is already taken!";
                    }   else{
                        echo "Error: Something went wrong. Try again in 10 years...";
                    }
                }

                //close statement
                $stmt->close();
            }

            //Validate pw
            if(empty(trim($_POST["password"]))) {
                $pw_err = "Please enter a password";
            }   elseif(strlen(trim($_POST["password"])) < 6) {
                    $pw_err = "Password must have at least 6 charatcers.";
            }   else {
                $password = trim($_POST["password"]);
            }

            //confirm password
            if(empty(trim($_POST["confirm_pw"]))) {
                $confirm_pw_err = "Please confirm your password.";
                
            }   else {
                $confirm_pw = trim($_POST["confirm_pw"]);
                if(empty($pw_err) && ($password != $confirm_pw)) {
                    $confirm_pw_err = "Passwords don\'t match";
                }
            }

            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            
            if($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("ss", $param_username, $param_pw);

                $param_username = $username;
                //creating password hash
                $param_pw = password_hash($password, PASSWORD_DEFAULT);

                if($stmt->execute()) {
                    //redirect to login page
                    header("location: login.php");
                }   else {
                    echo "Something went wrong, please try again later.";
                }
            }

            //close statement
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
        <title>Sign up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="/css/main.css">
        <script src="main.js"></script>
    </head>
    <body>
        <div class="container">
            <p>Sign up</p>
            <p>Create an account.</p>
            <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post">
                <?php 
                    echo (!empty($username_err)) ? 'has-error' : ''; ?>
                    <label for="">Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                    <br>
                    <span><?php echo $username_err?></span>
                    <div <?php echo (!empty($pw_err)) ? 'has-error' : ''; ?> >
                        <label for="pw">Password</label>
                        <input type="password" name="password" value="<?php echo $password; ?>" placehodler="Password should be longer than 6 characters">
                        <!-- <span><?php echo $pw_err; ?></span> -->
                    </div>
                    <br>
                    <div>
                        <?php echo (!empty($confirm_pw_err)) ? 'has-error' : ''; ?>
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_pw" value="<?php $confirm_pw_err; ?>">
                        <span><?php echo $confirm_pw_err; ?></span>
                    </div>
                    <div class="sign">
                        <input type="submit" value="submit" class="submit-btn">
                        <input type="reset" value="Reset" class="reset-btn">
                    </div>
                    <p>Have an account? <a href="login.php">Sign in here</a>.</p>
                
            </form>
        </div>

        <?php 
        if(isset($_SESSION['submit'])) {
            $sql = "INSERT INTO users (username, password) VALUES ($_SESSION['username'], $_SESSION['password'] ?)";
        }
        
        ?>
    </body>
    </html>