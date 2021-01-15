<?php

//  make the connectivity to the server
$username= "root";
$server="localhost";
$password= "";
$database="ganna";

// Try connecting to database
$conn= mysqli_connect($server,$username,$password,$database);
//check the connection
if ($conn==true){
    // echo "connected to server";
}



?>