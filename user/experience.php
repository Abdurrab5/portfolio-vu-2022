<?php
   
require_once "header.php"; 
   
   $company_name="";
   $designation="";
   $datefrom="";
   $dateto="";
   
   $experience_id="";
   
    $userid=$_SESSION['user_id'];
				   

 if(isset($_GET['experienceid']) && $_GET['experienceid']!=''){
				$experience_id=$_GET["experienceid"];

                     }
				
 /* $query="SELECT * FROM experience where user_id='$id'   ";
		$result= mysqli_query($link,$query); */
		   
          
if($experience_id>0){
           $query="SELECT * FROM experience where experience_id='$experience_id'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   $experience_id=$row['experience_id'];
			   $company_name=$row['company_name'];
				$designation=$row['designation'];
				 
				$datefrom=$row['datefrom'];
				 $dateto=$row['dateto'];
				 
			   
		   }
    
	 
    
		   
        }else{
			
			      $company_name="";
   $designation="";
   $datefrom="";
   $dateto="";
				 
        }



?>
 

 
    <<body>
 
    <div >
    </div>


	<?php
	$msg='';
	if(isset($_POST['submit'])){
    
	 
     
     
	 
			   $company_name=$_POST['company_name'];
				$designation=$_POST['designation'];
				 
				$datefrom=$_POST['datefrom'];
				 $dateto=$_POST['dateto'];
	  
	 
	  
     if($experience_id>0){

    
	
    $query="update experience set company_name='$company_name',designation='$designation',datefrom='$datefrom',dateto='$dateto'  where experience_id='$experience_id'";
    
 $result= mysqli_query($link, $query);
  alert("Education update successfuly.");
       
        redirect_to("index.php");
 
		   }else{ 
			   
    $query="INSERT into experience(user_id,company_name,designation,datefrom,dateto,status) VALUES";
    $query.="('$userid','$company_name','$designation','$datefrom','$dateto',0)";
  
  $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("experience Added  successfuly.");
       
       redirect_to("index.php");
    }else{
			$msg="experience already exist";
        
    }
}
	}
	
	
?>


  <div class="container text-dark">
		<h3> Experience</h3 >
	</div>
	<div class="container" id="form" >
	<form action="" method="POST" enctype="multipart/form-data" >
 
 <div class="form-group">
    <label for="name">User Id:</label>
    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $userid;?>" required="" Placeholder="username:" Readonly >
  </div>
   
    <div class="form-group">
    <label for="name"> company  Name:</label>
     <select  class="form-control" type="text" name="company_name" id="company_name"   >
	  
  <?php if($experience_id>0){
	  
		   
			  ?>
			  
			  <option value='<?php echo $company_name;  ?>'  ><?php echo $company_name ;  ?></option>
			   <option value=" ">Plz Select company </option>
			  <?php  
			  
		    $query="SELECT * FROM company  ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			  $company_id=$row['company_id'];
			  $company_name=$row['company_name'];
			  
			  
			  ?>
			  
			  <option value='<?php echo $row['company_name'];  ?>'><?php echo $row['company_name'] ;  ?></option>
			  
			  <?php
		  
	  }
	  }else{
		 ?>
		        
		  <?php
		    $query="SELECT * FROM company  ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			  $company_id=$row['company_id'];
			  
			  
			  
			  ?>
			  
			  <option value='<?php echo $row['company_name'];  ?>'><?php echo $row['company_name'] ;  ?></option>
			  
			  <?php
		  
	  }
	
	  }
   ?>
  
  
  </select>
  
  
  </div>
   <div class="form-group">
  <label for="name">designation:</label>
     <Select type="text" class="form-control" id="designation" name="designation" required="">  
         <?php if($experience_id>0){
	  
	  
	  ?>
	   <option value='<?php echo $designation;  ?>'  ><?php echo $designation ;  ?></option>
			   <option value=" ">Plz Select designation </option>
	  
	  
	  <option value="HR Manager">HR Manager</option>
		   <option value="officer">Officer</option>
		   <option value="store manager">Store Manager</option>
		   <option value="CEO">CEO</option>
	  <?php 
		 }else{
			  ?> 
		  <option value="HR Manager">HR Manager</option>
		   <option value="officer">Officer</option>
		   <option value="store manager">Store Manager</option>
		   <option value="CEO">CEO</option>
		   
<?php

		 }
?>
	 </select> </div>
   
   <div class="form-group">
    <label for="name">Date From:</label>
    <input type="date" class="form-control" id="datefrom" name="datefrom" required="" value="<?php echo $datefrom;?>"  ">
  </div>
  <div class="form-group">
    <label for="name">Date To:</label>
    <input type="date" class="form-control" id="dateto" name="dateto" required="" value="<?php echo $dateto;?>"  ">
  </div>
  <input type="submit" class="btn btn-primary" value="Click to Register" name="submit" id="submit"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>
 

</body>




</html>
