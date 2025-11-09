<?php
require_once "header.php";
 
				$id="";
?>
 

 <?php
 // approve 
       if(isset($_GET['approve']) && $_GET['approve']!=''){
				$id=$_GET["approve"];
$userSql = "update companyadmin set status=1 where com_admin_id='$id'";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("Approved successfuly.");
                     }
					 // set to pending
					 if(isset($_GET['pending']) && $_GET['pending']!=''){
				$id=$_GET["pending"];
$userSql = "update companyadmin set status=0 where com_admin_id='$id'";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("status chenge to pending.");
                     }
					 //delete
		 
		 if(isset($_GET['id']) && $_GET['id']!=''){
				$id=$_GET["id"];
$userSql = "Delete from companyadmin where com_admin_id='$id'";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("Rejected successfuly.");
                     }
?>	

<div class="content" >

<div class="container" >
        

          <table class="table table-responsive" id="table">
                    <thead>
					       <tr>
					       </tr>
					</thead>
					 <thead>
							<tr>
							 <th>s.no</th>
							<th>admin Id</th>
							 
							<th>Username</th>
							<th>Email</th>
							<th>Password</th>
							<th>company Name</th>
							<th>Address</th>
							<th>designation</th>
							<th>Phone</th>
							 
							
							<th>Reject</th>
							 </tr>
					</thead>
					<tbody>
<?php	

             $busSql = "Select * from companyadmin";
             $resultBusSql = mysqli_query($link, $busSql);
                       $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		       $id=$row['com_admin_id'];
	          // $first_name= $row['first_name'];
		      // $last_name=$row['last_name']; 
		       $username=$row['username'];
		       $email=$row['email']; 
		       $password=$row['password'];
		       $designation=$row['designation']; 
		       $address=$row['address'];
		       $phone=$row['phone'];
			   $company_name=$row['company_name'];
 
			  
                                    

   ?>
	

                                 <tr>
							       <td> <?php echo $i++; ?></td>
							       <td><?Php echo $id; ?></td>	 
							       
							       
							       <td><?Php echo $username;?></td>
							       <td><?Php echo $email;?></td>
							       <td><?Php echo $password ;?></td>
								   <td><?Php echo $company_name;?></td>
							       <td><?Php echo $designation;?></td>
							       <td><?Php echo  $address;?></td>
							       <td><?Php echo $phone;?></td>
									<td> 
				<a href="pending.php?id=<?php echo $id;?>" class="btn btn-sm btn-danger" role="button">Delete</a>
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