<?php 

     require 'header.php';     
	   $userid=$_SESSION['com_admin_id'];
	   
	   $company_name= "";
		       
		       $logo="";
		       $company_id=""; 
		        $description="";
	    
	   $busSql = "Select * from company where com_admin_id='$userid'";
             $resultBusSql = mysqli_query($link, $busSql);
                       $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		        
	           $company_name= $row['company_name'];
		       
		       $logo=$row['logo'];
		       $company_id=$row['company_id']; 
		        $description=$row['description'];
                                    
	}
    
			      
		 
		if(isset($_GET['officeid']) && $_GET['officeid']!=''){
				$office_id =$_GET["officeid"];
$userSql ="delete from office_address where office_id='$office_id'  ";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("delete successfuly.");
                     }   
	   	 
		
?>
   

<div class="content" >
  <div  >
<a href="addoffice.php" class="btn btn-sm btn-success" role="button" style="float:right;margin-top:20px;">+Add office</a>
	<div>			 
<div class="container" >
 
          <table class="table" id="table">
                    
					 <thead>
							<tr>
							 <th>office Id</th>
							 
							<th>Company Name</th>
							<th>Street</th>
							<th>City</th>
							<th>Province</th>
							 <th> Country </th>
							 <th>Edit</th>
							<th>Delete</th>
							 </tr>
					</thead>
					<tbody>
<?php	

             $busSql = "Select * from office_address where company_id='$company_id'";
             $resultBusSql = mysqli_query($link, $busSql);
                       $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		        
	            
		       $office_id=$row['office_id']; 
		       $street=$row['street'];
		       $company_id=$row['company_id']; 
		        $city=$row['city'];
				 $province=$row['province'];
                    $country=$row['country'];                

   ?>
	

                                 <tr>
							        <?php   $i++; ?> 
							       <td><?Php echo $office_id; ?></td>
								   
							       <td><?Php echo $company_name;?></td>
							       <td> <?Php echo $street;?></td>
							       <td><?Php echo $city;?></td>
								   <td><?Php echo $province;?></td>
							         <td><?Php echo $country;?></td>
									
								   <td>
				<a href="addoffice.php?officeid=<?php echo $office_id;?>" class="btn btn-sm btn-primary" role="button">Edit</a>
				                   </td>
							 <td>
				<a href="office.php?officeid=<?php echo $office_id;?>" class="btn btn-sm btn-danger" role="button">Delete</a>
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
