<?php 

     require 'header.php';     
	 
 	
$hire_id="";
if(isset($_GET['hireid']) && $_GET['hireid']!=''){
				$hire_id=$_GET["hireid"];
 
                     }   

    
		 $userid=$_SESSION['com_admin_id'];
				$dep_id=""; 
		        $status="";
				$company_id="";
				 $user_id="";
				 $employee_id="";
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
				// when admin select a person as employeee in company
				if(isset($_GET['user_id']) && $_GET['user_id']!=''){
				$user_id =$_GET["user_id"];
 
                     }   
					 // when user click on edit button in office.php so id get that id from url
					 if(isset($_GET['employeeid']) && $_GET['employeeid']!=''){
				$employee_id=$_GET["employeeid"];
 
                     }   
	   	 
		 
 
 				
  $query="SELECT * FROM employee where user_id='$hire_id' ";
		$result= mysqli_query($link,$query);  
		
		   $i=1;
    while($row = mysqli_fetch_assoc($result)){
		        
	           $user_id= $row['user_id'];
		       
		       
		       $company_id=$row['company_id']; 
		         
                                    
	}
	$busSql = "Select * from company where company_id='$company_id'";
             $resultBusSql = mysqli_query($link, $busSql);
                      
		if(mysqli_num_rows($result)){
			
			echo "<p style='margin-left:500px;color:red;margin-top:200px;'>Account Already exists </p>";
			
			
			
		}else{
			
		
			
  
if($user_id>0){
	
	
	
				$dep_id=""; 
		        $status="";
	
                                     
  
		   }elseif($employee_id>0){
			
			$query="SELECT * FROM employee where user_id='$user_id'     ";
		$result= mysqli_query($link,$query);
			  while( $row=mysqli_fetch_assoc($result)){
			   
			      
		       $company_id=$row['company_id'];
		       $dep_id=$row['dep_id']; 
		        $status=$row['status'];

		        

        }
		   } 


?>
 

 
    <<body>
 
    <div >
    </div>


	<?php
	$msg='';
	if(isset($_POST['submit'])){
    
	$dep_id=$_POST['dep_id'];
    $status=$_POST['status'];	
      
	  
     if($employee_id>0){

    
	
    $query="update employee set dep_id='$dep_id',status='$status'  where employee_id='$employee_id'";
    
 $result= mysqli_query($link, $query);
  alert("office address update successfuly.");
       
        redirect_to("dashboard.php");
 
		   }else{ 
			   
    $query="INSERT into employee(user_id,dep_id,company_id,status) VALUES";
    $query.="('$hire_id','$dep_id','$company_id','employeed')";
    $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("employee Added  successfuly.");
       
       redirect_to("dashboard.php");
    }else{
			$msg=" employee already exist";
        
    }
}
	}
	
	
?>

  <div class="container text-dark">
		<h3> Add employee
</h3 >
	</div>
	<div class="container" id="form" >
	<form action="" method="POST" enctype="multipart/form-data" >
 
 <div class="form-group">
    <label for="name">Company Id:</label>
    <input type="text" class="form-control" id="company_id" name="company_id" value="<?php echo $company_id;?>" required=""  Readonly >
  </div>
 <div class="form-group">
    <label for="name">User Id:</label>
    <input type="text" class="form-control" id="User_id" name="user_id" value="<?php echo $hire_id;?>" required="" >
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
   
   <div class="form-group">
    <label for="name">Status:</label>
	
	<select class="form-control" id="status" name="status" required >
	<?php 
	 if($employee_id>0){
 
 ?>
 
 <option  value="<?php echo $status; ?>"><?php echo $status; ?> </option>
 
 <?php
		   }else{
	
	?>
	<option  value="employeed">employeed </option>
 <option  value="unemployeed">Unemployeed </option>
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
 <?php  
		}?>

</body>




</html>
