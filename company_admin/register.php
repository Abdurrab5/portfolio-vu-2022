<?php
   
   require_once "../connection.php";
require_once "../functions.php"; 
	  
    
			 



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
 
    <body>
 
    <div >
    <h2   align="middle" >Portfolio creator</h2></div>


	<?php
	$msg='';
	if(isset($_POST['submit'])){
     
    $username=$_POST['username'];
	$email=$_POST['email'];
    $password=$_POST['password'];
	 $company_name=$_POST['company_name'];
	$designation=$_POST['designation'];
    $phone=$_POST['phone'];
	 
    $address=$_POST['address'];
	
	 $query="SELECT * FROM companyadmin WHERE company_name='$company_name' ";
    $result= mysqli_query($link, $query);
    if(mysqli_num_rows($result)){
		
		alert('Account Already exists');
		
	}else{
      
	 
	
   $query="INSERT into companyadmin(username,email,password,company_name,designation,phone,address) VALUES";
    $query.="('$username','$email','$password','$company_name','$designation','$phone','$address')";
    $result= mysqli_query($link, $query);
    if(mysqli_insert_id($link)){
       alert("Register successfuly.");
       
        redirect_to("index.php");
    }else{
			$msg="Company Admin already exist";
        
    } 
	
}
	}
	 
?>


  <div class="container">
		<h3> Company Admin Registration</h3>
	</div>
	<div class="container" id="form">
	<form action="" method="POST" >
 
 <div class="form-group">
    <label for="name">User Name:</label>
    <input type="text" class="form-control" id="username" name="username"   required="" Placeholder="username:" >
  </div>
  
   <div class="form-group">
    <label for="name">e-Mail:</label>
    <input type="email" class="form-control" id="email" name="email" required=""   Placeholder="Enter e-Mail  ">
  </div> 
    <div class="form-group">
    <label for="name">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required=""  Placeholder="Enter password:">
  </div>
   
 <div class="form-group">
    <label for="name">Company Name:</label>
    <input type="text" class="form-control" id="company_name" name="company_name"   required="" Placeholder="company_name:" >
  </div>
  
   <div class="form-group">
  <label for="name">designation:</label>
     <Select type="text" class="form-control" id="designation" name="designation" required="">  
         
		  <option value="HR Manager">HR Manager</option>
		   <option value="officer">Officer</option>
		   <option value="store manager">Store Manager</option>
		   <option value="CEO">CEO</option>
		   

	 </select> </div> 
    <div class="form-group">
    <label for="name">phone:</label>
    <input type="text" class="form-control" id="phone" name="phone" required=""  Placeholder="Enter phone:">
  </div>
  <div class="form-group">
    <label for="name">address:</label>
    <input type="text" class="form-control" id="address" name="address" required=""  Placeholder="Enter address:">
  </div>
  <div class="form-group">
   
  <input type="submit" class="btn btn-primary" value="Click to Register" name="submit" id="submit"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>
<a href="index.php"  style="float:left;color:lightblue ">back</a>

</body>




</html>
