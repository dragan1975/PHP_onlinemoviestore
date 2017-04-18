<?php  
require "../config.php"; 
if(!Session::get("status")||Session::get("status")!=3){
	header("location: index.html");
} 

$selectedCategory = new Category;

if(isset($_GET['cid'])){
	$selectedCategory = Category::get($_GET['cid']); 
} 
if(isset($_POST['btn_insert'])){
	$selectedCategory = new Category;
	$selectedCategory->name = $_POST['tb_name'];
	$selectedCategory->description = $_POST['tb_description'];
	$selectedCategory->insert(); 
}
if(isset($_POST['btn_update'])){
	$selectedCategory = Category::get($_POST['selCategory']);
	$selectedCategory->name = $_POST['tb_name'];
	$selectedCategory->description = $_POST['tb_description'];
	$selectedCategory->save();
} 
?>
<form method="post" action="">
<?php 
$allCategories = Category::getAll(); 
?>
<select onchange="window.location='?cid='+this.value" name="selCategory">
<option value="-1">Select category</option>
<?php
foreach($allCategories as $rw){ 
	echo "<option " . ($selectedCategory->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->name}</option>";		
}
?>
</select>
<br />
Name:<br />
<input type="text" name="tb_name" value="<?php echo $selectedCategory->name; ?>" />
<br />
Description: <br />
<input type="text" name="tb_description" value="<?php echo $selectedCategory->description; ?>" />
<br /> <br /> 
<input type="submit" name="btn_insert" value="Add new" />
<input type="submit" name="btn_update" value="Update" />
<input type="submit" name="btn_delete" value="Delete" />
</form>