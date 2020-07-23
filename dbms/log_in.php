<?php
session_start();
include "connection.php";
?>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link type="text/css" rel="stylesheet" href="sign_up.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Log In</title>
	
  </head>
  <body>
    <img src="./back1_earth.png"></img>
    <div ng-app = "RegistrationForm" ng-controller = "Registration">
      <img class="i1" src="./picr.svg"></img>
      <h1>Log In to your account</h1><br/>
      <form name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
        <span>Mobile No. :- </span><input type="tel" name="mob" placeholder="XXXXXXXXXX" ng-model="mobile_no" ng-pattern="/^[0-9]{1,10}$/"
          maxlength="10" ng-minlength="10" ng-required="true"><br>
        <span class="error" ng-show="myForm.mob.$touched && myForm.mob.$error.required">Field is required.</span>
        <span class="error" ng-show="myForm.mob.$touched && (myForm.mob.$error.minlength)">
          Exactly 10 digits required</span>
        <span class="error" ng-show="myForm.mob.$touched && myForm.mob.$error.pattern">Only Digits are allowed</span>
        <br>
        <span>Password :- </span><input type="password" name="pass" id="password" ng-model="password" ng-required="true"
          ng-minlength="8" ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/"><br>
        <span class="error" ng-show="myForm.pass.$touched && myForm.pass.$error.required">Field is required</span>
        <span class="error" ng-show="myForm.pass.$touched && myForm.pass.$error.minlength">Minimum 8 characters required</span>
        <span class="error" ng-show="myForm.pass.$touched && myForm.pass.$error.pattern">It should contain one uppercase,one lowercase and one digit</span><br>
		&nbsp;&nbsp;<input style="width:15px;height:15px" type="checkbox" ng-click="ShowPassword()"><span>Show Password </span><br>
		<span>Type :- </span><select name="Type" ng-model="Type">
                                      <option value="Farmer" selected>Farmer</option>
                                      <option ng-repeat="x in types" value="{{x}}">{{x}}</option>
                                  </select><br><br>
								  
        
		
		    <button name="submit1"  ng-disabled=" myForm.mob.$invalid || myForm.pass.$invalid" >submit</button>&nbsp;&nbsp;
        &nbsp;&nbsp;<button type="reset">Reset</button><br>
         <a  href="#"style="color:white;text-decoration:none">Forgot password?</a>
                 <hr width="500px" align="left">
          <font size="5px" color="white">New to site?
        <a href="sign_up.php" style="color:red;text-decoration:none"> Create Account </a></font>
      </form>
    </div>

  <script>
  var app = angular.module("RegistrationForm",[]);

  app.controller("Registration",function($scope){
	$scope.types=["Seller","whole seller","Advertiser"];
    $scope.password = null;
	  $scope.mobile_no = null;
    $scope.ShowPassword = function(){
      var x = document.getElementById("password");

      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    };
});
  </script>
<?php

 if(isset($_POST["submit1"]))
 {
	 $count=0;
	 $res=mysqli_query($link,"select * from login where mobile_no='$_POST[mob]' && password='$_POST[pass]' && type='$_POST[Type]'");
	 $res1=mysqli_query($link,"select Person_id from login where mobile_no='$_POST[mob]' && password='$_POST[pass]' && type='$_POST[Type]'");
	 $count=mysqli_num_rows($res);
     
                            
	  
	 if($count==0)
	 { ?><h2 color="red"><font color="yellow">
 
     <?php
	 
        echo "INVALID MOBILE NUMBER OR PASSWORD";
      ?>  </font></h2>
	  
	  
      <?php

	 }
	 else
	 {
    $result=mysqli_fetch_array($res1);
	$id1 = $result["Person_id"];
	$_SESSION["id"]=$id1;
	$_SESSION["Type"] = $_POST["Type"];
	 mysqli_query($link,"update login set last_visit=CURDATE() where mobile_no ='$_POST[mob]' and password='$_POST[pass]'"); 
	 $_SESSION["loggedin"] = true;
	 
	$Type = $_POST['Type'];
	
	if ($Type=="Farmer")
	{
		
?>
	 <script type="text/javascript">
		 window.location="fa_profile.php";
		 </script>
<?php
   }
   else if ($Type=="Advertiser")
   {
?>
    <script type="text/javascript">
		 window.location="ad_profile.php";
		 </script>
<?php
   }
   else if ($Type=="Seller")
   {
?>
    <script type="text/javascript">
		 window.location="se_profile.php";
	</script>
<?php
   }
   else if ($Type=="whole seller")
   {
?>	
    <script type="text/javascript">
		 window.location="wh_profile.php";
	</script>
<?php
   }
?>
	
	
<?php
	 }
	
 }
 
?>
  </body>
</html>
