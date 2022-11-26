<?php


session_start();
include("connect_db.php");

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

            header("Location:index.php?error=User Name is required");
            exit();


        }else{

            $sql = "SELECT * FROM users_table WHERE username ='$username' AND user_password ='$password'";
            
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1){

                $row = mysqli_fetch_assoc($result);

                if ($row['username'] === $username && $row['user_password'] === $password){

                    echo "login";

                    session_regenerate_id();
                    $_SESSION['check_session'] = True;
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_password'] = $row['user_password'];
                    $_SESSION['users_id'] = $row['users_id'];

                    header("Location:homepage.php");

                    exit();

                }else{

                    header("Location:index.php ? error = Incorrect Username or password");
                    exit();
                }
            }else{
                header("Location:index.php ? error = Incorrect Username or password");
                exit();
            }

        }
        
}else{

    header("Location:index.php");
    exit();
}

?>