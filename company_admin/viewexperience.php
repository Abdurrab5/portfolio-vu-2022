<?php
   
require_once "header.php"; 


   $com_admin_id=$_SESSION['com_admin_id'];
   $company_name="";
             $query="SELECT * FROM company  where com_admin_id='$com_admin_id' ";
		$result= mysqli_query($link,$query);
		$i=1;
		   while( $row=mysqli_fetch_assoc($result)){
			  $id=$row['company_id'];
			  $company_name=$row['company_name'];
			 
		        $com_admin_id=$row['com_admin_id'];
				
		   }
  // approve 
       if(isset($_GET['approve']) && $_GET['approve']!=''){
				$id=$_GET["approve"];
$userSql = "update experience set status=1 where experience_id='$id'";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("Approved successfuly.");
                     }
					 // set to pending
					 if(isset($_GET['pending']) && $_GET['pending']!=''){
				$id=$_GET["pending"];
$userSql = "update experience set status=0 where experience_id='$id'";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("status chenge to pending.");
                     }
					 //delete
		 
		 if(isset($_GET['id']) && $_GET['id']!=''){
				$id=$_GET["id"];
$userSql = "Select * from experience where experience_id='$id'";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("Rejected successfuly.");
                     }
   
   
?>	



	<div class="content" >
			 		 
		<div class="container" >
 
          <table class="table" id="table">
                    
					 <thead>
							<tr>
							 <th>experience Id</th>
							<th>User Id</th>
							<th>Company Name</th>
							<th>Designation</th>
							<th>Date From</th>
							<th>Date To</th>
							<th>Status</th>
						    <th>Edit</th>
							<th>Delete</th>
						    </tr>
					</thead>
					<tbody>
<?php	

            $query="SELECT * FROM experience where  company_name='$company_name'  ";
		$result= mysqli_query($link,$query);
		$i=1;
		   while( $row=mysqli_fetch_assoc($result)){
			   $experience_id=$row['experience_id'];
			    $user_id=$row['user_id'];
			   $company_name=$row['company_name'];
				$designation=$row['designation'];
				 
				$datefrom=$row['datefrom'];
				 $dateto=$row['dateto'];
				 $status=$row['status'];
			   $i++;
		  
    

   ?>
	

                                 <tr>
							       
							       <td><?Php echo $experience_id; ?></td>
								   <td><?Php echo $user_id; ?></td>
							       <td><?Php echo  $company_name;?></td>
							       
							         <td><?Php echo $designation;?></td>
									  <td><?Php echo  $datefrom;?></td>
							       
							         <td><?Php echo  $dateto;?></td>
									<td><?Php if($status==1){
									echo 'approve';}else{
										echo 'not approve';
									}
										;?></td>
										 <?php
							   if($status==0){
								   ?>
				 
				  <td>
				<a href="viewexperience.php?approve=<?php echo $experience_id;?>" class="btn btn-sm btn-warning" role="button">Approve</a>
				                   </td>
				    <?php 
			   }else{
				   ?>
				    <td>
				<a href='viewexperience.php?pending=<?php echo $experience_id;?>' class='btn btn-sm btn-primary' role='button'>pending</a>
				                   </td> <?php  
			   }
							 ?>
								    
				                    <td>
				<a href="viewexperience.php?id=<?php echo$experience_id;?>" class="btn btn-sm btn-danger" role="button">Reject</a>
				                   </td>
				                   
		                           </tr>
								   
				                   
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
