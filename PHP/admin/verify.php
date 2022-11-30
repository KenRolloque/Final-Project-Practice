<?php
    include("../connect_db.php");
 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

  
    if( 
        isset($_POST['f_name']) && 
        isset($_POST['l_name']) && 
        isset($_POST['u_name']) && 
        isset($_POST['pass']) && 
        isset($_POST['contact']) && 
        isset($_POST['street']) && 
        isset($_POST['mun']) && 
        isset($_POST['prov']) && 
        isset($_POST['count']) 

        ){

        $get_fname = $_POST['f_name'];
        $get_lname = $_POST['l_name'];
        $get_uname = $_POST['u_name'];
        $get_pass = $_POST['pass'];
        $get_contact = $_POST['contact'];
        $get_str = $_POST['street'];
        $get_mun = $_POST['mun'];
        $get_prov = $_POST['prov'];
        $get_count  =$_POST['count'];

        $sql = "INSERT INTO user_table (

            user_fname,
            user_lname,
            user_username,
            user_password,
            user_contact,
            user_street,
            user_municipality,
            user_province,
            user_country

        )VALUES(

            '$get_fname',
            '$get_lname',
            '$get_uname',
            '$get_pass',
            '$get_contact',
            '$get_str',
            '$get_mun',
            '$get_prov',
            '$get_count'
        )";


       // $result = $conn->query(sql);

        if (mysqli_query($conn, $sql)){

            echo "User Added <br>";

        }else{
            echo "No User Added";
        }

        if(
            isset($_POST['ch_id']) && 
            isset($_POST['ch_api']) && 
            isset($_POST['ch_write']) && 
            isset($_POST['ch_status']) && 
            isset($_POST['ch_intr']) 

        ){

            $last_entry ="SELECT * FROM user_table WHERE users_id=(SELECT max(users_id) FROM user_table);";
            $result_entry = $conn->query($last_entry);


            $getUser_id = "";
            while($rows=$result_entry->fetch_assoc()){

                $getUser_id = $rows['users_id'];
                          
             }           

            $getUser_id = intval($getUser_id);

            echo $getUser_id;
            $get_id =$_POST['ch_id'];
            $get_api=$_POST['ch_api'];
            $get_write=$_POST['ch_write'];
            $get_status=$_POST['ch_status'];
            $get_intr=$_POST['ch_intr'];
        


            $sql2 = "INSERT INTO channel_table (

                users_id,
                channel_id,
                channel_api,
                channel_write,
                status_field,
                intr_field

            )VALUES (

                '$getUser_id',
                '$get_id',
                '$get_api',
                '$get_write',
                '$get_status',
                '$get_intr'

            )";

            if (mysqli_query($conn, $sql2)){

                //echo "Channel Added <br>";

                $door_info = "INSERT INTO door_table (

                            users_id
            
            
                        )VALUES (
            
                            '$getUser_id'
            
                        )";
            
                    if (mysqli_query($conn, $door_info)){
            
                        //echo "Channel Added <br>";
            
                        header("Location:admin_home.php");
            
                    }else{
                        echo "No Channel Added";
                    }
        

            }else{
                echo "No Channel Added";
            }








        }
        
}else{

    echo "No _POST Foundz";

}


?>