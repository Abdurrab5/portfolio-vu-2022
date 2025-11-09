<?php
   
require_once "header.php"; 
   
   
   
   
    $userid=$_SESSION['user_id'];
				  $certificate_id="";
				 
				$certificate_name="";
				$acadmy_name="";
				 $year="";
				$description="";

 if(isset($_GET['certificateid']) && $_GET['certificateid']!=''){
				$certificate_id=$_GET["certificateid"];

                     }
				
 /* $query="SELECT * FROM certificate where certificate_id='$certificate_id'   ";
		$result= mysqli_query($link,$query); */
		   
          
if($certificate_id>0){
           $query="SELECT * FROM certificate where certificate_id='$certificate_id'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   
			   $certificate_id=$row['certificate_id'];
				$certificate_name=$row['certificate_name'];
				$acadmy_name=$row['acadmy_name'];
				 $year=$row['year'];
				$description=$row['description'];
				 
			   
		   }
    
	 
    
		   
        }else{
			
			      $certificate_id="";
				$certificate_name="";
				$acadmy_name="";
				 $year="";
				$description="";
				 
        }



?>
 

 
    <<body>
 
    <div >
    </div>


	<?php
	$msg='';
	if(isset($_POST['submit'])){
    
	$certificate_name=$_POST['certificate_name'];
    $acadmy_name=$_POST['acadmy_name'];
	
    $description=$_POST['description'];
	 
     
     $year=$_POST['year'];
	 
	  
	 
	  
     if($certificate_id>0){

    
	
    $query="update certificate set certificate_name='$certificate_name',acadmy_name='$acadmy_name',year='$year',description='$description'  where certificate_id='$certificate_id'";
    
 $result= mysqli_query($link, $query);
  alert("certificate update successfuly.");
       
        redirect_to("index.php");
 
		   }else{ 
			   
    $query="INSERT into certificate(user_id,certificate_name,acadmy_name,year,description) VALUES";
    $query.="('$userid','$certificate_name','$acadmy_name','$year','$description')";
  
  $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("certificate Added  successfuly.");
       
       redirect_to("index.php");
    }else{
			$msg="certificate already exist";
        
    }
}
	}
	
	
?>


  <div class="container text-dark">
		<h3> certificate</h3 >
	</div>
	<div class="container" id="form" >
	<form action="" method="POST" enctype="multipart/form-data" >
 
 <div class="form-group">
    <label for="name">User Id:</label>
    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $userid;?>" required="" Placeholder="username:" Readonly >
  </div>
  <div class="form-group">
    <label for="name">Certificate Name:</label>
    <input type="text" class="form-control" id="certificate_name" name="certificate_name" value="<?php echo $certificate_name;?>" required>
  </div>
  <div class="form-group">
    <label for="name">acadmy_name:</label>
    <input type="text" class="form-control" id="acadmy_name" name="acadmy_name" value="<?php echo $acadmy_name;?>"required>
  </div>
   <div class="form-group">
    <label for="name">Year:</label>
    <input type="date" class="form-control" id="year" name="year" required  value="<?php echo $year;?>" >
  </div> 
    <div class="form-group">
    <label for="name">Description:</label>
    <input type="text" class="form-control" id="description" name="description" required="" value="<?php echo $description;?>"  ">
  </div>
   
   
  <input type="submit" class="btn btn-primary" value="Click to Register" name="submit" id="submit"/>
  <input type="reset" class="btn btn-danger" value="Reset" name="reset" id="reset"/>
   <div class="field_error"><?php echo $msg?></div>
</div>
</form>
</div>
 

</body>




</html>
