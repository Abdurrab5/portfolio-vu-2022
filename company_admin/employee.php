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
    
	
    
if(isset($_GET['type']) && $_GET['type']!=''){
	$type= $_GET['type'];
	if($type=='status'){
		$operation= $_GET['operation'];
		$id= $_GET['id'] ;
		if($operation=='active'){
			$status='employeed';
		}else{
			$status='unemployeed';
		}
		$update_status_sql="update employee set status='$status' where employee_id='$id'";
		mysqli_query($link,$update_status_sql);
	}
}	      
		 
		if(isset($_GET['employeeid']) && $_GET['employeeid']!=''){
				$employee_id =$_GET["employeeid"];
$userSql ="delete from employee where employee_id='$employee_id'  ";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("delete successfuly.");
                     }   
	   	 
		
?>
   

<div class="content" >
  <div  >

	<div>			 
<div class="container" >
 
          <table class="table" id="table">
                    
					 <thead>
							<tr>
							 <th>Employee Id</th>
							 <th>User Id</th>
							
							<th>Department Id</th>
							
							<th>Department Name</th>
							<th>status</th>
							 
							 <th>Edit</th>
							<th>Delete</th>
							<th>change status</th>
							 </tr>
					</thead>
					<tbody>
<?php	

             $busSql = "Select * from employee where company_id='$company_id'";
             $resultBusSql = mysqli_query($link, $busSql);
                       $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		        
	           $employee_id= $row['employee_id'];
		       $company_id= $row['company_id'];
		       $user_id=$row['user_id'];
		        
		        $dep_id=$row['dep_id'];
                      $status=$row['status'];               

   ?>
	

                                 <tr>
							        <?php   $i++; ?> 
							       <td><?Php echo $employee_id; ?></td>
								   
							       <td><?Php echo $user_id;?></td>
							       <td><?Php echo $dep_id;?></td>
							        
							         <td><?Php echo $company_id;?></td>
									  <td><?Php echo $status;?></td>
									
								   <td>
				<a href="addemployee.php?employeeid=<?php echo $employee_id;?>" class="btn btn-sm btn-primary" role="button">Edit</a>
				                   </td>
							 <td>
				<a href="employee.php?employeeid=<?php echo $employee_id;?>" class="btn btn-sm btn-danger" role="button">Delete</a>
				                   </td> <td>
				                 <?php  if($row['status']=='employeed'){
									echo "<span class='btn btn-success'><a href='?type=status&operation=deactive&id=".$row['employee_id']."' style=' color: white;text-decoration:none'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='btn btn-warning'><a href='?type=status&operation=active&id=".$row['employee_id']."' style=' color: white;text-decoration:none'>Deactive</a></span>&nbsp;";
								}?>
								</td>
		                           </tr>
					</tbody>
	<?php
	} ?>
	</div>
	</div>
	
</body>
</html>
