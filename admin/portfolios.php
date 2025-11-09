<?php
   require_once "header.php";
 
$user_id="";

?>

<body  >
    
   
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
			   echo $j++;
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
<!--row2
<div class="col-lg-3 col-sm-6">
<div class="card mt-2">
<div class="card-body text-center">
<img src="images/avtar2.jpeg" alt="" class="img-fluid" 
style="border-radius:100px;" />
<h3 class="text-title">Rukhsar</h3>
<p class="text-text">Itaque illo explicabo voluptatum,
 saepe libero rerum, ad ducimus voluptas nesciunt debitis numquam.</p>
</div><!--card-body  
</div><!-- card  
</div><!--col  -->
<!--row3 
<div class="col-lg-3 col-sm-6">
<div class="card mt-2">
<div class="card-body text-center">
<img src="images/avtar3.jpeg" alt="" class="img-fluid" 
style="border-radius:100px;" />
<h3 class="text-title">Aabid ansari</h3>
<p class="text-text">Itaque illo explicabo voluptatum,
 saepe libero rerum, ad ducimus voluptas nesciunt debitis numquam.</p>
</div><!--card-body  
</div><!-- card  
</div><!--col  -->
<!--row4 
<div class="col-lg-3 col-sm-6">
<div class="card mt-2">
<div class="card-body text-center">
<img src="images/avtar4.jpeg" alt="" class="img-fluid" 
style="border-radius:100px;" />
<h3 class="text-title">jyoti sinah</h3>
<p class="text-text">Itaque illo explicabo voluptatum,
 saepe libero rerum, ad ducimus voluptas nesciunt debitis numquam.</p>
</div><!--card-body  
</div><!-- card 
</div><!--col   

</div><!-- row  
</div><!-- container  
</div><!-- jumbotron -->
<!--Team-->
<div class="jumbotron bg-dark mt-4">
<h2 class="text-white text-center">Company Portfolio</h2>
<div class="row  ">
  
<?php
/* SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID; */
 $query="SELECT company.*,companyadmin.company_name FROM company INNER JOIN companyadmin ON company.com_admin_id=companyadmin.com_admin_id";
		$result= mysqli_query($link, $query);
		$com=0;
		   while($row = mysqli_fetch_assoc($result)){
			   
			   $company_id=$row['company_id'];
				 $com_admin_id=$row['com_admin_id'];
				$image=$row['logo'];
				 $description=$row['description']; 
				 $company_name=$row['company_name']; 
				  
		   
?>
<div class="col-4">
<div class="container">
<div class="row mt-4">
<div class="col ">
<div class="card mt-2">
<div class="card-body text-center">
<div class=" "><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['logo']?>" alt="" class="img-fluid"
style="border-radius:50px;height:40vh ;  " />

 </div>
  
<h1 ><?php

 /* $query="SELECT * FROM user  where user_id='$user_id'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
			    
				 $user_name=$row['username'];
				 
		   echo $user_name;} */
		   
echo $company_name;
?></h1> 
<p class="text-text"><?php echo $description;?> </p>
<a href="viewcompanydetail.php?compid=<?php echo $company_id;?>" class="btn btn-sm btn-primary" role="button">view detail</a>
				
</div><!--card-body  -->
</div><!-- card -->
</div><!--col  -->
</div>
</div>
</div>
<?php

		  
		   }
		   ?>

</div><!-- row -->
</div><!-- container -->
</div><!-- jumbotron -->

   
  </div>
</body>
</html>