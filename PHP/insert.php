<?php


    include("connect_db.php");

    
    $f_name = "Mark";
    $l_name = "Quinto";
    $u_name = "House_102";
    $pass = "12345";
    $contact = "094323242134";
    $street = "P. Burgots St. , Barangay 24";
    $munip = "Batangas City";
    $prov = "Batangas";
    $country = "Philippines";

    $insert_data = "INSERT INTO user_table (
        user_fname, 
        user_lname, 
        user_username, 
        user_password,
        user_contact,
        user_street,
        user_municipality,
        user_province,
        user_country   ) VALUES(
        
        '$f_name',
        '$l_name',
        '$u_name',
        '$pass',
        '$contact',
        '$street',
        '$munip',
        '$prov',
        '$country'

    )";

    if (mysqli_query($conn, $insert_data)){

        echo "Data Added <br>";

    }else{
        echo "No Data Added";
    }
    

  //  $channel = 2001;
//     $u_id  =1001;
//     $ch_field = "1";
//     $ch_id = "1917506";
//     $ch_api = "OV10QG606KWAQ3RZ";
//     $ch_write ="https://api.thingspeak.com/update?api_key=OV10QG606KWAQ3RZ&";
//     $ch_read = "https://api.thingspeak.com/channels/1917506/fields/";

//    // "https://api.thingspeak.com/channels/1917506/fields/1/last.jsons

 
//   $insert_data = "INSERT INTO channel_table (
//         users_id, 
//         channel_field, 
//         channel_id, 
//         channel_api,
//         channel_write,
//         channel_read
//         ) VALUES(
        
//         '$u_id',
//         '$ch_field',
//         '$ch_id',
//         '$ch_api',
//         '$ch_write',
//         '$ch_read'

//     )";

//     if (mysqli_query($conn, $insert_data)){

//         echo "Data Added <br>";

//     }else{
//         echo "No Data Added";
//     }
    


?>