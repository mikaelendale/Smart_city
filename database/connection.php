<?php

//esstablishing database connection

$conn = mysqli_connect("localhost","root","","smart_city");

//if there is error in the connection

if (mysqli_connect_errno()){
    echo "connection failed";
}

?>