var app = angular.module("RegistrationForm",[]);

app.controller("Registration",function($scope){

$scope.PersonalInfo = false;
$scope.message = true;
$scope.ContactInfo = true;
$scope.AddressInfo = true;
$scope.Submit = true;

$scope.states = ["RAJASTHAN","MAHARASTRA"];
$scope.types=["Seller","whole seller","Advertiser"];
$scope.initialize = function(){
  $scope.fname = null;
  $scope.lname = null;
  $scope.dob = null;
  $scope.age = null;
  $scope.gender = null;
  $scope.mobile_no = null;
  $scope.email = null;
  $scope.retype = null;
  $scope.password = null;
  $scope.Type = "Farmer";
  $scope.State = "GUJARAT";
  $scope.City = null;
  $scope.Society = null;
  $scope.taluka = null;
  $scope.dist = null;
  document.getElementById("age").value = "";
};

$scope.initialize();

$scope.ShowPersonalInfo = function(){
  $scope.PersonalInfo = false;
};

$scope.HidePersonalInfo = function(){
  $scope.PersonalInfo = true;
};

$scope.ShowContactInfo = function(){
  $scope.ContactInfo = false;
};

$scope.HideContactInfo = function(){
  $scope.ContactInfo = true;
};


$scope.ShowAddressInfo = function(){
  $scope.AddressInfo = false;
};

$scope.HideAddressInfo = function(){
  $scope.AddressInfo = true;
};

$scope.ShowMessage = function(){
  $scope.message = false;
};

$scope.HideMessage = function(){
  $scope.message = true;
};

$scope.HideSubmit = function(){
  $scope.Submit = true;
};

$scope.ShowSubmit = function(){
  $scope.Submit = false;
};

$scope.GetAge = function(){
      var today = new Date();
      var datestring = document.getElementById("dob").value;
      var date = new Date(datestring)
      var age = today.getFullYear() - date.getFullYear();
      var m = today.getMonth() - date.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < date.getDate()))
      {
         age--;
      }
      $scope.age = age;
      return age;
};


$scope.ShowPassword = function(){
      var x = document.getElementById("password");
      var y = document.getElementById('retype');
      if (x.type === "password") {
        x.type = "text";
        y.type = "text";
      } else {
        x.type = "password";
        y.type = "password";
      }
};

});
