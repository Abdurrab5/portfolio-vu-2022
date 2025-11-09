<?php
require_once "header.php";
				$id="";
				$company_name="";
				$office_address="";
				$contact="";
				  $email="";
				  $com_admin_id="";
if(isset($_GET['id']) && $_GET['id']!=''){
$id=$_GET["id"];

}
	   if($id>0){
        $query="SELECT * FROM company where company_id='$id'   ";
		$result= mysqli_query($link,$query);
		   while( $row=mysqli_fetch_assoc($result)){
			  $id=$row['company_id'];
			  $company_name=$row['company_name'];
			  $logo=$row['logo'];
			 $description= $row['description'];
			   $com_admin_id=$row['com_admin_id'];
					}
        }else{
			$id="";
				$company_name="";
				$logo="";
			 $description=""; 
            }


?>
 <body>
 
<div class="content" >
     <div >
         <h2 align="middle" >Portfolio</h2></div>


<?php
            $msg='';
	 $msg='';
	if(isset($_POST['submit'])){
    
	$description=$_POST['description'];
    $company_name=$_POST['company_name'];
	
    $com_admin_id=$_POST['com_admin_id'];
	 /* 
    $experience=$_POST['experience']; 
    $certificate=$_POST['certificate'] */; 	
     /* $logo=$_FILES['logo'];
	 
	 $filename=$logo['name'];
	 $filepath=$logo['tmp_name'];
	 $fileerror=$logo['error'];
	 
	 if($fileerror==0){
	 $destfile='../image/'.$filename;
	move_uploaded_file($filepath,$destfile); */
     if($company_id>0){

    
    if($_FILES['logo']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['logo']['name'];
				move_uploaded_file($_FILES['logo']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
	
    $query="update company set description='$description',logo='$image'  where company_id='$companycalhost/portfoi_id'";
    
 $result= mysqli_query($link, $query);
  alert("portfolio update successfuly.");
       
        redirect_to("dashboard.php");
	}
		   }else{ 
			   $image=rand(111111111,999999999).'_'.$_FILES['logo']['name'];
				move_uploaded_file($_FILES['logo']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
    $query="INSERT into company(company_name,logo,com_admin_id,description) VALUES";
    $query.="('$company_name','$image','$com_admin_id','$description')";
    $result= mysqli_query($link, $query);
    if( mysqli_insert_id($link)){
       alert("Company Portfolio Added  successfuly.");
       
       redirect_to("dashboard.php");
    }else{
			$msg=" Comapny Portfolio already exist";
        
    }
}
	}
	
	
?>

  <div class="container text-dark">
		<h3> Add company portfolio
</h3 >
	</div>
	<div class="container" id="form" >
	<form action="" method="POST" enctype="multipart/form-data" >
 
 <div class="form-group">
    <label for="name">Company Admin Id:</label>
    <input type="text" class="form-control" id="com_admin_id" name="com_admin_id" value="<?php echo $com_admin_id;?>" required="" Placeholder="username:"  >
  </div>
 <div class="form-group">
    <label for="name">Company Name:</label>
    <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $company_name;?>" required="" Placeholder="company_name:"  >
  </div>
   <div class="form-group">
    <label for="name">Logo:</label>
    <input type="file" class="form-control" id="logo" name="logo" required  value="<?php echo $logo;?>" >
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