<?php
require_once "header.php";
 

?>
 

 <?php
       
		 
		if(isset($_GET['id']) && $_GET['id']!=''){
				$id=$_GET["id"];

				//deletcompany($link,$id);
                     }
?>	

<body>
<div class="content" >
<div class="container-fluid" >
<div class="container" >
         <h4>
         <a href="company.php">Add company</a>
		 </h4>

          <table class="table" id="table">
                    <thead>
					       <tr>
					       </tr>
					</thead>
					 <thead>
							<tr>
							<th class="serial">s.no</th>
							<th>Company Id</th>
							<th>Company Name</th>
							<th>Logo</th>
							<th>Company Admin</th>
							<th>Update</th>
							<th>Delete</th>
							 </tr>
					</thead>
					<tbody>
<?php	

             $query="SELECT * FROM company   ";
		$result= mysqli_query($link,$query);
		$i=1;
		   while( $row=mysqli_fetch_assoc($result)){
			  $id=$row['company_id'];
			  $company_name=$row['company_name'];
			 
		        $com_admin_id=$row['com_admin_id'];
			  $logo=$row['logo'];
                                    

   ?>
	

                                 <tr>
							       <td class="serial"><?php echo $i++; ?></td>
							       <td><?Php echo $id; ?></td>	 
							       <td><?Php echo $company_name;?></td>
								   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['logo']?>"  alt="" class="img-fluid"
style="border-radius:100px;height:20vh;margin-bottom:50px; " /></td>	 
							       <td><?Php echo $com_admin_id;?></td>
							
				                   <td>
				<a href="company.php?id=<?php echo $id;?>" class="btn btn-sm btn-primary" role="button">Edit</a>
				                   </td>
				                    <td>
				<a href="viewcompany.php?id=<?php echo $id;?>" class="btn btn-sm btn-danger" role="button">Delete</a>
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