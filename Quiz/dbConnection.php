<?php

$db_hostname="localhost";
$db_user="root";
$db_password="";
$db_name="quiz";


$conn=new mysqli($db_hostname,$db_user,$db_password,$db_name);

if($conn->connect_error){
    die('connection failed');
}
?>