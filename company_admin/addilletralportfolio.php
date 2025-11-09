<?php

require 'header.php'; 

?>

<?php
	$msg='';
	if(isset($_POST['submit'])){
    
	$description=$_POST['description'];
     $user_id=$_POST['user_id'];
  
	 
	  
     if($portfolio_id>0){

    if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
	
    $query="update userportfolio set description='$description',image='$image'  where portfolio_id='$portfolio_id'";
    
 $result= mysqli_query($link, $query);
  alert("portfolio update successfuly.");
       
        redirect_to("index.php");
 
		   }else{ 
		   $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			   
    $query="INSERT into userportfolio(user_id,description,image) VALUES";
    $query.="('$user_id','$description','$image')";
    $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("Portfolio Added  successfuly.");
       
       redirect_to("index.php");
    }else{
			$msg="Portfolio already exist";
        
    }
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
	<select class="form-control" id="user_id" name="user_id"   required="" >
      <?php $query="SELECT * FROM user  where status='approve'  ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
			   $user_id=$row['user_id'];
				 
			   $username=$row['username']; 
		   ?>
<option value="<?php  echo $user_id;  ?>"><?php    echo  $username;?> </option>

<?php  
}
?>
</select> </div>
 
   <div class="form-group">
    <label for="name">Image:</label>
    <input type="file" class="form-control" id="image" name="image" required   >
  </div> 
    
  <div class="form-group">
    <label for="name">Description:</label>
    <input type="text" class="form-control" id="description" name="description" required=""     >
 
	</div>
   
  <input type="submit" class="btn btn-primary" value="Click to Register" name="submit" id="submit"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>
 

</body>




</html>
