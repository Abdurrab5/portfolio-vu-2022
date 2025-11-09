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
    $password=$_POST['password'];
      
    $query="SELECT * FROM user WHERE username='$aid' and password='$password'    ";
    $result= mysqli_query($link, $query);
    if(mysqli_num_rows($result)){
        $row= mysqli_fetch_array($result);
        $_SESSION['user_id']=$row['user_id']; 
        $_SESSION['user']=$row['username']; 
		 $_SESSION['role']='user';
        alert("You have been logged-in successfuly.");
        //redirecting
        redirect_to("user/index.php");
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
		<h3> User Login</h3>
	</div>
	<div class="container "  id="form">
	<form action="" method="POST" >

    
  <div class="form-group">
    <label for="id">Username:</label>
    <input type="text" class="form-control" id="name" name="name" required="">
  </div>
  <div class="form-group ">
    <label for="name">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required="">
  </div>
<div class="form-group ">
  <input type="submit" class="btn btn-success" value="Login" name="login" id="Login"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="Reset"/> 
<a href="forgotpassword.php"  style="float:left;color:lightblue ">Forgot Password?</a>  
</div>

 
	 
  </div> 
</form>

</body>
</html>