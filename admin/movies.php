<?php 
require "../config.php"; 
if(!Session::get("status")||Session::get("status")!=3){
	header("location: index.html");
}
$selectedMovie = new Movie;

if(isset($_GET['mid'])){ 
	$selectedMovie = Movie::get($_GET['mid']);
}  
if(isset($_POST['btn_insert'])){ 
		$selectedMovie = new Movie;
		$selectedMovie->title = $_POST['tb_title'];
		$selectedMovie->price = $_POST['tb_price'];
		
		if(isset($_FILES['fup_image'])){
			move_uploaded_file($_FILES['fup_image']['tmp_name'],"../images/".$_FILES['fup_image']['name']);
			$selectedMovie->image = $_FILES['fup_image']['name'];
		} 
		$selectedMovie->availability = isset($_POST['cb_availability']);
		$selectedMovie->supersaver = isset($_POST['cb_supersaver']);
		$selectedMovie->category = $_POST['sel_category'];
		$selectedMovie->insert(); 
}

if(isset($_POST['btn_update'])){ 
		$selectedMovie = Movie::get($_POST['selMovie']);
		$selectedMovie->title = $_POST['tb_title'];
		$selectedMovie->price = $_POST['tb_price'];
		
		if(isset($_FILES['fup_image'])&&$_FILES['fup_image']['size']>0){ 
			move_uploaded_file($_FILES['fup_image']['tmp_name'],"../images/".$_FILES['fup_image']['name']);
			$selectedMovie->image = $_FILES['fup_image']['name'];
		} 
		$selectedMovie->availability = isset($_POST['cb_availability']);
		$selectedMovie->supersaver = isset($_POST['cb_supersaver']);
		$selectedMovie->category = $_POST['sel_category'];
		$selectedMovie->save(); 
}

?>
<form action="" method="post" enctype="multipart/form-data" >
<select onchange="if(this.value<0) return; window.location='?mid='+this.value" name="selMovie">
<option value="-1">Select movie</option>
<?php
$allMovies = Movie::getAll(); 
?>
<?php
foreach($allMovies as $rw){ 
	echo "<option " . ($selectedMovie->id==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->title}</option>";		
}
?>
</select>
<br />
Title:<br />
<input type="text" name="tb_title" value="<?php echo $selectedMovie->title; ?>" />
<br />
Price:<br />
<input type="text" name="tb_price" value="<?php echo $selectedMovie->price; ?>" />
<br />
Availability:<br />
<input type="checkbox" name="cb_availability" <?php echo ($selectedMovie->availability)?"checked":""; ?> />
<br />
supersaver:<br />
<input type="checkbox" name="cb_supersaver"<?php echo ($selectedMovie->supersaver)?"checked":""; ?> />
<br />
Category:<br /> 
<select name="sel_category">
<option value="-1">Select category</option>
<?php
$allCategories = Category::getAll();
foreach($allCategories as $rw){ 
	echo "<option " . ($selectedMovie->category==$rw->id?"selected":"") . " value='{$rw->id}'>{$rw->name}</option>";		
}
?>
</select>
<br />
<img src="../images/<?php echo $selectedMovie->image; ?>" width="93" height="95" />
<input type="file" name="fup_image" />
<br /><br />
<input type="submit" name="btn_insert" value="Add new" />
<input type="submit" name="btn_update" value="Update" />
<input type="submit" name="btn_delete" value="Delete" />
</form>