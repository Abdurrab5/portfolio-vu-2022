

<?php 

     require 'header.php';     
	

	
	?>




  

<div class="content" >


  
   <!--Team-->
<div class="jumbotron bg-primary mt-4">
<h2 class="text-white text-center">Personel Portfolio</h2>
 <div class="row">
<?php

 $query="SELECT userportfolio.*,user.username FROM userportfolio INNER JOIN user ON userportfolio.user_id=user.user_id ";
		$result= mysqli_query($link,$query);
		$j=0;
		   while( $row=mysqli_fetch_assoc($result)){
			   $j++;
			   $portfolio_id=$row['portfolio_id'];
				 $user_id=$row['user_id'];
				$image=$row['image'];
				 $description=$row['description']; 
$username=$row['username'];
?>

 <div class="col-4">
<div class="container">
<div class="row mt-4">
<div class="col text-center">
<div class="card mt-2">
<div class="card-body text-center">
<div class=" "><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt="" class="img-fluid"
style="border-radius:50px;height:40vh ;  " />

 </div>
  <center>
<h1 ><?php

 /* $query="SELECT * FROM user  where user_id='$user_id'   ";
		$result= mysqli_query($link,$query);
		$i=0;
		   while( $row=mysqli_fetch_assoc($result)){
			   
			$i++;    
				 $user_name=$row['username'];
				 
		   echo $user_name;
		   } */
		   echo $username;

?></h1> </center>
<p class="text-text "><?php echo $description;?> </p>
<a href="addemployee.php?hireid=<?php echo $user_id;?>" class="btn btn-sm btn-success" role="button">Hire Me</a>

<a href="viewdetail.php?empid=<?php echo $user_id;?>" class="btn btn-sm btn-primary" role="button">view detail</a>
				
</div><!--card-body  -->
</div><!-- card -->
</div><!--col  -->
</div>

</div>
</div><!--col  -->

<?php

		   }
		   ?>
		  </div> </div>

   