<?php
  
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>  
<meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="style.css">

   
    <link href="assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet" />

    
    <link href="assets/fontawsome/css/all.css" rel="stylesheet" />

  <script src="assets/bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
 
</head>


<body   >
 <?php require_once "navbar.php";
 ?>
	  
    
	    
	<?php
	if(isset($_POST['login'])){
    
    $aid=$_POST['name'];
    $email=$_POST['email'];
      
    $query="SELECT * FROM user WHERE username='$aid' and email='$email' and status='Approve'  ";
    $result= mysqli_query($link, $query);
    if(mysqli_num_rows($result)){
        $row= mysqli_fetch_array($result);
       
        $_SESSION['user']=$row['username']; 
		$_SESSION['email']=$row['email']; 
		redirect_to("updatepass.php");
		 
    }else{
        alert("please provide correct login detail: ". mysqli_error($link));
    }
}
?>
<br>
<br>
<br>
<br>
<div  class="container" >
	<div class="">
		<h3> Password Recvory</h3>
	</div>
	<div class="container "  id="form">
	<form action="" method="POST" >

    
  <div class="form-group">
    <label for="id">Enter Username:</label>
    <input type="text" class="form-control" id="name" name="name" required="">
  </div>
  <div class="form-group ">
    <label for="name">Enter Email:</label>
    <input type="email" class="form-control" id="email" name="email" required="">
  </div>
<div class="form-group ">
  <input type="submit" class="btn btn-success" value="Send" name="login" id="Login"/>
  
 
</div>

 
	 
  </div> 
</form>

</body>
</html>