<?php

$hostname = "localhost";
$db_name = "register";
$username = "root";
$password = "";

//global $dbhandle;

//connection to the database
$db = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
or die("Unable to connect to MySQL");

////select a database to work with
//$selected = mysqli_select_db($dbhandle, "register")
//or die("Could not select examples");

?>