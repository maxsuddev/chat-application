<?php
 $hostName = "localhost";
 $userName = "root";
 $password = "root";
 $dbName = "chat";
 $conn = new mysqli($hostName,$userName,$password,$dbName);
 if(!$conn){
    echo "no_connected" . mysqli_connect_error();
 }?>