<?php
require "../config.php";
if(!isset($_POST['tbUsername'])||!isset($_POST['tbPassword'])){
	die("invalid parameters");
}	
$username = $_POST['tbUsername'];
$password = $_POST['tbPassword'];  
$username = str_replace("'","",$username);
$username = str_replace("-","",$username);
$password = str_replace("'","",$password);
$password = str_replace("-","",$password);

$user = User::login($username,$password); 
if($user){ 
	header("location: index.php");
} else {
	echo "Invalid user";
} 