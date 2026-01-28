<?php
$conn=new mysqli("localhost", "root", "", "cruddatabase");

if($conn->connect_error){
    die("Connection Failed:".$conn->connect_error);
}
?>