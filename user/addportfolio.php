<?php
   
require_once "header.php"; 
   
   
   
   
    $id=$_SESSION['user_id'];
				  $portfolio_id="";
				/* $company_name="";
				$designation="";
				
				$education="";
				$experience=""; */
				 $image="";
				 $description=""; 
				 
				/* $result=""; */
 

 
				
 $query="SELECT * FROM userportfolio where user_id='$id'   ";
		$result= mysqli_query($link,$query);
		   
          
if(mysqli_num_rows($result)){
           $query="SELECT * FROM userportfolio where user_id='$id'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
			   $portfolio_id=$row['portfolio_id'];
				//$company_name=$row['company_name'];
				//$designation=$row['designation'];
				
				//$education=$row['education'];
				//$experience=$row['experience'];
				// $certificate=$row['certificate']; 
				  $image=$row['image'];
			   $description=$row['description']; 
		   }
    
	 
    
		   
        }else{
			
			      $portfolio_id="";
				$image="";
				 $description=""; 
            
        }



?>
 

 
    <<body>
 
    <div >
    </div>


	<?php
	$msg='';
	if(isset($_POST['submit'])){
    
	$description=$_POST['description'];
    /* $designation=$_POST['designation'];
	
    $education=$_POST['education'];
	 
    $experience=$_POST['experience']; 
    $certificate=$_POST['certificate'] */; 	
    /*  $image=$_FILES['image'];
	 
	 $filename=$image['name'];
	 $filepath=$image['tmp_name'];
	 $fileerror=$image['error']; */
	 
	  
    

	 if($portfolio_id>0){
		 
    if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
    $query="update userportfolio set description='$description',image='$image'  where portfolio_id='$portfolio_id'";
    
 $result= mysqli_query($link, $query);
  alert("portfolio update successfuly.");
       
        redirect_to("index.php");
	}
		   }else{ 
		   $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			   
    $query="INSERT into userportfolio(user_id,description,image) VALUES";
    $query.="('$id','$description','$image')";
    $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("Portfolio Added  successfuly.");
       
       redirect_to("index.php");
    }else{
			$msg="Portfolio already exist";
        
    }
}
	}
 
	
?>


  <div class="container text-dark">
		<h3> User Portfolio</h3 >
	</div>
	<div class="container" id="form" >
	<form action="" method="POST" enctype="multipart/form-data" >
 
 <div class="form-group">
    <label for="name">User Id:</label>
    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $id;?>" required="" Placeholder="username:" Readonly >
  </div>
 
   <div class="form-group">
    <label for="name">Image:</label>
    <input type="file" class="form-control" id="image" name="image" required  value="<?php echo $image;?>" >
  </div> 
    
  <div class="form-group">
    <label for="name">Description:</label>
    <input type="text" class="form-control" id="description" name="description" required="" value="<?php echo $description;?>"   >
 
	</div>
   
  <input type="submit" class="btn btn-primary" value="Click to Register" name="submit" id="submit"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>
 

</body>




</html>
