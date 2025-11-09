<?php
//to get js alert
function alert($text){
    echo "<script>alert(\"$text\");</script>";
}
//to go to locaton
function redirect_to($path){
    echo "<script>location=\"$path\";</script>";
}
//confirming right to visit
function confirm_user($user){
    if(strtolower($_SESSION['user_type']) != strtolower("$user")){
        alert("Un-Autherize Access");
        redirect_to("index.php");
    }    
}
//confirming log in
function confirm_logged_in(){
    if(isset($_SESSION['user_type'])){
        return true;
    }else{
        alert("Login Required.");
        redirect_to("login.php");
    }
}
//confirmin nt login
function confirm_not_logged_in(){
    if(isset($_SESSION['user_type'])){
        redirect_to("index.php");
    }
}
//index to user penal
function index_func(){
    if(isset($_SESSION['user_type'])){
        $path=$_SESSION['user_type']."_penal.php";
        redirect_to($path);
    }    
}
function get_safe_value($link,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($link,$str);
	}
}
 function getcompany($link){
	$rtSql = "Select * from company";
    $resultrtSql = mysqli_query($link, $rtSql);
    $arr = array();
    if(mysqli_num_rows($resultrtSql))
        while($row = mysqli_fetch_assoc($resultrtSql))
            $arr[] = $row;
       // $routeJson = json_encode($arr);
	   return $arr;
	}
	function pendingreq($link){
$ctSql = "Select * from companyadmin ";
    $resultctSql = mysqli_query($link, $ctSql);
    $arr = array();
    if(mysqli_num_rows($resultctSql))
        while($row = mysqli_fetch_assoc($resultctSql))
            $arr[] = $row;
    return $arr;
	}
	function approve($link){
	$stSql = "Select * from companyadmin ";
    $resultstSql = mysqli_query($link, $stSql);
    $arr = array();
    if(mysqli_num_rows($resultstSql))
        while($row = mysqli_fetch_assoc($resultstSql))
            $arr[] = $row;
    return $arr;
	}
	/* // Bus JSON
	 function bus($link){
    $busSql = "Select * from buses";
    $resultBusSql = mysqli_query($link, $busSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultBusSql))
        $arr[] = $row;
    return $arr;
	 }

    // Booking JSON
	function booking($link){
    $bookingSql = "Select * from bookings";
    $resultBookingSql = mysqli_query($link, $bookingSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultBookingSql))
        $arr[] = $row;
    return $arr;
	}
      function passengerbooking($link,$user){
		  
    $bookingSql = "Select * from bookings where username='$user'";
    $resultBookingSql = mysqli_query($link, $bookingSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultBookingSql))
        $arr[] = $row;
    return $arr;
	}  
    // Admin json
	function admin($link){
    $adminSql = "SELECT * from admin";
    $resultAdminSql = mysqli_query($link, $adminSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultAdminSql))
        $arr[] = $row;
    return $arr;
	} */

    //Earning JSON
    // $result = mysqli_query($conn, 'SELECT SUM(booked_amount) AS value_sum FROM bookings'); 
    // $row = mysqli_fetch_assoc($result); 
    // $sum = $row['value_sum'];
    // echo $sum;
    // return $arr;
?>