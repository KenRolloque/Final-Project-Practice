<?php

    include("connect_db.php");
//    / include("API.php");
   
?>
 <?php

        $read_data = "https://api.thingspeak.com/channels/1917506/fields/2/last.json";

    // LOCK AND CLOSE DOOR
    if(isset($_POST['lock'])){

            $close_door = "https://api.thingspeak.com/update?api_key=OV10QG606KWAQ3RZ&field1=0";
            
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_URL,$close_door);
            $result = curl_exec($ch);

            header("Location:homepage.php");
    

    // UNLOCK AND OPEN DOOR
    }else if(isset($_POST['unlock'])){

        $open_door =  "https://api.thingspeak.com/update?api_key=OV10QG606KWAQ3RZ&field1=1";

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_URL,$open_door);
        $result = curl_exec($ch);
        header("Location:homepage.php");

    }
 

?>
</body>
</html>