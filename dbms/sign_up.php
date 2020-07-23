
<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script type="text/javascript" src="./sign_up.js"></script>
    <link type="text/css" rel="stylesheet" href="./sign_up.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Registration Form</title>
  </head>
  <body>
    <img src="back1_earth.png"></img>
    <div ng-app = "RegistrationForm" ng-controller = "Registration">
      <img class="i1" src="picr.svg">
      <h1>Registration Form</h1>
      <form name="myForm" action="stolo.php" method="post" novalidate>
      <div class="inner" >
        <span>FirstName :- </span><input name="frname" type="text" required ng-model="fname" ng-required="true" placeholder="enter your FirstName"><br>
        <span class="error" ng-show="myForm.frname.$touched && myForm.frname.$error.required">Field is required</span><br><br>
        <span>LastName :- </span><input name="lsname" type="text" required ng-model="lname" ng-required="true" placeholder="enter your lastname"><br>
		<span>Type :- </span><select name="Type" ng-model="Type">
                                      <option value="Farmer" selected>Farmer</option>
                                      <option ng-repeat="x in types" value="{{x}}">{{x}}</option>
                                  </select><br>
        <span class="error" ng-show="myForm.lsname.$touched && myForm.lsname.$error.required">Field is required</span><br><br>
        <span>BirthDate :- </span><input name="dofb" id="dob" type="date" ng-model="dob" ng-required="true"><br>
        <span class="error" ng-show="myForm.dofb.$touched && myForm.dofb.$error.required">Field is required</span>
        <span class="error" ng-show="myForm.dofb.$touched && age<5">Enter valid birthdate</span><br>
        <span>Age :- </span><input id="age" type="number" ng-readonly="true" ng-model="GetAge()"><br><br>
        <span>Gender :- </span><input style="width:15px;height:15px" type="radio" ng-model="gender" value="male" checked> <span>Male</span>
                               <input style="width:15px;height:15px" type="radio" ng-model="gender" value="female"><span>Female</span>
        <span><br>
        <br/>
      </div>
      <div class="inner">
        <span>Email :- </span><br><input type="email" name="mail" ng-model="email" placeholder="your email" ng-required="true"><br>
        <span class="error" ng-show="myForm.mail.$touched && myForm.mail.$error.required">Field is required.</span>
        <span class="error" ng-show="myForm.mail.$touched && myForm.mail.$error.email">Please enter valid email id.</span><br>
        <span>Mobile No. :- </span><input type="tel" name="mob" placeholder="XXXXXXXXXX" ng-model="mobile_no" ng-pattern="/^[0-9]{1,10}$/"
          maxlength="10" ng-minlength="10" ng-required="true"><br>
        <span class="error" ng-show="myForm.mob.$touched && myForm.mob.$error.required">Field is required.</span>
        <span class="error" ng-show="myForm.mob.$touched && (myForm.mob.$error.minlength)">
          Exactly 10 digits required</span>
        <span class="error" ng-show="myForm.mob.$touched && myForm.mob.$error.pattern">Only Digits are allowed</span><br>
        <span>Password :- </span><input type="password" name="pass" id="password" ng-model="password" ng-required="true"
          ng-minlength="8" ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/"><br>
        <span class="error" ng-show="myForm.pass.$touched && myForm.pass.$error.required">Field is required</span>
        <span class="error" ng-show="myForm.pass.$touched && myForm.pass.$error.minlength">Minimum 8 characters required</span>
        <span class="error" ng-show="myForm.pass.$touched && myForm.pass.$error.pattern">It should contain one uppercase,one lowercase and one digit</span><br>
        &nbsp;&nbsp;<input style="width:15px;height:15px" type="checkbox" ng-click="ShowPassword()"><span>Show Password </span><br><br>
        <span>Confirm Password :- </span><input type="password" name="ret" id="retype" ng-model="retype" ng-required="true"><br>
        <span class="error" ng-show="myForm.ret.$touched && password!==retype">Not matched with password</span>
        <span class="error" ng-show="myForm.ret.$touched && myForm.ret.$error.required">Field is required</span><br>
		<span>Account No :- </span><input type="text" name="acc" ng-model="acct" ng-required="true"><br>
        <span class="error" ng-show="myForm.acc.$touched && myForm.acc.$error.required">Field is required</span><br>
        <span>Bank Name :- </span><input type="text" name="bname" ng-model="bnam" ng-required="true"><br>
        <span class="error" ng-show="myForm.bname.$touched && myForm.bname.$error.required">Field is required</span><br>
        <span>Bank Branch :- </span><input type="text" name="branc" ng-model="brn" ng-required="true"><br>
        <span class="error" ng-show="myForm.branc.$touched && myForm.branc.$error.required">Field is required</span><br>
        <span>IFSC code :- </span><input type="text" name="ifsc" ng-model="IFSC" ng-required="true"><br>
        <span class="error" ng-show="myForm.ifsc.$touched && myForm.ifsc.$error.required">Field is required</span><br>
        
      </div>
      <div class="inner" >
        <span>STATE :- </span><select name="state" ng-model="State">
                                      <option value="GUJARAT" selected>GUJARAT</option>
                                      <option ng-repeat="x in states" value="{{x}}">{{x}}</option>
                                  </select>
        <span><br><br>District :-</span><br><input id="dist" name="dist" type="text" ng-model="dist" ng-required="true"><br>
		<span class="error" ng-show="myForm.dist.$touched && myForm.dist.$error.required">Field is required</span><br>
        <span>Taluka :- </span><br><input id="ta" name="taluka" ng-model="taluka" type="text"  ng-required="true"><br>
        <span class="error" ng-show="myForm.taluka.$touched && myForm.taluka.$error.required">Field is required</span><br>
        <span>City:- </span><br><input id="city" name="city" ng-model="City" type="text" ng-required="true" ><br>
        <span class="error" ng-show="myForm.city.$touched && myForm.city.$error.required">Field is required</span><br>
		<span>Society:- </span><br><input id="society" name="society" ng-model="Society" type="text" ng-required="true">
        <span class="error" ng-show="myForm.society.$touched && myForm.society.$error.required">Field is required</span><br>
		<span>House No:- </span>&nbsp;<input id="hn" name="hn" ng-model="Ho_no" type="text" ng-required="true">
        <span class="error" ng-show="myForm.hn.$touched && myForm.hn.$error.required">Field is required</span><br>
        <br/>
      </div>
      
      
      <div class="inner1" >
        <button class="sub" ng-click="initialize()">Enter Again</button>&nbsp;&nbsp;
        <button  class="sub" name="submit1" ng-disabled="myForm.frname.$invalid || myForm.lsname.$invalid || myForm.dofb.$invalid || myForm.mail.$invalid || myForm.mob.$invalid || myForm.pass.$invalid || myForm.ret.$invalid || password !== retype || myForm.taluka.$invalid || myForm.dist.$invalid || myForm.city.$invalid || myForm.society.$invalid ||  myForm.hn.$invalid " ng-click="ShowMessage()">submit</button>
      </div>
      
      </form>
  </div>

	
	
  </body>
</html>
