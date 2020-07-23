<?php
session_start();
include "connection.php";
?>
<html>
<head>
    <script type="text/javascript" src="./sign_up.js"></script>
    <link type="text/css" rel="stylesheet" href="./sign_up.css">
    <title>Registration Form</title>
  </head>
  <body>
   <img src="back1_earth.png"></img>
      <img class="i1" src="picr.svg">
	  
	  
	  
	  
	  <?php

	if(isset($_POST["submit1"]))
	{
	  $fname = $_POST["frname"];
	  $lname = $_POST["lsname"];
	  $name=$fname." ".$lname;
	  $email=$_POST["mail"];
	  $mail = $_POST["mail"];
	  $mob = $_POST["mob"];
	  
	  $password = $_POST["pass"];
	  $state = $_POST["state"];
	  $dist = $_POST["dist"];
	  $taluka = $_POST["taluka"];
	  $city = $_POST["city"];
	  $society = $_POST["society"];
	  $house_no = $_POST["hn"];
	  $Type = $_POST['Type'];
	  $acc = $_POST['acc'];
	  $bname = $_POST['bname'];
	  $branch = $_POST['branc'];
	  $ifsc = $_POST['ifsc'];
	  
	  
	  
	  
	 
	 $count=0;
	 $res=mysqli_query($link,"select * from login where mobile_no='$_POST[mob]' && password='$_POST[pass]' && type='$_POST[Type]' ");
	 $count=mysqli_num_rows($res);
     
	  
	 if($count==0)
	 { 
         
	 if ($Type == "Farmer")
	 {
		 $id='F'.$mob;
		 mysqli_query($link,"insert into farmer values('$id','$name','$mob','$email',CURDATE(),'','$house_no','$society','$city','$taluka','$dist','$state')");
	 }
	 else if($Type == "Seller")
	 {
		 $id='S'.$mob;
		 mysqli_query($link,"insert into seller values('$id','$name','$mob','$email',CURDATE(),'$house_no','','$society','$city','$taluka','$dist','$state')");
	 }
	 else if($Type == "whole seller")
	 {
		 $id='W'.$mob;
		 mysqli_query($link,"insert into whole_seller values('$id','$name','$mob','$email',CURDATE(),'','$house_no','$society','$city','$taluka','$dist','$state')");
	 }
	 else
	 {
		 $id='A'.$mob;
		 mysqli_query($link,"insert into advertiser values('$id','$name','$email','$mob',CURDATE(),'$house_no','$society','$city','$taluka','$dist','$state','')");
	 }
        mysqli_query($link,"insert into login values('$mob','$password',CURDATE(),'$Type','$id')");
	   
	   mysqli_query($link,"insert into bank_details values('$acc','$bname','$branch','$ifsc','$id')");
	   ?>
	   <script>window.location="log_in.php";</script>
	  <?php
	 }
	 else
	 {
		 ?>
		<script>window.location="sign_up.php";</script>
		<?php
	 }
	   
	}
    ?>
  </body>
</html>