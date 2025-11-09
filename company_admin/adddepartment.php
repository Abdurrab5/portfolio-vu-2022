<?php 

     require 'header.php';     
	 
 

    
		 $userid=$_SESSION['com_admin_id'];
	   $dep_id="";
	   $company_name= "";
		       
		       $logo="";
		       $company_id=""; 
		        $description="";
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
				if(isset($_GET['depid']) && $_GET['depid']!=''){
				$dep_id =$_GET["depid"];
 
                     }   
	   	 
		
 
				
 
  
if($dep_id>0){
	$query="SELECT * FROM department where dep_id='$dep_id'   ";
		$result= mysqli_query($link,$query);
			  while( $row=mysqli_fetch_assoc($result)){
			   
			      
		      $dep_name=$row['dep_name'];
		       $company_id=$row['company_id']; 
		       
		   }
    
	 
    
		   
        }else{
			
			   $dep_name="";
            
        }



?>
 

 
    <<body>
 
    <div >
    </div>


	<?php
	$msg='';
	if(isset($_POST['submit'])){
    
	$dep_name=$_POST['dep_name'];
    	
      
	  
     if($dep_id>0){

    
	
    $query="update department set dep_name='$dep_name'  where dep_id='$dep_id'";
    
 $result= mysqli_query($link, $query);
  alert("office address update successfuly.");
       
        redirect_to("dashboard.php");
 
		   }else{ 
			   
    $query="INSERT into department(dep_name,company_id) VALUES";
    $query.="('$dep_name','$company_id' )";
    $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("office address Added  successfuly.");
       
       redirect_to("dashboard.php");
    }else{
			$msg=" office address already exist";
        
    }
}
	}
	
	
?>

  <div class="container text-dark">
		<h3> Add Department
</h3 >
	</div>
	<div class="container" id="form" >
	<form action="" method="POST" enctype="multipart/form-data" >
 
 <div class="form-group">
    <label for="name">Company Id:</label>
    <input type="text" class="form-control" id="company_id" name="company_id" value="<?php echo $company_id;?>" required="" Placeholder="username:" Readonly >
  </div>
 <div class="form-group">
    <label for="name">Department Name:</label>
    <input type="text" class="form-control" id="dep_name" name="dep_name" value="<?php echo $dep_name;?>" required="" Placeholder="department_name:"  >
  </div>
  
   
  <input type="submit" class="btn btn-success" value="Save" name="submit" id="submit"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>
 

</body>




</html>
