<?php

include("connect_db.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$error_name ="";
$error_pass = "";
$error_all = "";


if (isset($_POST['username']) && isset($_POST['password'])){

    function validate($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username) && empty($password)){


        // header("Location:index.php?error=User Name is required");
        $error_name = "Username is required.";
        $error_pass = "Password is required";
        //exit();


    }else{

        $sql = "SELECT * FROM user_table WHERE user_username ='$username' AND user_password ='$password'";
        
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1){

            $row = mysqli_fetch_assoc($result);

            if ($row['user_username'] === $username && $row['user_password'] === $password){

             

                session_regenerate_id();
                $_SESSION['check_session'] = True;
                $_SESSION['username'] = $row['user_username'];
                $_SESSION['password'] = $row['user_password'];
                $_SESSION['user_id'] = $row['users_id'];
                $_SESSION['street'] = $row['user_street'];
                $_SESSION['munip'] = $row['user_municipality'];
                $_SESSION['prov'] = $row['user_province'];
                $_SESSION['country'] = $row['user_country'];

                $getId =   $_SESSION['user_id'];

                $getDoor = "SELECT * FROM door_table WHERE users_id = $getId";
                $door_result = mysqli_query($conn, $getDoor);
                $door_row = mysqli_fetch_assoc($door_result);

                $_SESSION['door'] = $door_row['door_id'];

                header("Location:homepage.php");
               exit();

            }else{

                $error_all = "Invalid Username or Password. Please try again.";
                // header("Location:index.php ? error = Incorrect Username or password");
               // exit();
            }
        }else{
            // header("Location:index.php ? error = Incorrect Username or password");
            //exit();
            $error_all = "Invalid Username or Password. Please try again.";
        }

    }
    
}else{
 
// header("Location:index.php");
//exit();
}

?>
