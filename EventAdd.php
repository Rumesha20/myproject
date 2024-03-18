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
//$eve_id=$_POST['eid'];
	$eve_name=$_POST['ename'];
	$eve_type=$_POST['etype'];
	//$eimage=$_POST['eimg'];
	$eve_charge=$_POST['echarge'];
	$some=$_POST['disc'];
	if(mysql_query("insert into event_details(ename,etype,eimages,echarges,description) values('$eve_name','$eve_type','$fpath',$eve_charge,'$some')"))
	{
		echo"<script> alert('Record inserted')</script>";
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
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Event Add</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Start Bootstrap</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search >
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      

    </nav>
	
	<div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Events</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
           
            <a class="dropdown-item" href="EventAdd.php">Add events</a>
            <a class="dropdown-item" href="eventlist.php">show events</a>
			<a class="dropdown-item" href="up_event.php">Edit Event</a>
            <!--<a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item" href="blank.html">Blank Page</a>-->
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Booking Details</span></a>
        
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
            
			  <a class="dropdown-item" href="BookingList.php">show booking list</a>
			  </div>
            </li>
        <li class="nav-item dropdown">
		
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Contact Details</span></a>
        
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
           <a class="dropdown-item" href="contactAdd.php">Add Contact</a>
            <a class="dropdown-item" href="contactEdit.php">Edit Contact</a>
            
          </div>
		  </li>
		          <li class="nav-item dropdown">
		
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Gallery</span></a>
        
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
            
			<a class="dropdown-item" href="addgallary.php">add new Gallery</a>
            <a class="dropdown-item" href="editgallery.php">Edit Gallery</a>
            
          </div>
		  </li>
		          <li class="nav-item dropdown">
		
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Customer Details</span></a>
        
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
            
			<a class="dropdown-item" href="CustomerList.php">List of Customer</a>
            
            
          </div>
		  </li>
      </ul>
	
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add Event</div>
        <div class="card-body">
          <form method="POST" action="EventAdd.php" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="eventname" class="form-control" name="ename" placeholder="Event Name" required="required">
                <label for="eventname">Provider</label>
              </div>
            </div>
            
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    Select Event Type
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select name="etype">
						<option>Wedding</option>
						<option>Birthday </option>
						<option>Engagement</option>
						<option>Baby Shower</option>
						<option>Corporate Event</option>
						<option>Reception</option>
						<option>Catering</option>
					</select>
                  </div>
                </div>
              </div>
            </div>
			<div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    Select Image
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="file" name="image"/>
                  </div>
                </div>
              </div>
            </div>
			<div class="form-group">
              <div class="form-label-group">
                <input type="text" id="eventcharges" class="form-control" placeholder="Event Charges" required="required" name="echarge">
                <label for="eventcharges">Event Charges</label>
              </div>
            </div>
			<div class="form-group">
              <div class="form-label-group">
                <input type="text" id="eventdescription" class="form-control" placeholder="Event Charges" required="required" name="disc">
                <label for="eventdescription">Description</label>
              </div>
            </div>
			
			
            <input type="submit" class="btn btn-primary btn-block" name="ins" value="Insert">
          </form>
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
