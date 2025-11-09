<?php
   
require_once "header.php"; 
   
   
   
   
    $userid=$_SESSION['user_id'];
			      
		 
		if(isset($_GET['eduid']) && $_GET['eduid']!=''){
				$education_id =$_GET["eduid"];
$userSql ="delete from education where education_id='$education_id'  ";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("delete successfuly.");
                     }
?>	



<div class="content" >
  <div  >
<a href="education.php" class="btn btn-sm btn-success" role="button" style="float:right;margin-top:20px;">+Add Education</a>
	<div>			 
<div class="container" >
 
          <table class="table" id="table">
                    
					 <thead>
							<tr>
							 <th>Education Id</th>
							<th>User Id</th>
							<th>Schoool Name</th>
							<th>Degree Name</th>
							<th>Completion Year</th>
							<th>Description</th>
							 
							 <th>Edit</th>
							<th>Delete</th>
							 </tr>
					</thead>
					<tbody>
<?php	

             $busSql = "Select * from education where user_id='$userid'";
             $resultBusSql = mysqli_query($link, $busSql);
                       $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		       $userid=$row['user_id'];
	           $school_name= $row['school_name'];
		       $degree=$row['degree']; 
		       $year=$row['year'];
		       $education_id=$row['education_id']; 
		        $description=$row['description'];
                                    

   ?>
	

                                 <tr>
							        <?php   $i++; ?> 
							       <td><?Php echo $education_id; ?></td>
								   <td><?Php echo $userid; ?></td>
							       <td><?Php echo $school_name;?></td>
							       <td><?Php echo $degree ;?></td>
							       <td><?Php echo $year;?></td>
							         <td><?Php echo $description;?></td>
									
								   <td>
				<a href="education.php?eduid=<?php echo $education_id;?>" class="btn btn-sm btn-primary" role="button">Edit</a>
				                   </td>
							 <td>
				<a href="vieweducation.php?eduid=<?php echo $education_id;?>" class="btn btn-sm btn-danger" role="button">Delete</a>
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
