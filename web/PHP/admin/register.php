<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;700&family=Montserrat:wght@500&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">  
     <link rel="stylesheet" href="register.css?v=
    <?php
        echo time();
        ?>">
</head>
<body>


<section>

    <div class="container">

        <h4> Register User</h4>



            <form name ="register" action="verify.php" method ="post">

                <!--User Info-->
                <div class = "user_info" id ="id_info">

                    <h5> User Data</h5>
                    <label for="f_name">First Name
                        <input type="text" name="f_name" id="f_name" required>
                        <p class ="notif" id="notif-fname"> Please Fill the First Name Field</p>
                    </label>

                    <label for="f_name">Last Name
                        <input type="text" name="l_name" id="l_name" required>
                        <p class ="notif" id="notif-lname"> Please Fill the Last Name Field</p>
                    </label>

                    <label for="f_name">Username
                        <input type="text" name="u_name" id="u_name" required>
                        <p class ="notif" id="notif-uname"> Please Fill the UsernameField</p>
                    </label>

                    <label for="f_name">Password
                        <input type="password" name="pass" id="pass" required>
                        <p class ="notif"  id="notif-pass"> Please Fill the Password Field</p>
                    </label>


                    <label for="f_name">Contact Number
                        <input type="text" name="contact" id="contact" required>
                        <p class ="notif" id="notif-contact"> Please Fill the Contact Field</p>
                    </label>

                    <span>
                        <button type="button" id="back" ><a href ="admin_home.php">Back</a></button>
                        <button type="button" id="next_1" onclick = verifyUser()>Next</button>
                    </span>
                </div>
                    

               <!--Location Info-->
               <div class = "user_location" id ="id_location">
                <h5> User Address</h5>

                    <label for="street">House No/Street/Brg
                            <input type="text" name="street" id="street" required>
                            <p class ="notif" id="notif-street"> Please Fill the Street Field</p>

                    </label>

                    <label for="street"> Municipality
                            <input type="text" name="mun" id="mun" required>
                            <p class ="notif" id="notif-mun"> Please Fill the Municipality Field</p>

                    </label>

                    <label for="street"> Province
                            <input type="text" name="prov" id="prov" required>
                            <p class ="notif" id="notif-prov"> Please Fill the Province Field</p>
                           
                    </label>

                    <label for="street"> Country
                            <input type="text" name="count" id="count" required>
                            <p class ="notif" id="notif-count"> Please Fill the Country Field</p>

                    </label>

                    <span>
                        <button type="button" id="back2" onclick = backUser()>Back</button>
                        <button type="button" id="next_2"  onclick = verifyLocation()>Next</button>
                    </span>

               </div>

               <!--Channel Info-->
               <div class = "user_channel" id ="ch_info">

               <h5> User Channel</h5>

                    <label for="street">Channel ID
                            <input type="text" name="ch_id" id="ch_id" required>
                            <p class ="notif" id="notif-ch-id"> Please Fill the Channel Id Field</p>
                    </label>

                    <label for="street"> Channel API
                            <input type="text" name="ch_api" id="ch_api" required>
                            <p class ="notif" id="notif-ch-api"> Please Fill the Channel API Field</p>
                    </label>


                    <label for="street"> Channel Write
                            <input type="text" name="ch_write" id="ch_write" required>
                            <p class ="notif" id="notif-ch-write"> Please Fill the Channel Write Field</p>
                    </label>

                    <label for="street"> Status Frame
                            <input type="text" name="ch_status" id="ch_status" required>
                            <p class ="notif" id="notif-ch-sf"> Please Fill the Status Frame Field</p>
                    </label>

                    <label for="street"> Intrusion Frame
                            <input type="text" name="ch_intr" id="ch_intr" required>
                            <p class ="notif" id="notif-ch-if"> Please Fill the Intrusion Frame Field</p>
                    </label>

                    <span>
                        <button type="button" id="back3" onclick = backLocation()>Back</button>
                        <button type="submit" id="next_3">Submit</button>
                    </span>

               </div>

            </form>
    </div>

</section>


    
<script>

    function goLocation(){

        document.getElementById("id_info").style.display ="none";
        document.getElementById("id_location").style.display ="inline-flex";   

    }

    function backUser(){

        document.getElementById("id_info").style.display ="inline-flex";
        document.getElementById("id_location").style.display ="none";   

    }

    function goChannel(){

    document.getElementById("ch_info").style.display ="inline-flex";   
    document.getElementById("id_location").style.display ="none";

}

    function backLocation(){

    document.getElementById("ch_info").style.display ="none";   
    document.getElementById("id_location").style.display ="inline-flex";

    
}


    function verifyUser(){

        var fname_empty = document.forms["register"]['f_name'].value;
        var lname_empty = document.forms["register"]['l_name'].value;
        var uname_empty = document.forms["register"]['u_name'].value;
        var pass_empty = document.forms["register"]['pass'].value;
        var contact_empty = document.forms["register"]['contact'].value;
        
        if (fname_empty==""){
            document.getElementById("notif-fname").style.display ="inline-flex";   

        }else  if(fname_empty.length > 1){
            document.getElementById("notif-fname").style.display ="none"; 

        }
        
        if (lname_empty==""){
            document.getElementById("notif-lname").style.display ="inline-flex";   

        }else  if(fname_empty.length > 1){
            document.getElementById("notif-lname").style.display ="none"; 

        }
        
        
        if (uname_empty==""){
            document.getElementById("notif-uname").style.display ="inline-flex";    
        }else  if(fname_empty.length > 1){

            document.getElementById("notif-uname").style.display ="none";  
        }
        
        
        if (pass_empty==""){
            document.getElementById("notif-pass").style.display ="inline-flex";   
        }else  if(fname_empty.length > 1){

            document.getElementById("notif-pass").style.display ="none";   
        }
        
        
        if (contact_empty==""){

            document.getElementById("notif-contact").style.display ="inline-flex";   

        }else  if(fname_empty.length > 1){

            document.getElementById("notif-contact").style.display ="none";  

        }

        if (fname_empty =="" ||  lname_empty ==" " || uname_empty ==""|| pass_empty=="" || contact_empty==""){

        }else{
            goLocation();

        }

        
     
          
      
    }
        function verifyLocation(){

                var street_empty = document.forms["register"]['street'].value;
                var mun_empty = document.forms["register"]['mun'].value;
                var prov_empty = document.forms["register"]['prov'].value;
                var count_empty = document.forms["register"]['count'].value;

                if(street_empty == "" || mun_empty == ""|| prov_empty =="" || count_empty ==""){

                    if (street_empty==""){

                    document.getElementById("notif-street").style.display ="inline-flex";   

                    }else if(street_empty.length > 1){

                    document.getElementById("notif-street").style.display ="none";  

                    }


                    if (mun_empty==""){

                    document.getElementById("notif-mun").style.display ="inline-flex";   

                    }else if(mun_empty.length > 1){
                    document.getElementById("notif-mun").style.display ="none";   
                    }

                    if (prov_empty==""){
                    document.getElementById("notif-prov").style.display ="inline-flex"; 

                    }else if(prov_empty.length > 1){
                    document.getElementById("notif-prov").style.display ="none";   
                    }

                    if (count_empty==""){
                    document.getElementById("notif-count").style.display ="inline-flex";  

                    }else if(count_empty.length > 1){
                    document.getElementById("notif-count").style.display ="none";   
                    }


                }else{
                     goChannel();
                 }
         }   


        

</script>

</body>
</html>