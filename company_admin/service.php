<?php 

     require 'header.php';     
	   $userid=$_SESSION['com_admin_id'];
	   
	   $company_id="";
	   $company_name="";
	    $logo="";
	    $description="";
	    $query="SELECT * FROM company where com_admin_id='$userid'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
			   $company_id=$row['company_id'];
				  $company_name=$row['company_name'];
				  $logo=$row['logo'];
			   $description=$row['description']; 
		   }
    
	
    
			      
		 
		if(isset($_GET['serviceid']) && $_GET['serviceid']!=''){
				$service_id =$_GET["serviceid"];
$userSql ="delete from services where service_id='$service_id'  ";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("delete successfuly.");
                     }   
	   	 
		
?>
   

<div class="content" >
  <div  >
<a href="addservice.php" class="btn btn-sm btn-success" role="button" style="float:right;margin-top:20px;">+Add Service/product</a>
	
	<div>			 
<div class="container" >
 
          <table class="table" id="table">
                    
					 <thead>
							<tr>
							 <th>service Id</th>
							 <th>service Name</th>
							<th>Department Id</th>
							<th>Company Name</th>
							  <th>Edit</th>
							<th>Delete</th>
							 </tr>
					</thead>
					<tbody>
<?php	

             $busSql = "Select * from services where company_id='$company_id'";
             $resultBusSql = mysqli_query($link, $busSql);
                       $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		        
	           $service_id= $row['service_id'];
		       
		       $service_name=$row['service_name'];
		       $dep_id=$row['dep_id']; 
		       
                                    

   ?>
	

                                 <tr>
							        <?php   $i++; ?> 
							       <td><?Php echo $service_id; ?></td>
								   
							       <td><?Php echo $service_name;?></td>
							       <td><?Php echo $dep_id;?></td>
							       
							         <td><?Php echo $company_id;?></td>
									
								   <td>
				<a href="addservice.php?serviceid=<?php echo $service_id;?>" class="btn btn-sm btn-primary" role="button">Edit</a>
				                   </td>
							 <td>
				<a href="service.php?serviceid=<?php echo $service_id;?>" class="btn btn-sm btn-danger" role="button">Delete</a>
				                   </td>
				                   
		                           </tr>
					</tbody>
	<?php
	}
	?>
	</div>
	</div>
	</div>
	
</body>
</html>
