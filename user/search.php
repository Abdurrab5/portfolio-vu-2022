<?php
require_once "header.php";
 

?>
 

 <?php
      				  
if(isset($_GET['search']) && $_GET['search']!=''){
$search=$_GET["search"];


		 
		
?>

<body>
<div class="container-fluid" >
<div class="container" >
        

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
							<th>Office Address</th>
							<th>Contact</th>
							 <th>Email</th>
							
							 </tr>
					</thead>
					<tbody>
<?php	

             $query="SELECT * FROM company where company_name='$search'  ";
		$result= mysqli_query($link,$query);
		$i=1;
		   while( $row=mysqli_fetch_assoc($result)){
			  $id=$row['company_id'];
			  $company_name=$row['company_name'];
			  $office_address=$row['office_address'];
			  $contact=$row['contact'];
			  $email=$row['email'];
		        
                                    

   ?>
	

                                 <tr>
							       <td class="serial"><?php echo $i++; ?></td>
							       <td><?Php echo $id; ?></td>	 
							       <td><?Php echo $company_name;?></td>
								    <td><?Php echo $office_address;?></td>
							       <td><?Php echo  $contact ;?></td>
							       <td><?Php echo  $email ;?></td>
							
				                  
		                           </tr>
					</tbody>
	<?php
	}
}
	/* }else{
		echo "data not found";
	} */
	?>
	</div>
	</div>
	</div>
</body>
</html>