<?php

    // connection string using website i.e. localhost, username, password and database name
    $con=mysqli_connect("localhost","root","root","ScaffoldTraining");

    //Check connection
         if(mysqli_connect_errno()){
            // return error for an invalid connection string 
            echo "Failed to connect to the database";
         }

?>