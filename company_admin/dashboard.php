 
<?php 

     require 'header.php';     
	 
?>
   

<?php
        
        $page="dashboard";
	/* 	
		 $companycount=getcompany($link);
		$pendingreq=pendingreq($link);
		$approve=approve($link); */
		 
 
 
// declare varaible and store seesion data of user
    $userid=$_SESSION['com_admin_id'];
   
   // initializ global varaiables
				$company_name="";
				$lname="";
				 $username="";
				$email="";
				$password="";
				 $phone=""; 
				$address=""; 	
				$gender="";
				$status="";
				$description="";
				$logo="";
				
				
 $query="SELECT * FROM company where com_admin_id='$userid'   ";
		$result= mysqli_query($link,$query);
		   

if(mysqli_num_rows($result)){


// data from user table 

         
    
	 
    
		 
        

		  
		 
		   
		  
		   
		
    
		 
?>
 

 
    <body>
  <div class="content">
    


	<?php
	// data from userportfolio table
           $query="SELECT * FROM company where com_admin_id='$userid'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
			   $company_id=$row['company_id'];
				  $company_name=$row['company_name'];
				$logo=$row['logo'];
				 $description=$row['description']; 
				 $com_admin_id=$row['com_admin_id'];
			    
	 
?>


  <div class="container">
		 
	</div> <!--Team-->
<div class="jumbotron bg-primary mt-4 ">
<h2 class="text-white text-center ">Company Portfolio</h2>
<div class="container ">
<div class="row mt-4">
<div class="col-lg-12 col-sm-12">
<div class="card mt-2">
<div class="card-body  ">


<div class="portfoliologo">
<div class="row">
<div class="col-6">

<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['logo'];?>" alt="" class="img-fluid"
style="border-radius:100px;height:60vh;margin-bottom:300px " /> 

</div>
<div class="col-6 "
<br/>
<h3 class="text-title">The Company <?php echo $company_name ;  ?></h3>
 
<p><?php echo $description;  ?></p>
 </div></div></div>

		</div><!--card-body  -->
</div><!-- card -->
</div><!--col  -->
 </div> <!--Team-->	
			
</div><!--card-body  -->
</div><!-- card -->
 
  
 <?php
			} 
			 
 
 
 
 
    
		   
			     ?>
			
			 
<div class="jumbotron bg-primary mt-4 ">
<h2 class="text-white text-center "> </h2>
<div class="container ">
<div class="row mt-4">
<div class="col-lg-12 col-sm-12">
<div class="card mt-2">
<div class="card-body text-center ">
 
<h3 class="  text-left">Depatments: </h3>

<table class="table">
 <thead class="bg-info text-white">
 <tr>
 <td>Depatments Name</td>
 
 
 </tr>
 
 </thead>
<tbody>
<?php 
// data from work table 
		   $query="SELECT * FROM department where company_id='$company_id'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
				$dep_id=$row['dep_id'];
				$dep_name=$row['dep_name'];
				 
    
	 ?>
  <tr> 
  <td>  <?php  echo $dep_name;?> </td>

</tr>
</tbody>
 <?php 
		   }
		   
		   ?>
</table>
 
		 
		</div><!--card-body  -->
</div><!-- card -->
</div><!--col  -->   
		   
 </div><!--card-body  -->
</div><!-- card -->
</div><!--col  -->
 
		   
<div class="jumbotron bg-primary mt-4 ">
<h2 class="text-white text-center "> </h2>
<div class="container ">
<div class="row mt-4">
<div class="col-lg-12 col-sm-12">
<div class="card mt-2">
<div class="card-body text-center ">
<h3 class="  text-left">Service/Products  </h3>
<table class="table">
 <thead class="bg-info text-white">
 <tr>
 <td> name</td>
 
 </tr>
 
 </thead>
<tbody>
<?php
 // data from education table
		    $query="SELECT * FROM services where company_id='$company_id'  ";
		$result= mysqli_query($link,$query);
		$ed=0;
		   while( $row=mysqli_fetch_assoc($result)){
			   $service_id=$row['service_id'];
			   
				$service_name=$row['service_name'];
				$dep_id=$row['dep_id'];
				 
				 $ed++;
				 ?>
			  <tr> 
<td>  <?php  echo $service_name;?> </td>
 
</tr>
</tbody><?php   }
 
 ?>
</table>

</div><!--card-body  -->
</div><!-- card -->
</div><!--col  -->   
		   
 </div><!--card-body  -->
</div><!-- card -->
</div><!--col  -->
 

<div class="jumbotron bg-primary mt-4 ">
<h2 class="text-white text-center "> </h2>
<div class="container ">
<div class="row mt-4">
<div class="col-lg-12 col-sm-12">
<div class="card mt-2">
<div class="card-body text-center ">
<h3 class="  text-left">  Office Address</h3>
<?php 
    
		   // data from experience
		   
		   $query="SELECT * FROM office_address where company_id='$company_id'  ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
			   $office_id=$row['office_id'];
				$street=$row['street'];
				 
				$city=$row['city'];
				 $province=$row['province'];
				 
				$country=$row['country'];
			   
		  
 
 
 
 ?>
<div>
<div class="row">
<div class="col-6">
 <p class="text-text "><?php  echo $street ; ?></p> </div  >	<div class="col-6">
 
 <p class="text-text"><?php  echo $city; ?></p>
  <p class="text-text "><?php  echo $province ; ?></p> </div  >	<div class="col-6">
 
 <p class="text-text"><?php  echo $country; ?></p>
	</div>		 
</div  >
		</div  >	
<?php  }



		   

?>
<?php  
}else{   ?>
<div class="content">
<div  style="margin:200px;  ">
<a href="addcompanyportfolio.php" class="btn btn-success btn-lg">Add Company Portfolio</a>
</div>
<?php   
}   ?>

</body>




</html>
