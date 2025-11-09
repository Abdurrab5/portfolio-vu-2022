<?php 

     require 'header.php';     
	 
 

    
		 $userid=$_SESSION['com_admin_id'];
				$dep_id=""; 
		        $status="";
				$company_id="";
				 $user_id="";
				 $employee_id="";
				  
		         
		        $service_id="";
	 $service_name="";
	
	    // check company id from company of current admin login
	   $busSql = "Select * from company where com_admin_id='$userid'";
             $resultBusSql = mysqli_query($link, $busSql);
                       $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		        
	           $company_name= $row['company_name'];
		       
		       $logo=$row['logo'];
		       $company_id=$row['company_id']; 
		        $description=$row['description'];
                                    
	}
				
				
 
                     
				 
					 // when user click on edit button in office.php so id get that id from url
					 if(isset($_GET['serviceid']) && $_GET['serviceid']!=''){
				$service_id=$_GET["serviceid"];
 
                     }   
	   	 
		
 
 				
 /* $query="SELECT * FROM employee where user_id='$user_id'   ";
		$result= mysqli_query($link,$query);  */
  
if($service_id>0){
	
	
			$query="SELECT * FROM services where service_id='$service_id'     ";
		$result= mysqli_query($link,$query);
			  while( $row=mysqli_fetch_assoc($result)){
			   
			      
		       $company_id=$row['company_id'];
		       $dep_id=$row['dep_id']; 
		        $service_id=$row['serevice_id'];
	 $service_name=$row['serevice_name'];
              }                         
  
		   }else{
			

				$dep_id=""; 
		         
		        $service_id="";
	 $service_name="";
	
		        

        }
		 


?>
 

 
    <<body>
 
    <div >
    </div>


	<?php
	$msg='';
	if(isset($_POST['submit'])){
    
	$dep_id=$_POST['dep_id'];
    $service_name=$_POST['service_name'];	
      
	  
     if($service_id_id>0){

    
	
    $query="update services set dep_id='$dep_id',service_name='$service_name'  where service_id='$service_id'";
    
 $result= mysqli_query($link, $query);
  alert("service update successfuly.");
       
        redirect_to("dashboard.php");
 
		   }else{ 
			   
    $query="INSERT into services(service_name,dep_id,company_id) VALUES";
    $query.="('$service_name','$dep_id','$company_id')";
    $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("employee Added  successfuly.");
       
       redirect_to("dashboard.php");
    }else{
			$msg=" service already exist";
        
    }
}
	}
	
	
?>

  <div class="container text-dark">
		<h3> Add Service
</h3 >
	</div>
	<div class="container" id="form" >
	<form action="" method="POST" enctype="multipart/form-data" >
 
 <div class="form-group">
    <label for="name">Company Id:</label>
    <input type="text" class="form-control" id="company_id" name="company_id" value="<?php echo $company_id;?>" required=""  Readonly >
  </div>
 <div class="form-group">
    <label for="name"> Service Name:</label>
    <input type="text" class="form-control" id="service_name" name="service_name" value="<?php echo $service_name;?>" required="" >
  </div>
   <div class="form-group">
    <label for="name">Department:</label>
	
	<select class="form-control" id="dep_id" name="dep_id" required >
	<?php 
	$query="SELECT * FROM department where company_id='$company_id'   ";
		$result= mysqli_query($link,$query);
			  while( $row=mysqli_fetch_assoc($result)){
			   
			      
		       $dep_name=$row['dep_name'];
		       $dep_id=$row['dep_id']; 
		        $city=$row['city'];
                    $country=$row['country'];                
 $province=$row['province'];
 
 
 ?>
 <option  value="<?php  echo $dep_id; ?>">  <?php echo $dep_name;?> </option>
 
 <?php
		   }
	
	?>
	
	
	</select>
   
  </div> 
   
   
  <input type="submit" class="btn btn-success" value="Save" name="submit" id="submit"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>
 

</body>




</html>
