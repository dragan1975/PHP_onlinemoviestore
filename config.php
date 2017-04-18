<?php
define("DB","moviestore");
define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("APP_DIR","c:/wamp/www");

function __autoload($class){
	require_once APP_DIR . "/classes/".$class.".php";	
}