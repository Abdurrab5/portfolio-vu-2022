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
    
			      
		 
		if(isset($_GET['depid']) && $_GET['depid']!=''){
				$dep_id =$_GET["depid"];
$userSql ="delete from department where dep_id='$dep_id'  ";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("delete successfuly.");
                     }   
	   	 
		
?>
   

<div class="content" >
  <div  >
<a href="adddepartment.php" class="btn btn-sm btn-success" role="button" style="float:right;margin-top:20px;">+Add Department</a>
	<div>			 
<div class="container" >
 
          <table class="table" id="table">
                    
					 <thead>
							<tr>
							 <th>Department Id</th>
							 <th>Department Name</th>
							<th>Company Id</th>
							
							
							 <th>Edit</th>
							<th>Delete</th>
							 </tr>
					</thead>
					<tbody>
<?php	

             $busSql = "Select * from department where company_id='$company_id'";
             $resultBusSql = mysqli_query($link, $busSql);
                       $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		        
	            
		       $dep_id=$row['dep_id']; 
		       $dep_name=$row['dep_name'];
		       $company_id=$row['company_id']; 
		                      

   ?>
	

                                 <tr>
							        <?php   $i++; ?> 
							       <td><?Php echo $dep_id; ?></td>
								   
							       <td><?Php echo $dep_name;?></td>
							       <td> <?Php echo $company_id;?></td>
							        
									
								   <td>
				<a href="adddepartment.php?depid=<?php echo $dep_id;?>" class="btn btn-sm btn-primary" role="button">Edit</a>
				                   </td>
							 <td>
				<a href="department.php?depid=<?php echo $dep_id;?>" class="btn btn-sm btn-danger" role="button">Delete</a>
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
