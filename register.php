<?php
include_once 'user.php';  
$user = new User(); 
// Checking for user logged in or not
    if (isset($_REQUEST['submit'])){
    extract($_REQUEST);
    $register = $user->reg_user($uname,$upass);
    if ($register) {
// Registration Success
    echo 'Registration successful <a href="login.php">Click here</a> to login';
 } else {
// Registration Failed
    echo 'Registration failed. Email or Username already exits please try again';
 }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/styles.css">
    <script src="main.js"></script>
</head>
<body>
<style>
    .container{
        width:400px; 
        margin: 0 auto;
    }
</style>
<script type="text/javascript" language="javascript">
    function submitreg() {
    var form = document.reg;
    if(form.name.value == ""){
        alert( "Enter name." );
    return false;
    }
    else if(form.uname.value == ""){
        alert( "Enter username." );
    return false;
    }
    else if(form.upass.value == ""){
        alert( "Enter password." );
    return false;
    }
    else if(form.uemail.value == ""){
        alert( "Enter email." );
    return false;
    }
    }
</script>
<div id="container">
<h1>Registration Here</h1>
<form action="" method="post" name="reg">
<table>
<tbody>
<tr>
<th>Name:</th>
<td><input type="text" name="name" required="" /></td>
</tr>
<tr>
<th>Surname:</th>
<td><input type="text" name="surname" required="" /></td>
</tr>
<tr>
<th>User Name:</th>
<td><input type="text" name="uname" required="" /></td>
</tr>
<tr>
<th>Password:</th>
<td><input type="password" name="upass" required="" /></td>
</tr>
<tr>
<td></td>
<td><input onclick="return(submitreg());" type="submit" name="submit" value="Register" /></td>
</tr>
<tr>
<td></td>
<td><a href="login.php">Already registered! Click Here!</a></td>
</tr>
</tbody>
</table>
</form>
</div>

</body>
</html>