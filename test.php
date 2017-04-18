<?php
include "config.php"; 

class Category extends ActiveRecord {
	public static $table = "categories";
	public static $key = "id";
}

$cat = new Category;
$cat->name = "My New Category";
$cat->description = "Some tutorial movies";
$cat->insert();
 