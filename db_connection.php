<?php
$host="localhost";
$db_user="root";
$db_password="";
$db_name="crud_nevoish";

//connection section
$conn= mysqli_connect("$host", "$db_user" ,"$db_password","$db_name");

//connection test

if (!$conn){
    die("connection failed:" . mysqli_connect_error());
}