
<?php

                        include("connect_db.php");
                        if(!isset($_SESSION)) 
                        { 
                            session_start(); 
                        }


                        $channel_id ="";

                        $getUser = $_SESSION['user_id'];
                                    
                       $sql = " SELECT * FROM channel_table WHERE users_id = '$getUser'";
                       $result = $conn->query($sql);
                       $conn->close();
               
                       while($rows=$result->fetch_assoc()){
               
                             $channel = $rows['channel_id'];
                          
                       }
                       
                       

                     
                       $url ="https://api.thingspeak.com/channels/".$channel."/fields/1/last.json";

                      // $url = "https://api.thingspeak.com/channels/1917506/fields/1/last.json";


                        $ch = curl_init();
                        
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                        curl_setopt($ch, CURLOPT_URL,$url);
                        
                        $result = curl_exec($ch);
                        
                        $format_status = json_decode($result);
                        $decoded_status = $format_status->field1;
                        $decoded_status = intval($decoded_status);
                        
                        



                        if(!isset($format_status->field1)){

                            echo "<span><span style ='color:rgb(129, 129, 129);'> Status:</span> </span>";

                        }else{

                            $decoded_status = $format_status->field1;
                            $decoded_status = intval($decoded_status);

                            if ($decoded_status == 1){

                                echo "<span style = 'color:#B81212';> <span style ='color:rgb(129, 129, 129);'>Status:</span> Unlocked</span>";
                            
                            } else{
                                echo "<span><span style ='color:rgb(129, 129, 129);'> Status:</span> Locked</span>";
    
                            }

                        }



                        // if (!isset($decoded_status)){

                        //     echo "<span><span style ='color:rgb(129, 129, 129);'> Status:</span> </span>";

                        // }else{




                        // }

                        //echo $decoded_status;

  


   
                   
?>

