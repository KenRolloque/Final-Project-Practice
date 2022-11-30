<?php

        include("connect_db.php");
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }

        $empty_pass ="";
        $empty_name ="";
        $empty_all ="";


        if(empty($_POST['u_name'])){

            $empty_all = "Please fill the Username" ;

        }
        
        if(empty($_POST['pass'])){
            
            $empty_all = "Please fill the Password" ;
        }

        // if(isset($_POST['pass']) && isset($_POST['u_name'])  && !empty($_POST['pass']) && !empty($_POST['u_name'])){

        //     if(!empty($_POST['pass']) && !empty($_POST['u_name'])){

        //     $new_pass = $_POST['pass'];
        //     $new_name = $_POST['u_name'];
        //     $user = $_SESSION['user_id'];
    
        //     $new_update = "UPDATE user_table  SET user_username = '$new_name' , user_password = '$new_pass' WHERE users_id ='$user'";
        //     $result = $conn->query($new_update);
        //     $conn->close();
           
        //     echo "<script> alert('Updated Successfully') </script>";
        //     header("Location:index.php");
        //     exit();

        //     }else if(empty($_POST['pass']) || empty($_POST['u_name'])){

        //         $empty_all = "Please fill the Username and Password";
                
        //     }else{

        //         $empty_all = "Please fill the Username and Password";

        //     }


        // }else{

           

        // }
?>