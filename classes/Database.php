<?php
class Database {
	private static $instance = null;
	private function __construct(){}
	public static function getInstance(){
		if(!self::$instance)
			self::$instance = mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
		return self::$instance;
	}
}