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
    
		   
	   	 
		
?>
   

<div class="content" >
<h3> Empoyee personal accounts</h3>
<div class="container" >
 
          <table class="table" id="table">
                    
					 <thead>
							<tr>
							 
							<th>User Id</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Password</th>
							 
							<th>Gender</th>
							<th>Phone</th>
							 
							 
							 </tr>
					</thead>
					<tbody>
<?php	

		 $busSql = "Select user.*,employee.user_id  from user left join employee on user.user_id=employee.user_id where employee.company_id='$company_id'";
             $resultBusSql = mysqli_query($link, $busSql);
                        
                   $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		       
			  $id=$row['user_id'];
				$fname=$row['first_name'];
				$lname=$row['last_name'];
				 $username=$row['username'];
				$email=$row['email'];
				$password=$row['password'];
				 $phone=$row['phone']; 
				$address=$row['address']; 	
				$gender=$row['gender'];
	 
   ?>
	

                                  <tr>
							        <?php   $i++; ?> 
							       <td><?Php echo $id; ?></td>	 
							       <td><?Php echo $fname;?></td>
							       <td><?Php echo $lname ;?></td>
							       <td><?Php echo $username;?></td>
							       <td><?Php echo $email;?></td>
							       <td><?Php echo $password ;?></td>
							       
							       <td><?Php echo  $gender;?></td>
							       <td><?Php echo $phone;?></td>
								 
							
				                   
		                           </tr>
					</tbody>
	<?php
	}
	
	/* 
	function userpersonal($user){
	
           $query="SELECT * FROM user where user_id='$id'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			  $id=$row['user_id'];
				$fname=$row['first_name'];
				$lname=$row['last_name'];
				 $username=$row['username'];
				$email=$row['email'];
				$password=$row['password'];
				 $phone=$row['phone']; 
				$address=$row['address']; 	
				$gender=$row['gender'];
	 $status=$row['status'];
    
		   }
    
		   } */
	?>
	</div>
	</div>
	</div>
	
</body>
</html>
