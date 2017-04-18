<?php
class Category extends ActiveRecord {
	public $id,$name,$description;
	public static $table = "categories";
	public static $key = "id";
}