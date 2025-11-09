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

  <script src="../assets/bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../assets/bootstrap/js/popper.min.js"></script>
   <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    
 
</head>


<body  >
      
 
   <a  href="../index.php"  class="btn btn-primary">Home </a>
	  
    
	    
	<?php
	if(isset($_POST['login'])){
    
    $aid=$_POST['name'];
    $password=$_POST['password'];
      
    $query="SELECT * FROM companyadmin WHERE username='$aid' AND  password='$password' ";
    $result= mysqli_query($link, $query);
    if(mysqli_num_rows($result)){
        $row= mysqli_fetch_array($result);
       $_SESSION['com_admin_id']=$row['com_admin_id']; 
        $_SESSION['admin']=$row['username']; 
		 $_SESSION['role']='ADMIN';
        alert("You have been logged-in successfuly.");
        //redirecting
        redirect_to("dashboard.php");
    }else{
        alert("please provide correct login detail: ". mysqli_error($link));
    }
}
?>
<div  >
	<div>
		<h3 class="container"></h3><h3> Company Admin Login</h3>
	</div>
	<div class="container" id="form">
	<form action="" method="POST" >

    
  <div class="form-group">
    <label for="id">Username:</label>
    <input type="text" class="form-control" id="name" name="name" required="">
  </div>
  <div class="form-group">
    <label for="name">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required="">
  </div>

  <input type="submit" class="btn btn-success" value="Login" name="login" id="Login"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="Reset"/> 

   <a  href="register.php"  class="btn btn-primary">register </a>
</form>
</div>

 
	 
  </div> 
</body>
</html>