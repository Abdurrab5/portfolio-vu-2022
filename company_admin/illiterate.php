<?php 

     require 'header.php';     
	   $userid=$_SESSION['com_admin_id'];
	   
	   
	   
	
    
			      
		 
		if(isset($_GET['companyid']) && $_GET['companyid']!=''){
				$education_id =$_GET["companyid"];
$userSql ="delete from company where company_id='$company_id'  ";
             $resultuserSql = mysqli_query($link, $userSql); 
				 alert("delete successfuly.");
                     }   
	   	 
		
?>
   

<div class="content" >
  <div  >
<a href="addcompanyportfolio.php" class="btn btn-sm btn-success" role="button" style="float:right;margin-top:20px;">+Add Company portfolio</a>
	<div>			 
<div class="container" >
 
          <table class="table" id="table">
                    
					 <thead>
							<tr>
							 <th>company Id</th>
							 
							<th>Company Name</th>
							<th>Logo</th>
							<th>Admin Id</th>
							<th>Description</th>
							 
							 <th>Edit</th>
							<th>Delete</th>
							 </tr>
					</thead>
					<tbody>
<?php	

             $busSql = "Select * from company where com_admin_id='$userid'";
             $resultBusSql = mysqli_query($link, $busSql);
                       $i=1;
    while($row = mysqli_fetch_assoc($resultBusSql)){
		        
	           $company_name= $row['company_name'];
		       
		       $logo=$row['logo'];
		       $company_id=$row['company_id']; 
		        $description=$row['description'];
                                    

   ?>
	

                                 <tr>
							        <?php   $i++; ?> 
							       <td><?Php echo $company_id; ?></td>
								   
							       <td><?Php echo $company_name;?></td>
							       <td><img src="<?php echo $row['logo'];?>" alt="" class="img-fluid"
style="border-radius:100px;height:20vh;margin-bottom:50px; " /></td>
							       <td><?Php echo $userid;?></td>
							         <td><?Php echo $description;?></td>
									
								   <td>
				<a href="addcompanyportfolio.php?companyid=<?php echo $company_id;?>" class="btn btn-sm btn-primary" role="button">Edit</a>
				                   </td>
							 <td>
				<a href="viewcompany.php?companyid=<?php echo $company_id;?>" class="btn btn-sm btn-danger" role="button">Delete</a>
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
