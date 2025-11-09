<?php
   
require_once "header.php"; 
   
   
   
   
    $userid=$_SESSION['user_id'];
			      
		 
		if(isset($_GET['contactid']) && $_GET['contactid']!=''){
				$contact_id=$_GET["contactid"];
$userSql = "delete from contact where contact_id='$contact_id'  ";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("delete successfuly.");
                     }
?>	



<div class="content" >
  <div  >
<a href="contact.php" class="btn btn-sm btn-success" role="button" style="float:right;margin-top:20px;">+Add Contact</a>
	<div>			 
<div class="container" >
 
          <table class="table" id="table">
                    
					 <thead>
							<tr>
							 <th>contact Id</th>
							<th>User Id</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Facebook</th>
							<th>Twitter</th>
							 <th>Linkdin</th>
							<th>Address</th>
							 <th>Edit</th>
							<th>Delete</th>
							 </tr>
					</thead>
					<tbody>
<?php	

             $busSql = "Select * from contact where user_id='$userid'";
             $resultBusSql = mysqli_query($link, $busSql);
                       $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		       $userid=$row['user_id'];
	          $contact_id=$row['contact_id'];
				$email=$row['email'];
				$mobile=$row['mobile'];
				 $facebook=$row['facebook'];
				$twitter=$row['twitter'];
				 $linkdin=$row['linkdin'];
				 $address=$row['address'];
                                    

   ?>
	

                                 <tr>
							        <?php   $i++; ?> 
							       <td><?Php echo $contact_id; ?></td>
								   <td><?Php echo $userid; ?></td>
							       <td><?Php echo $email;?></td>
							       <td><?Php echo $mobile ;?></td>
							       <td><?Php echo $facebook;?></td>
							       <td><?Php echo $twitter;?></td>
								   <td><?Php echo $linkdin;?></td>
							       <td><?Php echo $address;?></td>
								   <td>
				<a href="contact.php?contactid=<?php echo $contact_id;?>" class="btn btn-sm btn-primary" role="button">Edit</a>
				                   </td>
								   <td>
				<a href="viewcontact.php?contactid=<?php echo $contact_id;?>" class="btn btn-sm btn-danger" role="button">Delete</a>
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
