<?php
   
require_once "header.php"; 
   
   
   
   
    $userid=$_SESSION['user_id'];
				  $contact_id="";
				 
				$email="";
				$mobile="";
				 $facebook="";
				$twitter="";
				$linkdin="";
				$address="";
				 $user="";
 if(isset($_GET['contactid']) && $_GET['contactid']!=''){
				$contact_id=$_GET["contactid"];

                     }
				
  $query="SELECT * FROM contact where user_id='$userid'   ";
		$result= mysqli_query($link,$query); 
		  
		
		 
		 
		if(mysqli_num_rows($result)){
		   
          
 
           $query="SELECT * FROM contact where user_id='$userid'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
			   $contact_id=$row['contact_id'];
				$email=$row['email'];
				$mobile=$row['mobile'];
				 $facebook=$row['facebook'];
				$twitter=$row['twitter'];
				 $linkdin=$row['linkdin'];
				 $address=$row['address'];
			   
		   }
    
	 
    
		   
        }else{
			
			      $contact_id="";
				$email="";
				$mobile="";
				 $facebook="";
				$twitter="";
				 $linkdin='';
				 $address="";
        }



?>
 

 
    <body>
 
    <div >
    </div>


	<?php
	$msg='';
	if(isset($_POST['submit'])){
    
	$email=$_POST['email'];
    $mobile=$_POST['mobile'];
	
    $twitter=$_POST['twitter'];
	 
     
     $facebook=$_POST['facebook'];
	 $linkdin=$_POST['linkdin'];
	  $address=$_POST['address'];
	 
	  
     if($contact_id>0){

    
	
    $query="update contact set email='$email',mobile='$mobile',facebook='$facebook',twitter='$twitter',linkdin='$linkdin',address='$address' where contact_id='$contact_id'";
    
 $result= mysqli_query($link, $query);
  alert("contact update successfuly.");
       
        redirect_to("index.php");
 
		   }else{ 
			   
    $query="INSERT into contact(user_id,email,mobile,facebook,twitter,linkdin,address) VALUES";
    $query.="('$userid','$email','$mobile','$facebook','$twitter','$linkdin','$address')";
  
  $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("contact Added  successfuly.");
       
       redirect_to("index.php");
    }else{
			$msg="contact already exist";
        
    }
}
	}
	
	
?>


  <div class="container text-dark">
		<h3> contact</h3 >
	</div>
	<div class="container" id="form" >
	<form action="" method="POST" enctype="multipart/form-data" >
 
 <div class="form-group">
    <label for="name">User Id:</label>
    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $userid;?>" required="" Placeholder="username:" Readonly >
  </div>
  <div class="form-group">
    <label for="name">Email:</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>" required>
  </div>
  <div class="form-group">
    <label for="name">Mobile:</label>
    <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile;?>"required>
  </div>
   <div class="form-group">
    <label for="name">Facebook:</label>
    <input type="text" class="form-control" id="facebook" name="facebook" required  value="<?php echo $facebook;?>" >
  </div> 
    <div class="form-group">
    <label for="name">Twitter:</label>
    <input type="text" class="form-control" id="twitter" name="twitter" required="" value="<?php echo $twitter;?>"  ">
  </div>
    <div class="form-group">
    <label for="name">Linkdin:</label>
    <input type="text" class="form-control" id="linkdin" name="linkdin" required="" value="<?php echo $linkdin;?>"  ">
  </div> <div class="form-group">
    <label for="name">Address:</label>
    <input type="text" class="form-control" id="address" name="address" required="" value="<?php echo $address;?>"  ">
  </div>
   
  <input type="submit" class="btn btn-primary" value="Click to Register" name="submit" id="submit"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>
 

</body>




</html>
