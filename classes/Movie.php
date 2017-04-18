<?php
class Movie extends ActiveRecord {
	public $id,$title,$price,$image,$availability,$supersaver,$category;
	public static $table = "movies";
	public static $key = "id";
}