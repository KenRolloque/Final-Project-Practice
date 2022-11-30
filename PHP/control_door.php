<?php

    include("connect_db.php");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
//    / include("API.php");
   
?>
 <?php

        $read_data = "https://api.thingspeak.com/channels/1917506/fields/2/last.json";
        $getUser = $_SESSION['user_id'];
        $get_api = "";

        $sql = " SELECT * FROM channel_table WHERE users_id = '$getUser'";
        $result = $conn->query($sql);
        $conn->close();

        while($rows=$result->fetch_assoc()){

            $get_api = $rows['channel_api'];
            $field = "1";
            $_SESSION['user_channel'] = $rows['channel_id'];
           
        }

    // LOCK AND CLOSE DOOR
    if(isset($_POST['lock'])){


            if(!isset($_SESSION['user_channel'])){


                echo "<script>alert('No device found'); window.location = 'homepage.php';</script>" ;              

            }else{

                $link  = "https://api.thingspeak.com/update?api_key=";
                $f ="field";
                $close_door = $link.$get_api."&".$f.$field."=0";         
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_URL,$close_door);
                $result = curl_exec($ch);
                header("Location:homepage.php");
            }


    

    // UNLOCK AND OPEN DOOR
    }else if(isset($_POST['unlock'])){


        if(!isset($_SESSION['user_channel'])){

            echo "<script>alert('No device found'); window.location = 'homepage.php';</script>" ;              
         
        }else{
            $link  = "https://api.thingspeak.com/update?api_key=";
            $f ="field";
            $open_door = $link.$get_api."&".$f.$field."=1";
    
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_URL,$open_door);
            $result = curl_exec($ch);
            header("Location:homepage.php");
        }



    }

?>
</body>
</html>