<?php
  
     require 'header.php';    
   $id="";
				$fname="";
				$lname="";
				 $username="";
				$email="";
				$password="";
				 $phone=""; 
				$address=""; 	
				$gender="";
if(isset($_GET['id']) && $_GET['id']!=''){
$id=$_GET["id"];



}
	  
    if($id>0){
           $query="SELECT * FROM student where s_id='$id'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			  $id=$row['s_id'];
				$fname=$row['first_name'];
				$lname=$row['last_name'];
				 $username=$row['username'];
				$email=$row['email'];
				$password=$row['password'];
				 $phone=$row['phone']; 
				$address=$row['address']; 	
				$gender=$row['gender'];
	 
    
	 
    
		   }
        }else{
			
			     $id="";
				$fname="";
				$lname="";
				 $username="";
				$email="";
				$password="";
				 $phone=""; 
				$address=""; 	
				$gender="";
            
        }



?>
 

 
    <<body>
 
    <div >
    <h2   align="middle" >Add illiterate employee </h2></div>


	<?php
	$msg='';
	if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
	$lname=$_POST['lname'];
    $username=$_POST['username'];
	$email=$_POST['email'];
    $password=$_POST['password'];
	 
    $phone=$_POST['phone']; 
    $address=$_POST['address']; 	
    $gender=$_POST['gender'];
    if($id>0){

    
	
    $query="update student set first_name='$fname',last_name='$lname',username='$username',email='$email',password='$password',address='$address',gender='$gender',phone='$phone' where s_id='$id'";
    
 $result= mysqli_query($link, $query);
  alert("Illetrate employee user update successfuly.");
       
        redirect_to("dashboard.php");
 
		   }else{
    $query="INSERT into user(username,first_name,last_name,email,password,gender,address,phone,status) VALUES";
    $query.="('$username ','$fname','$lname','$email','$password','$gender','$address','$phone','pending')";
    $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("Illetrate employee user registered successfuly.");
       
        redirect_to("dashboard.php");
    }else{
			$msg="user already exist";
        
    }
}
	}
?>


  <div class="container">
		<h3>Registeration</h3>
	</div>
	<div class="container" id="form">
	<form action="" method="POST" >
 
 <div class="form-group">
    <label for="name">User Name:</label>
    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username;?>" required="" Placeholder="username:" >
  </div>
  <div class="form-group">
    <label for="name">First Name:</label>
    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname;?>" required="" Placeholder="username:" >
  </div>
  <div class="form-group">
    <label for="name">Last Name:</label>
    <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname;?>"required="" Placeholder="username:" >
  </div>
   <div class="form-group">
    <label for="name">e-Mail:</label>
    <input type="email" class="form-control" id="email" name="email" required="" value="<?php echo $email;?>" Placeholder="Enter e-Mail add:">
  </div> 
    <div class="form-group">
    <label for="name">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required="" value="<?php echo $password;?>" Placeholder="Enter password:">
  </div>
  
  <div class="form-group">
    <label for="phone">phone:</label>
    <input type="text" class="form-control" id="phone" name="phone" required="" value="<?php echo $phone;?>" Placeholder="03001234567:" >
  </div>
  <div class="form-group">
    <label for="name">address:</label>
    <input type="text" class="form-control" id="address" name="address" required="" value="<?php echo $address;?>" Placeholder="03001234567:" >
 
	</div>
  <div class="form-group">
    <label for="gender">Gender:</label>
    <div class="form-check">
      <?php if($id>0){
		  if($gender=='male'){
			  echo ' <input type="radio" class="form-check-input" id="radio1" name="gender" value="male" checked>Male
     <br>
        <input type="radio" class="form-check-input" id="radio2" name="gender" value="female">Female';
		  }else{
			   echo ' <input type="radio" class="form-check-input" id="radio1" name="gender" value="male" >Male
     <br>
        <input type="radio" class="form-check-input" id="radio2" name="gender" value="female" checked>Female';
		  }
		  
	  }else{?>
        <input type="radio" class="form-check-input" id="radio1" name="gender" value="male" checked>Male
     <br>
        <input type="radio" class="form-check-input" id="radio2" name="gender" value="female">Female
	  <?php }?>
    </div>
  </div>
  <input type="submit" class="btn btn-primary" value="Click to Register" name="submit" id="submit"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>
<a href="index.php"  style="float:left;color:lightblue ">back</a>

</body>




</html>
