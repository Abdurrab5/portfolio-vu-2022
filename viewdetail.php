<?php
   require_once "connection.php";
require_once "functions.php"; 

$user_id="";
if(isset($_GET['empid']) && $_GET['empid']!=''){
				$user_id=$_GET["empid"];
 
                     }   

?>

<body  >
      
 <?php require_once "navbar.php";
 ?>
  <div style="background-image:url('assets/images/banner5.jpg');width:100%;height:500px;background-repeat:no-repeat;">
 </div>
  <div style="">
    
    
 <?php  // initializ global varaiables
				$fname="";
				$lname="";
				 $username="";
				$email="";
				$password="";
				 $phone=""; 
				$address=""; 	
				$gender="";
			 
				$description="";
				$image="";
				
				
 $query="SELECT * FROM userportfolio where user_id='$user_id'   ";
		$result= mysqli_query($link,$query);
		   

if(mysqli_num_rows($result)){


// data from user table 

           $query="SELECT * FROM user where user_id='$user_id'   ";
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
	 
	 
    
		   }
        

		  
		 
		   
		  
		   
		
    
		 
?>
 

 
    <body>
  
    


	<?php
	// data from userportfolio table
           $query="SELECT * FROM userportfolio where user_id='$user_id'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
			   $portfolio_id=$row['portfolio_id'];
				 
				$image=$row['image'];
				 $description=$row['description']; 
				 
			    
	 
?>


   
		 
	</div> <!--Team-->
<div class="jumbotron bg-primary mt-4 ">
<h2 class="text-white text-center ">Personel Portfolio</h2>
<div class="container ">
<div class="row mt-4">
<div class="col-lg-12 col-sm-12">
<div class="card mt-2">
<div class="card-body  ">
<div class="portfolioimage"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt="" class="img-fluid"
style="border-radius:100px;height:60vh;margin-bottom:300px; " />

 </div>
<h3 class="text-title">Hi I Am</br>
 <?php echo $fname.$lname ;  ?> </h3>
<p><?php echo $description;  ?></p>
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
 
<h3 class="  text-left">Experience: </h3>

<table class="table">
 <thead class="bg-info text-white">
 <tr>
 <td>Company Name</td>
 <td>Designation</td>
 <td>From</td>
 <td>To</td>
 <td>description</td>
 </tr>
 
 </thead>
<tbody>
<?php 
// data from work table 
		   $query="SELECT * FROM experience where user_id='$user_id' AND status=1  ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
				 
				$company_name=$row['company_name'];
				$designation=$row['designation'];
				 $date_from=$row['datefrom'];
				 
				 $date_to=$row['dateto'];
    
	 ?>
  <tr> 
  <td>  <?php  echo $company_name;?> </td>
<td>  <?php  echo $designation;?> </td>

<td><?php  echo $date_from;?></td>

<td><?php  echo $date_to;?></td>
 
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
<h3 class="  text-left">Education  </h3>
<table class="table">
 <thead class="bg-info text-white">
 <tr>
 <td>school name</td>
 <td>Degree</td>
 <td>year</td>
 <td>description</td>
 </tr>
 
 </thead>
<tbody>
<?php
 // data from education table
		    $query="SELECT * FROM education where user_id='$user_id'   ";
		$result= mysqli_query($link,$query);
		$ed=0;
		   while( $row=mysqli_fetch_assoc($result)){
			   $education_id=$row['education_id'];
			    $ed++;
				$school_name=$row['school_name'];
				$degree=$row['degree'];
				 $year=$row['year'];
				$description=$row['description'];
				 ?>
			  <tr> 
<td>  <?php  echo $school_name;?> </td>

<td><?php  echo $degree;?></td>

<td><?php  echo $year;?></td>

<td><?php  echo $description;?></td>
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
 
 

<p class="text-text"><?php    ?></</p>


<div class="jumbotron bg-primary mt-4 ">
<h2 class="text-white text-center "> </h2>
<div class="container ">
<div class="row mt-4">
<div class="col-lg-12 col-sm-12">
<div class="card mt-2">
<div class="card-body text-center ">
<h3 class="  text-left">Certificates</h3>
<table class="table">
 <thead class="bg-info text-white">
 <tr>
 <td>Certificate  </td>
 <td>Acadmy</td>
 <td>year</td>
 <td>description</td>
 </tr>
 
 </thead>
<tbody>

<?php

		   // data from certificate 
		   $query="SELECT * FROM certificate where user_id='$user_id'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
			   $certificate_id=$row['certificate_id'];
				$certificate_name=$row['certificate_name'];
				$acadmy_name=$row['acadmy_name'];
				 $year=$row['year'];
				$description=$row['description'];
				?>
		   
  <tr> 
<td>  <?php  echo $certificate_name;?> </td>

<td><?php  echo $acadmy_name;?></td>

<td><?php  echo $year;?></td>

<td><?php  echo $description;?></td>
</tr>
</tbody>
<?php  }
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
<h3 class="  text-left">Contact</h3>
<?php   

  
		   // data from contact 
		    $query="SELECT * FROM contact where user_id='$user_id'    ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
			   $contact_id=$row['contact_id'];
				$email=$row['email'];
				$mobile=$row['mobile'];
				 $facebook=$row['facebook'];
				$twitter=$row['twitter'];
				 $linkdin=$row['linkdin'];
				 $address=$row['address'];

		  

?>

<div class="row">
<div class="col-6">
Email:</div>
<div class="col-6">
<p class=" bg-info text-white text-text"><?php echo $email;  ?></p></div>
</div>
<div class="row">
<div class="col-6">
Mobile:</div>
<div class="col-6">
<p class=" bg-info text-white text-text"><?php   echo $mobile; ?></p></div>
</div>
<div class="row">
<div class="col-6">
Facebook:</div>
<div class="col-6">
<p class=" bg-info text-white text-text"><?php  echo $facebook; ?></p></div>
</div>
<div class="row">
<div class="col-6">
Twitter:</div>
<div class="col-6">
<p class=" bg-info text-white text-text"><?php  echo $twitter; ?></p></div>
</div>
<div class="row">
<div class="col-6">
Linkdin:</div>
<div class="col-6">
<p class="bg-info text-white text-text"><?php  echo $linkdin; ?></p></div>
</div>
<div class="row">
<div class="col-6">
Address:</div>
<div class="col-6">
<p class=" bg-info text-white text-text"><?php  echo  $address; ?></p></div></div>
 <?php  }   ?>
</div><!--card-body  -->
</div><!-- card -->
</div><!--col  -->
</div><!--card-body  -->
</div><!-- card -->
</div><!--col  -->
<?php  
} ?>
<a href="index.php" class="btn btn-success btn-lg">back</a>
</body>




</html>
