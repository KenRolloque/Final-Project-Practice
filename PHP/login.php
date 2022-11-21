<?php
   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div id = "login_form"> 
    <form action="authentication.php" method ="post">

            <label for="username"> Username</label><br>
            <input type="text" name="username" id="username" placeholder ="Enter Username"><br>

            <label for="password">Password</label><br>
            <input type="password" name="password" id="password"  placeholder ="Enter Password"><br>

            <input type="submit" value="Login">

            
    </form>
 </div>   
</body>
</html>