<?php


    include("../connect_db.php");

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }


    if (isset($_POST['ad_name']) && isset($_POST['ad_password'])){

        function validate($data){

            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;

        }

        $username = validate($_POST['ad_name']);
        $password = validate($_POST['ad_password']);

        if (empty($username) && empty($password)){

            header("Location:admin_index.php?error=User Name is required");
            exit();


        }else{

            $sql = "SELECT * FROM admin_table WHERE admin_name ='$username' AND admin_pass ='$password'";
            
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1){

                $row = mysqli_fetch_assoc($result);

                if ($row['admin_name'] === $username && $row['admin_pass'] === $password){

                    echo "login";

                    session_regenerate_id();
                    $_SESSION['check_session'] = True;
                    $_SESSION['username'] = $row['admin_name'];
                    $_SESSION['password'] = $row['admin_pass'];



                    header("Location:admin_home.php");
                    exit();

                }else{

                    header("Location:admin_index.php ? error = Incorrect Username or password");
                    exit();
                }
            }else{
                header("Location:admin_index.php ? error = Incorrect Username or password");
                exit();
            }

        }
        
}else{

    header("Location:admin_index.php");
    exit();
}  

?>