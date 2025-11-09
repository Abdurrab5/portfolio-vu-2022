<?php 
require_once "../connection.php";
require_once "../functions.php"; 
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../style.css">

   
    <link href="../assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet" />

    
    <link href="../assets/fontawsome/css/all.css" rel="stylesheet" />
 <link href="../assets/fontawesome/css/all.min" rel="stylesheet" />
  <script src="../assets/bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../assets/bootstrap/js/popper.min.js"></script>
   <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
   
 
</head>
 
<body>



<div>
  
<nav class="navbar navbar-expand-lg bg-secondary ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand btn btn-secondary mr-auto" href="dashboard.php">  <img src="../assets/images/logo2.png" class="" alt="..." style="width:80px;height:60px;border-radius: 50%;">
                Portfolio </a>
		<form action="search.php" method="get" >
        <input class="form-control me-2 col-8" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
       
	 
				 <a href="logout.php"  class="btn btn-danger ">logout</a> 
			  
  </div>	
  
  </nav>
  
 
    <!-- Sidebar -->
    <div class="sidebar">
         
  <a href="index.php"   >Dashborad</a>
  <a href="addportfolio.php">Update Profile</a>
 
  <a href="vieweducation.php">Education</a>
  <a href="viewcertificate.php">Certificate</a> 
  <a href="viewexperience.php">Experience</a> 
  <a href="viewcontact.php">Contact</a>
    </div>

</div>
 