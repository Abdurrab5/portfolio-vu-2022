<?php
   
require_once "header.php"; 
   
   
   
   
    $user_id=$_SESSION['user_id'];
			      
		 if(isset($_GET['experienceid']) && $_GET['experienceid']!=''){
				$experience_id=$_GET["experienceid"];
				$userSql = "delete from experience where experience_id='$experience_id'  ";
				$resultuserSql = mysqli_query($link, $userSql); 
				 alert("delete successfuly.");
                     }
?>	



	<div class="content" >
			<div>
		<a href="experience.php" class="btn btn-sm btn-success" role="button" style="float:right;margin-top:20px;">
		+Add Experience</a>
			<div>			 
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

            $query="SELECT * FROM experience where user_id='$user_id'  AND status=1 ";
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
								   <td>
				<a href="experience.php?experienceid=<?php echo $experience_id;?>" class="btn btn-sm btn-primary" role="button">Edit</a>
				                   </td>
							 <td>
				<a href="viewexperience.php?experienceid=<?php echo $experience_id;?>" class="btn btn-sm btn-danger" role="button">Delete</a>
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
