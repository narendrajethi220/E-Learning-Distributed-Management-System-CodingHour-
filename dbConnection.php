<?php
$db_hostname="localhost";
$db_user="root";
$db_password="";
$db_name = "codinghour_db";
//Creating Connection
$conn=new mysqli($db_hostname,$db_user,$db_password,$db_name);
//Checking Connection
if($conn->connect_error)
{
    die('connection failed');
}
?>