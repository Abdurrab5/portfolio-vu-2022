
<?php 
require_once "navbar.php";
$user=$_SESSION['user'];
$email=$_SESSION['email'];

if(isset($_POST['update'])){
    
   
    $password=$_POST['password'];
      
    $query="update user set password='$password' WHERE username='$user' and email='$email'  ";
    $result= mysqli_query($link, $query);
    alert("Password Update successfuly.");
        redirect_to("index.php");
    }


 ?>
 <br>
<br>
<br>
<br>
<div  class="container" >
	<div class="">
		<h3> Password</h3>
	</div>
	<div class="container "  id="form">
<form action="" method="POST" >

    
  <div class="form-group">
    <label for="id">Enter Password:</label>
    <input type="password" class="form-control" id="password" name="password" required="">
  </div>
  
<div class="form-group ">
  <input type="submit" class="btn btn-success" value="update" name="update" id="update"/>
  
 
</div>

 
	 
  </div> 
</form> 