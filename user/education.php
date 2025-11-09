<?php
   
require_once "header.php"; 
   
   
   
   
    $userid=$_SESSION['user_id'];
				  $education_id="";
				 
				$school_name="";
				$degree="";
				 $year="";
				$description="";

 if(isset($_GET['eduid']) && $_GET['eduid']!=''){
				$education_id=$_GET["eduid"];

                     
					 
					 }
				
 /* $query="SELECT * FROM education where education_id='$education_id'   ";
		$result= mysqli_query($link,$query); */
		   
          
if($education_id>0){
           $query="SELECT * FROM education where education_id='$education_id'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			   $education_id=$row['education_id'];
			    
				$school_name=$row['school_name'];
				$degree=$row['degree'];
				 $year=$row['year'];
				$description=$row['description'];
				 
			   
		   }
    
	 
    
		   
        }else{
			
			      $education_id="";
				$school_name="";
				$degree="";
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
    
	$school_name=$_POST['school_name'];
    $degree=$_POST['degree'];
	
    $description=$_POST['description'];
	 
     
     $year=$_POST['year'];
	 
	  
	 
	  
     if($education_id>0){

    
	
    $query="update education set school_name='$school_name',degree='$degree',year='$year',description='$description'  where education_id='$education_id'";
    
 $result= mysqli_query($link, $query);
  alert("Education update successfuly.");
       
        redirect_to("index.php");
 
		   }else{ 
			   
    $query="INSERT into education(user_id,school_name,degree,year,description) VALUES";
    $query.="('$userid','$school_name','$degree','$year','$description')";
  
  $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("education Added  successfuly.");
       
       redirect_to("index.php");
    }else{
			$msg="education already exist";
        
    }
}
	}
	
	
?>


  <div class="container text-dark">
		<h3> Education</h3 >
	</div>
	<div class="container" id="form" >
	<form action="" method="POST" enctype="multipart/form-data" >
 
 <div class="form-group">
    <label for="name">User Id:</label>
    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $userid;?>" required="" Placeholder="username:" Readonly >
  </div>
  <div class="form-group">
    <label for="name">School Name:</label>
    <input type="text" class="form-control" id="school_name" name="school_name" value="<?php echo $school_name;?>" required>
  </div>
  <div class="form-group">
    <label for="name">Degree:</label>
    <input type="text" class="form-control" id="degree" name="degree" value="<?php echo $degree;?>"required>
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
