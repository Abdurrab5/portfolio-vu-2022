<?php 

     require 'header.php';     
	 
 

    
		 $userid=$_SESSION['com_admin_id'];
	   $office_id="";
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
				if(isset($_GET['officeid']) && $_GET['officeid']!=''){
				$office_id =$_GET["officeid"];
 
                     }   
	   	 
		
 
				
 $query="SELECT * FROM office_address where company_id='$userid'   ";
		$result= mysqli_query($link,$query);
  
if(mysqli_num_rows($result)){
	$query="SELECT * FROM office_address where company_id='$company_id'   ";
		$result= mysqli_query($link,$query);
			  while( $row=mysqli_fetch_assoc($result)){
			   
			      
		       $street=$row['street'];
		       $company_id=$row['company_id']; 
		        $city=$row['city'];
                    $country=$row['country'];                
 $province=$row['province'];
		   }
    
	 
    
		   
        }else{
			
			        
		       $street="";
		        
		       $city="";
               $country="";                
			   $province="";
            
        }



?>
 

 
    <<body>
 
    <div >
    </div>


	<?php
	$msg='';
	if(isset($_POST['submit'])){
    
	$street=$_POST['street'];
    	
     $city=$_POST['city'];
	 $province=$_POST['province'];
    	
     $country=$_POST['country'];
	  
     if($office_id>0){

    
	
    $query="update office_address set street='$street',city='$city',province='$province',country='$country'  where office_id='$office_id'";
    
 $result= mysqli_query($link, $query);
  alert("office address update successfuly.");
       
        redirect_to("dashboard.php");
 
		   }else{ 
			   
    $query="INSERT into office_address(street,city,province,country,company_id) VALUES";
    $query.="('$street','$city','$province','$country','$company_id' )";
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
		<h3> Add Office Address
</h3 >
	</div>
	<div class="container" id="form" >
	<form action="" method="POST" enctype="multipart/form-data" >
 
 <div class="form-group">
    <label for="name">Company Id:</label>
    <input type="text" class="form-control" id="company_id" name="company_id" value="<?php echo $company_id;?>" required="" Placeholder="username:" Readonly >
  </div>
 <div class="form-group">
    <label for="name">Street:</label>
    <input type="text" class="form-control" id="street" name="street" value="<?php echo $street;?>" required="" Placeholder="company_name:"  >
  </div>
   <div class="form-group">
    <label for="name">City:</label>
    <input type="text" class="form-control" id="city" name="city" required  value="<?php echo $city;?>" >
  </div> 
     <div class="form-group">
    <label for="name">Province:</label>
    <input type="text" class="form-control" id="province" name="province" required  value="<?php echo $province;?>" >
  </div> 
  <div class="form-group">
    <label for="name">Country:</label>
    <input type="text" class="form-control" id="country" name="country" required="" value="<?php echo $country;?>"   >
 
	</div>
   
  <input type="submit" class="btn btn-success" value="Save" name="submit" id="submit"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>
 

</body>




</html>
