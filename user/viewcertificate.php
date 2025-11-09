<?php
   
require_once "header.php"; 
   
   
   
   
    $userid=$_SESSION['user_id'];
			      
		 
		if(isset($_GET['certificateid']) && $_GET['certificateid']!=''){
				$certificate_id=$_GET["certificateid"];
$userSql = "delete from certificate where certificate_id='$certificate_id'  ";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("delete successfuly.");
                     }
?>	



<div class="content" >
  <div  >
<a href="certificate.php" class="btn btn-sm btn-success" role="button" style="float:right;margin-top:20px;">+Add Certificate</a>
	<div>			 
<div class="container" >
 
          <table class="table" id="table">
                    
					 <thead>
							<tr>
							 <th>certificate Id</th>
							<th>User Id</th>
							<th>Certificate Name</th>
							<th>Acadmy Name</th>
							<th>Completion Year</th>
							<th>Description</th>
							 
							 <th>Edit</th>
							<th>Delete</th>
							 </tr>
					</thead>
					<tbody>
<?php	

             $busSql = "Select * from certificate where user_id='$userid'";
             $resultBusSql = mysqli_query($link, $busSql);
                       $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		       $userid=$row['user_id'];
	           $certificate_id=$row['certificate_id'];
				$certificate_name=$row['certificate_name'];
				$acadmy_name=$row['acadmy_name'];
				 $year=$row['year'];
				$description=$row['description'];
				 
                                    

   ?>
	

                                 <tr>
							        <?php   $i++; ?> 
							       <td><?Php echo $certificate_id; ?></td>
								   <td><?Php echo $userid; ?></td>
							       <td><?Php echo $certificate_name;?></td>
							       <td><?Php echo $acadmy_name ;?></td>
							       <td><?Php echo $year;?></td>
							         <td><?Php echo $description;?></td>
									
								   <td>
				<a href="certificate.php?certificateid=<?php echo $certificate_id;?>" class="btn btn-sm btn-primary" role="button">Edit</a>
				                   </td>
							 <td>
				<a href="viewcertificate.php?certificateid=<?php echo $certificate_id;?>" class="btn btn-sm btn-danger" role="button">Delete</a>
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
