<?php
abstract class ActiveRecord {
	public static function getAll($filter=""){ 
		$q = mysqli_query(Database::getInstance(),
		"select * from ".static::$table . " " . $filter);
		$res = array();
		while($rw=mysqli_fetch_object($q,get_called_class())) 
			$res[] = $rw; 
		return $res;
	}
	public static function get($id){
		$q = mysqli_query(Database::getInstance(),
		"select * from ".static::$table . " where ".static::$key." = " . $id);
		return mysqli_fetch_object($q,get_called_class());
	}
	public function save(){
		$q = "update " . static::$table . " set ";
		foreach($this as $k=>$v){
			if($k==static::$key) continue;
			$q.=$k."='".$v."',";
		}
		$q = rtrim($q,",");
		$keyField = static::$key;
		$q.="where ".static::$key." = " . $this->$keyField;
		mysqli_query(Database::getInstance(),$q);
	}
	public function insert(){
		$fields = get_object_vars($this);
		$keys = array_keys($fields);
		$values = array_values($fields);
		$q = "insert into " . static::$table . "(";
		$q.= implode(",",$keys);
		$q.=") values ('";
		$q.= implode("','",$values);
		$q.="')";
		$conn = Database::getInstance();
		mysqli_query($conn,$q);
		$keyField = static::$key;
		$this->$keyField = mysqli_insert_id($conn); 
	}
	public static function delete($id){
		$q = "delete from " . static::$table . " where ". static::$key . " = " . $id;
		mysqli_query(Database::getInstance(),$q);
	}
}