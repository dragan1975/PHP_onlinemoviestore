<?php
class User extends ActiveRecord {
	public static $table = "users";
	public static $key = "id";	
	public function setSessions(){
		Session::set("status",$this->status);  
	}
	public static function logout(){
		Session::stop();
	}
	public static function login($username,$password){
		$users = self::getAll("where username='{$username}' and password='{$password}' limit 1");
		if(count($users)==1){
			$users[0]->setSessions();
			return $users[0];
		} else {
			return null;
		}
	 }
}