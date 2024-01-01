<?php

$servername = "localhost";
$username = "root";
$password = "Abh123$%^";
$dbname = "registration";


$connection = mysqli_connect($servername, $username, $password, $dbname);

if($connection){
    // echo "connected";
}
else{
    echo "not connected";
};

?>