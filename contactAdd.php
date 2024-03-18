<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("myproject");

if(isset($_POST['ins']))
{
	
	$nm1=$_POST['name'];
	$nm2=$_POST['name1'];
	$mob1=$_POST['mob1'];
	$mob2=$_POST['mob2'];	
	$add=$_POST['add'];
	$sql="delete from contact";
	mysql_query($sql);
	if($nm2=="")
		$sql="insert into contact(contact1_name,contact1_no,address) values('$nm1','$mob1','$add')";
	else
		$sql="insert into contact(contact1_name,contact2_name,contact1_no,contact2_no,address) values('$nm1','$nm2','$mob1','$mob2','$add')";

	if(mysql_query($sql))
	{
		echo "<script>alert('Contact Inserted')</script>";
	}
	else
	{
		echo mysql_error();
		//echo mysql_errno();
	}
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

      <!-- Navbar Search -->
      <!--form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
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
      <!--ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a-->
          </div>
        </li>
      </ul>

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
            <a class="dropdown-item" href="editgallery.php">Update Gallery</a>
            
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
        <div class="card-header">Add Contact</div>
        <div class="card-body">
          <form method="POST" action="contactAdd.php" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="contactname" class="form-control" name="name" placeholder="Name" required="required">
                <label for="contactname">Name: </label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" pattern="(7|8|9)\d{9}" id="mobile1" class="form-control" name="mob1" placeholder="Mobile No."  />
				
                <label for="mobile1">Mobile No. : </label>
              </div>
            </div>
            
					<div class="form-group">
              <div class="form-label-group">
                <input type="text" id="contactname1" class="form-control" name="name1" placeholder="Name">
                <label for="contactname1">Name: </label>
              </div>
            </div>
            
				<div class="form-group">
              <div class="form-label-group">
                <input type="text" pattern="(7|8|9)\d{9}" id="mobile2" class="form-control" placeholder="Mobile No." name="mob2">
                <label for="mobile2">Mobile No. :</label>
              </div>
            </div>
			<div class="form-group">
              <div class="form-label-group">
                <input type="text" id="con_add" class="form-control" placeholder="Event Charges" required="required" name="add">
                <label for="con_add">Address</label>
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
