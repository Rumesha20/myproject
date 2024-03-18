<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("myproject");
if(isset($_POST['ins']))
{
$errors=array();
$file_name=$_FILES['image']['name'];
$file_size=$_FILES['image']['size'];
$file_tmp=$_FILES['image']['tmp_name'];
$file_type=$_FILES['image']['type'];
$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
$extensions=array("jpeg","jpg","png");
if(in_array($file_ext,$extensions)===false)
{
$errors[]="Extension not allowed,please choose jpeg or png file";
}
if($file_size>2097152)
{
$errors[]='File size must be 2 MB';
}
if(empty($errors)==true)
{
$fpath = "upload/".$file_name;
move_uploaded_file($file_tmp,"upload/".$file_name);
//echo "Success";
$eve_id=$_POST['eid'];
	$eve_name=$_POST['ename'];
	$eve_type=$_POST['etype'];
	//$eimage=$_POST['eimg'];
	$eve_charge=$_POST['echarge'];
	if(mysql_query("insert into event_details values($eve_id,'$eve_name','$eve_type','$fpath',$eve_charge)"))
	{
		echo"Record inserted";
	}
	else
	{
		echo mysql_error();
		echo mysql_errno();
	}
}
else
print_r($errors);
	
}
?>
<html>
<body>
<form method="POST" action="eventdet_insert.php" enctype="multipart/form-data">
Event ID:<input type="text" name="eid"><br>
Event Name:<input type="text" name="ename"><br>
Event Type:
<select name="etype">
<option>Wedding</option>
<option>Birthday </option>
<option>Engagement</option>
<option>Business meeting</option>
<option>Seminars</option>
</select><br>
Event Image:<input type="file" name="image"/><br>
Event charges:<input type="text" name="echarge"><br>
<input type="submit" name="ins" value="Insert">
</form>
</body>
</html>