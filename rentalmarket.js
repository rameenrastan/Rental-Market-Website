function checkForm(){
var name=/^[A-Za-z]+\-?[A-Za-z]*$/;

var check = name.test(document.getElementById("firstName").value);
if(check==false){
alert("Incorrect First Name (must only contain letters or a dash)");

}

check = name.test(document.getElementById("lastName").value);
if(check==false){
alert("Incorrect Last Name (must only contain letters or a dash)");

}

var telNumber = /^\({1}[0-9]{3}\){1}[0-9]{3}\-{1}[0-9]{4}$/;
check = telNumber.test(document.getElementById("phone").value);
if(check==false){
alert("Incorrect Phone Number (Must be in form (xxx)xxx-xxx) and contain digits.");

}
var email = /^\w+\@[A-Za-z]+\.[a-z]+$/;
check = email.test(document.getElementById("email").value);
if(check==false){
alert("Incorrect Email Address (Must be in the form example123@example.com)");

}
var username=/^[A-Za-z0-9]{6,}$/;

var check = username.test(document.getElementById("username").value);
if(check==false){
alert("Incorrect username (must only contain letters or digits, must be at least 6 characters.)");

}
var password=/^(?=.*\d)(?=.*([A-Z]|[a-z]))[A-Za-z0-9]{6,}$/;

var check = password.test(document.getElementById("password").value);
if(check==false){
alert("Incorrect password (must contain at least 1 digit and 1 letter, must be 6 or more characters)");

}

if(document.getElementById("password").value != document.getElementById("confirmPassword").value){

alert("Passwords are not matching!");

}



}