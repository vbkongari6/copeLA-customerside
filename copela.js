$(document).ready(all); 

function all(){
	//alert("hel");
	$("#image1").hide().fadeIn(300);
	$("#image2").hide();
	$("#image3").hide();
	$("#image4").hide();
	$("#image5").hide();
	$("#image6").hide();
	$("#ss1").hide().fadeIn(600);
	$("#ss2").hide().fadeIn(900);
	$("#ss3").hide().fadeIn(1200);

	$("#img1").click( function(){
									$("#image1").show();
									$("#image2").hide();
									$("#image3").hide();
									$("#image4").hide();
									$("#image5").hide();
									$("#image6").hide();
									$("#imagecontrol").removeClass("towhite");
								} );
	$("#img2").click( function(){
									$("#image1").hide();
									$("#image2").show();
									$("#image3").hide();
									$("#image4").hide();
									$("#image5").hide();
									$("#image6").hide();
								} );
	$("#img3").click( function(){
									$("#image1").hide();
									$("#image2").hide();
									$("#image3").show();
									$("#image4").hide();
									$("#image5").hide();
									$("#image6").hide();
								} );
	$("#img4").click( function(){
									$("#image1").hide();
									$("#image2").hide();
									$("#image3").hide();
									$("#image4").show();
									$("#image5").hide();
									$("#image6").hide();
									$("#imagecontrol").addClass("towhite");
								} );
	$("#img5").click( function(){
									$("#image1").hide();
									$("#image2").hide();
									$("#image3").hide();
									$("#image4").hide();
									$("#image5").show();
									$("#image6").hide();
									$("#imagecontrol").addClass("towhite");
								} );
	$("#img6").click( function(){
									$("#image1").hide();
									$("#image2").hide();
									$("#image3").hide();
									$("#image4").hide();
									$("#image5").hide();
									$("#image6").show();
									$("#imagecontrol").addClass("towhite");
								} );
	$("#shopnow").click( function(){ window.location.href = 'products.php'; } );

	$("#i81").hover( function(){
									$("#bmwi81").show();
									$("#bmwi82").hide();
									$("#bmwi83").hide();
									$("#bmwi84").hide();
								} );
	$("#i82").hover( function(){
									$("#bmwi81").hide();
									$("#bmwi82").show();
									$("#bmwi83").hide();
									$("#bmwi84").hide();
								} );
	$("#i83").hover( function(){
									$("#bmwi81").hide();
									$("#bmwi82").hide();
									$("#bmwi83").show();
									$("#bmwi84").hide();
								} );
	$("#i84").hover( function(){
									$("#bmwi81").hide();
									$("#bmwi82").hide();
									$("#bmwi83").hide();
									$("#bmwi84").show();
								} );
	
/*
	$("#editmyprofile").click( function(){
									$("#customermyprofile").hide();
									$("#customerrelogininfo").show();
								} );
*/
	$("#canceleditmyprofile").click( function(){
									$("#customermyprofile").show();
									$("#customerrelogininfo").hide();
								} );

	$("#editmyprofile").click( function(){ window.location.href = 'customermyprofile2.php'; } );
	$("#canceleditmyprofile").click( function(){ window.location.href = 'customermyprofile.php'; } );

	$("#editcheckout").click( function(){ window.location.href = 'shoppingcart.php'; } );
	$("#proceedcheckout").click( function(){ window.location.href = 'checkout.php'; } );
	$("#checkout").click( function(){ window.location.href = 'ordering.php'; } );
}

var today = new Date();

//regex for email address
var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//regex for first name, last name
var nameletters = /^[A-Za-z ]{3,50}$/;
//regex for address
var addressregex = /^[0-9a-zA-Z ]{1,200}/;
//regex for number
var numberregex = /^[0-9]+$/;
//regex for credit card
var creditcardregex = /^[0-9]{14,16}$/;
//regex for credit card security code 
var securitycoderegex =/^[0-9]{3,4}$/;
//regex for month
var monthregex =/^[0-9]{2}$/;
//regex for contact number
var contactnumberregex =/^[0-9]{7,10}$/;


function validateCustomerLogin(){	
	//information of error messages
	var errmsg="";
	//for sending error message information
	sendError = document.getElementById('error');

	//getting info from customerlogin.html
	var customeremail = document.getElementById("custloginemail").value;
	var customerpassword = document.getElementById("custloginpassword").value;

	//checking if all fields are filled
	if(customeremail=="" && customerpassword==""){
		errmsg="* Both Email Address and Password is mandatory to Login"; 
		sendError.innerHTML=errmsg; 
		return false;
	}

	//validate email address
	if(customeremail=="") { 
		errmsg="* Email Address is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false; }
	else {
		if(!customeremail.match(emailformat)) { 
			errmsg="* Invalid email address!"; 
			sendError.innerHTML=errmsg; 
			return false; }  
	}

	//checking if password field is filled
	if(customerpassword==""){
		errmsg="* Password is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;
	}
	else{
		if (customerpassword.length<6) {
			errmsg="* Password should have atleast 6 characters"; 
			sendError.innerHTML=errmsg; 
			return false;
		};
	}

	return true;
}

function validateCustomerRegistration(){
	//information of error messages
	var errmsg="";
	//for sending error message information
	sendError = document.getElementById('error');

	//getting info from customerregistration.html
	var customerfisrtname = document.getElementById("custfname").value;
	var customerlastname = document.getElementById("custlname").value;
	var customergender = document.customerregistration.custgender.value;
	var customerdob = document.getElementById("custdob").value;
	var customeremail = document.getElementById("custemail").value;
	var customerpassword = document.getElementById("custpassword").value;
	var customerpasswordconfirmation = document.getElementById("custpasswordconfirm").value;
	var customershippingaddress = document.getElementById("custshippingaddress").value;
	var customershippingcity = document.getElementById("custshippingcity").value;
	var customershippingstate = document.getElementById("custshippingstate").value;
	var customershippingcountry = document.getElementById("custshippingcountry").value;
	var customershippingzipcode = document.getElementById("custshippingzipcode").value;
	var customerbillingaddress = document.getElementById("custbillingaddress").value;
	//var customerbillingcity = document.getElementById("custbillingcity").value;
	//var customerbillingcountry = document.getElementById("custbillingcountry").value;
	//var customerbillingzipcode = document.getElementById("custbillingzipcode").value;
	var customercardtype= document.customerregistration.custcardtype.value;
	var customercardnumber= document.getElementById("custcardnumber").value;
	var customercardsecuritycode= document.getElementById("custcardsecuritycode").value;
	var customercardvalidthrumonth= document.getElementById("custcardvalidthrumonth").value;
	var customercardvalidthruyear= document.getElementById("custcardvalidthruyear").value;
	var customercontactnumber= document.getElementById("custcontactnumber").value;

	//checking if all fields are filled
	if(customerfisrtname=="" && customerlastname=="" && customergender=="" && customerdob=="" && customeremail=="" && customerpassword=="" && customerpasswordconfirmation=="" && customershippingaddress=="" && customershippingcity=="" && customershippingstate=="" && customershippingcountry=="" && customershippingzipcode=="" && customerbillingaddress=="" &&  customercardtype=="" && customercardnumber=="" && customercardsecuritycode=="" && customercardvalidthrumonth=="" && customercardvalidthruyear==""){
		errmsg="* Asterisk fields are mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;
	}

	//validate first name
	if(customerfisrtname==""){
		errmsg="* First Name is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{ 
		if(!customerfisrtname.match(nameletters)) {			 
			errmsg="* First Name should contain only letters and spaces with atleast 3 and atmost 50 characters"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate last name	
	if(customerlastname==""){errmsg="* Last Name is mandatory"; sendError.innerHTML=errmsg; return false;}
	else{
		if(!customerlastname.match(nameletters)) {  
			errmsg="* Last Name should contain only letters and spaces with atleast 3 and atmost 50 characters"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate gender
	if(customergender==""){
		errmsg="* Gender is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}

	//validate date of birth
	if(customerdob==""){
		errmsg="* Date of Birth is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{
		if((today.getMonth())<9){ 
			var month = "0"+(1+today.getMonth());}
		else{ 
			month = 1+today.getMonth();
		}
		var todaysdate = today.getFullYear()+"-"+month+"-"+today.getDate();
		if(Date.parse(customerdob)>Date.parse(todaysdate)){
			errmsg="* Inavalid Date of Birth. We believe you are not from future"; 
			sendError.innerHTML=errmsg; 
			return false;}
	}  

	//validate email address
	if(customeremail=="") { 
		errmsg="* Email Address is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false; }
	else {
		if(!customeremail.match(emailformat)) { 
			errmsg="* Invalid email address!"; 
			sendError.innerHTML=errmsg; 
			return false; }  
	}

	//checking if password field is filled
	if(customerpassword==""){
		errmsg="* Password is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;
	}

	//checking password length
	if(customerpassword.length<6){
		errmsg="* Password should be atleast 6 characters"; 
		sendError.innerHTML=errmsg; 
		return false;
	}

	//checking if confirm password field is filled
	if(customerpasswordconfirmation==""){
		errmsg="* Confirm Password is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;
	}

	//checking if confirm password is same as password
	if(customerpasswordconfirmation != customerpassword){
		errmsg="* Confirm Password unmatched to Password"; 
		sendError.innerHTML=errmsg; 
		return false;
	}

	//validate shipping address	
	if(customershippingaddress==""){ 
		errmsg="* Shipping Address is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{ 
		if(!customershippingaddress.match(addressregex)) {  
			errmsg="* Shipping address must have alphanumeric characters and spaces only"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate city	
	var cityregex = /^[A-Za-z ]{1,50}$/;
	if(customershippingcity==""){ 
		errmsg="* City is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{ 
		if(!customershippingcity.match(cityregex)) {  
			errmsg="* City must have alphabets and spaces only"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate state	
	var stateregex = /^[A-Za-z ]{1,50}$/;
	if(customershippingstate==""){ 
		errmsg="* State is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{ 
		if(!customershippingstate.match(stateregex)) {  
			errmsg="* State must have alphabets and spaces only"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate country	
	var countryregex = /^[A-Za-z ]{1,50}$/;
	if(customershippingcountry==""){ 
		errmsg="* Country is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{ 
		if(!customershippingcountry.match(stateregex)) {  
			errmsg="* Country must have alphabets and spaces only"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate zipcode	
	var zipcoderegex = /^[0-9\-]{1,10}$/;
	if(customershippingzipcode==""){ 
		errmsg="* Zip Code is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{ 
		if(!customershippingzipcode.match(zipcoderegex)) {  
			errmsg="* Zip Code will have numeric and hyphen only"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate billing address	
	if(customerbillingaddress==""){ 
		errmsg="* Billing Address is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{
		if(!customerbillingaddress.match(addressregex)) {  
			errmsg="* Billing address must have alphanumeric characters and spaces only";
			sendError.innerHTML=errmsg; 
			return false;}  
	}  

	//validate Credit Card Type
	if(customercardtype==""){
		errmsg="* Card Type is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}

	//validate credit card number
	if(customercardnumber==""){
		errmsg="* Card Number is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{
		if(!customercardnumber.match(creditcardregex)){
			errmsg="* Inavlid Credit Card Number"; 
			sendError.innerHTML=errmsg; 
			return false;}
	}  

	//validate credit card security code
	if(customercardsecuritycode==""){
		errmsg="* Card Security Code is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{
		if(!customercardsecuritycode.match(securitycoderegex)){
			errmsg="* Inavlid Card Security Code"; 
			sendError.innerHTML=errmsg; 
			return false;}
	}  

	//validate credit card valid upto month
	if(customercardvalidthrumonth==""){
		errmsg="* Credit Card Valid Thru Month is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{
		if(!customercardvalidthrumonth.match(monthregex) || customercardvalidthrumonth>12 || customercardvalidthrumonth<1){
			errmsg="* Inavlid Month. Ex: If Jan, use 01 instead of just 1"; 
			sendError.innerHTML=errmsg; 
			return false;}
	}  

	//regex for credit card year expiry
	var cardyearregex =/^[0-9]{2}$/
	//two digit year
	fullyear=today.getFullYear();
	twodigityear = Number(fullyear.toString().substr(2,2));
	//validate credit card valid upto year
	if(customercardvalidthruyear==""){
		errmsg="* Credit Card Valid Thru Year is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{
		if(!customercardvalidthruyear.match(cardyearregex) || customercardvalidthruyear<twodigityear || customercardvalidthruyear>(10+twodigityear)){
			errmsg="* Inavlid Credit card expiry year"; 
			sendError.innerHTML=errmsg; 
			return false;}
	}  

	//validation of contact number
	if (customercontactnumber!="" && !customercontactnumber.match(contactnumberregex)){
		errmsg="* Contact number should be a 7-10 digit number"; 
		sendError.innerHTML=errmsg; 
		return false;}

	return true;
}

function sameasshippingaddress(){
	var shipaddress = document.getElementById("custshippingaddress").value;
	var shipcity = document.getElementById("custshippingcity").value;
	var shipstate = document.getElementById("custshippingstate").value;
	var shipcountry = document.getElementById("custshippingcountry").value;
	var shipzipcode = document.getElementById("custshippingzipcode").value;
	var billingaddress = shipaddress+" "+shipcity+" "+shipstate+" "+shipcountry+" "+shipzipcode;
	document.getElementById("custbillingaddress").innerHTML = billingaddress;
}

function fillpassword(){
	//for sending error message information
	sendError = document.getElementById('error');
	var custpass = document.getElementById("custloginpassword").value;
	//checking if password field is filled
	if(custpass.length==0){
		errmsg="* Password is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;
	}
}

function validateCustomerProfileEdit(){
	//information of error messages
	var errmsg="";
	//for sending error message information
	sendError = document.getElementById('error');

	//getting info from customerregistration.html
	var customerfisrtname = document.getElementById("custfname").value;
	var customerlastname = document.getElementById("custlname").value;
	var customergender = document.customerregistration.custgender.value;
	var customerdob = document.getElementById("custdob").value;
	var customeremail = document.getElementById("custemail").value;
	var customerpassword = document.getElementById("custpassword").value;
	//var customerpasswordconfirmation = document.getElementById("custpasswordconfirm").value;
	var customershippingaddress = document.getElementById("custshippingaddress").value;
	var customershippingcity = document.getElementById("custshippingcity").value;
	var customershippingstate = document.getElementById("custshippingstate").value;
	var customershippingcountry = document.getElementById("custshippingcountry").value;
	var customershippingzipcode = document.getElementById("custshippingzipcode").value;
	var customerbillingaddress = document.getElementById("custbillingaddress").value;
	//var customerbillingcity = document.getElementById("custbillingcity").value;
	//var customerbillingcountry = document.getElementById("custbillingcountry").value;
	//var customerbillingzipcode = document.getElementById("custbillingzipcode").value;
	var customercardtype= document.customerregistration.custcardtype.value;
	var customercardnumber= document.getElementById("custcardnumber").value;
	var customercardsecuritycode= document.getElementById("custcardsecuritycode").value;
	var customercardvalidthrumonth= document.getElementById("custcardvalidthrumonth").value;
	var customercardvalidthruyear= document.getElementById("custcardvalidthruyear").value;
	var customercontactnumber= document.getElementById("custcontactnumber").value;

	//checking if all fields are filled
	if(customerfisrtname=="" && customerlastname=="" && customergender=="" && customerdob=="" && customeremail=="" && customerpassword=="" && customershippingaddress=="" && customershippingcity=="" && customershippingstate=="" && customershippingcountry=="" && customershippingzipcode=="" && customerbillingaddress=="" &&  customercardtype=="" && customercardnumber=="" && customercardsecuritycode=="" && customercardvalidthrumonth=="" && customercardvalidthruyear==""){
		errmsg="* Asterisk fields are mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;
	}

	//validate first name
	if(customerfisrtname==""){
		errmsg="* First Name is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{ 
		if(!customerfisrtname.match(nameletters)) {			 
			errmsg="* First Name should contain only letters and spaces with atleast 3 and atmost 50 characters"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate last name	
	if(customerlastname==""){errmsg="* Last Name is mandatory"; sendError.innerHTML=errmsg; return false;}
	else{
		if(!customerlastname.match(nameletters)) {  
			errmsg="* Last Name should contain only letters and spaces with atleast 3 and atmost 50 characters"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate gender
	if(customergender==""){
		errmsg="* Gender is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}

	//validate date of birth
	if(customerdob==""){
		errmsg="* Date of Birth is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{
		if((today.getMonth())<9){ 
			var month = "0"+(1+today.getMonth());}
		else{ 
			month = 1+today.getMonth();
		}
		var todaysdate = today.getFullYear()+"-"+month+"-"+today.getDate();
		if(Date.parse(customerdob)>Date.parse(todaysdate)){
			errmsg="* Inavalid Date of Birth. We believe you are not from future"; 
			sendError.innerHTML=errmsg; 
			return false;}
	}  

	//validate email address
	if(customeremail=="") { 
		errmsg="* Email Address is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false; }
	else {
		if(!customeremail.match(emailformat)) { 
			errmsg="* Invalid email address!"; 
			sendError.innerHTML=errmsg; 
			return false; }  
	}

	//checking if password field is filled
	if(customerpassword==""){
		errmsg="* Password is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;
	}

	//checking password length
	if(customerpassword.length<6){
		errmsg="* Password should be atleast 6 characters"; 
		sendError.innerHTML=errmsg; 
		return false;
	}

	//validate shipping address	
	if(customershippingaddress==""){ 
		errmsg="* Shipping Address is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{ 
		if(!customershippingaddress.match(addressregex)) {  
			errmsg="* Shipping address must have alphanumeric characters and spaces only"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate city	
	var cityregex = /^[A-Za-z ]{1,50}$/;
	if(customershippingcity==""){ 
		errmsg="* City is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{ 
		if(!customershippingcity.match(cityregex)) {  
			errmsg="* City must have alphabets and spaces only"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate state	
	var stateregex = /^[A-Za-z ]{1,50}$/;
	if(customershippingstate==""){ 
		errmsg="* State is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{ 
		if(!customershippingstate.match(stateregex)) {  
			errmsg="* State must have alphabets and spaces only"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate country	
	var countryregex = /^[A-Za-z ]{1,50}$/;
	if(customershippingcountry==""){ 
		errmsg="* Country is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{ 
		if(!customershippingcountry.match(stateregex)) {  
			errmsg="* Country must have alphabets and spaces only"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate zipcode	
	var zipcoderegex = /^[0-9\-]{1,10}$/;
	if(customershippingzipcode==""){ 
		errmsg="* Zip Code is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{ 
		if(!customershippingzipcode.match(zipcoderegex)) {  
			errmsg="* Zip Code will have numeric and hyphen only"; 
			sendError.innerHTML=errmsg; 
			return false;}  
	}

	//validate billing address	
	if(customerbillingaddress==""){ 
		errmsg="* Billing Address is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{
		if(!customerbillingaddress.match(addressregex)) {  
			errmsg="* Billing address must have alphanumeric characters and spaces only";
			sendError.innerHTML=errmsg; 
			return false;}  
	}  

	//validate Credit Card Type
	if(customercardtype==""){
		errmsg="* Card Type is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}

	//validate credit card number
	if(customercardnumber==""){
		errmsg="* Card Number is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{
		if(!customercardnumber.match(creditcardregex)){
			errmsg="* Inavlid Credit Card Number"; 
			sendError.innerHTML=errmsg; 
			return false;}
	}  

	//validate credit card security code
	if(customercardsecuritycode==""){
		errmsg="* Card Security Code is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{
		if(!customercardsecuritycode.match(securitycoderegex)){
			errmsg="* Inavlid Card Security Code"; 
			sendError.innerHTML=errmsg; 
			return false;}
	}  

	//validate credit card valid upto month
	if(customercardvalidthrumonth==""){
		errmsg="* Credit Card Valid Thru Month is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{
		if(!customercardvalidthrumonth.match(monthregex) || customercardvalidthrumonth>12 || customercardvalidthrumonth<1){
			errmsg="* Inavlid Month. Ex: If Jan, use 01 instead of just 1"; 
			sendError.innerHTML=errmsg; 
			return false;}
	}  

	//regex for credit card year expiry
	var cardyearregex =/^[0-9]{2}$/
	//two digit year
	fullyear=today.getFullYear();
	twodigityear = Number(fullyear.toString().substr(2,2));
	//validate credit card valid upto year
	if(customercardvalidthruyear==""){
		errmsg="* Credit Card Valid Thru Year is mandatory"; 
		sendError.innerHTML=errmsg; 
		return false;}
	else{
		if(!customercardvalidthruyear.match(cardyearregex) || customercardvalidthruyear<twodigityear || customercardvalidthruyear>(10+twodigityear)){
			errmsg="* Inavlid Credit card expiry year"; 
			sendError.innerHTML=errmsg; 
			return false;}
	}  

	//validation of contact number
	if (customercontactnumber!="" && !customercontactnumber.match(contactnumberregex)){
		errmsg="* Contact number should be a 7-10 digit number"; 
		sendError.innerHTML=errmsg; 
		return false;}

	return true;
}

function cart(){
	var pid = document.getElementById("pid").value;
	var pname = document.getElementById("pname").value;
	var pprice = document.getElementById("pprice").value;
	var quantity = document.getElementById("qty").value;
	$.ajax({
		url: "ajax.php",
		type: "POST",
		dataType: "text",
		data: { pname: pname, pprice: pprice, quantity: quantity, pid: pid },
		cache: false,
		success: function (response) {
			alert('Successfully added '+pname+' to the Cart.');			  
		}
	});
}

function display(){
	$.ajax({
		url: "ajax.php",
		type: "POST",
		data: { value: 'retrieve'},
		success: function (response) {
			$( "#success" ).empty();
			var arr= JSON.parse(response);
			var theTable = document.createElement('table');
			theTable.setAttribute('width', '60%');
			var sum = 0;
			for (var i = 0, tr, td; i < arr.length; i++) {
				sum = Number(sum)+ Number(arr[i].productPrice) * Number(arr[i].Quantity);
				tr = document.createElement('tr');
				td = document.createElement('td');
				td.appendChild(document.createTextNode(arr[i].productName));
				tr.appendChild(td);
				td1 = document.createElement('td');
				td1.appendChild(document.createTextNode(arr[i].productPrice));
				tr.appendChild(td1);

				var input = document.createElement("input");
				input.type = "number";
				input.name = arr[i].Quantity;
				input.value = arr[i].Quantity;
				input.id = arr[i].Quantity;
				input.setAttribute("min", 1);
				input.setAttribute('onchange','updt('+arr[i].Quantity+','+arr[i].productId+')');
				td2 = document.createElement('td');
				td2.appendChild(input);
				tr.appendChild(td2);	

				var del = document.createElement('input');
				del.type = 'button';
				del.name = arr[i].productId;
				del.value = 'Delete';
				del.id = arr[i].productId;
				del.setAttribute('onclick','del('+arr[i].productId+')');

				td3 = document.createElement('td');
				td3.appendChild(del);
				tr.appendChild(td3);

				theTable.appendChild(tr);
			}

			document.getElementById('subtotal').innerHTML = sum;
			document.getElementById('shoppingcart').appendChild(theTable);
		}
	});
}

function updt(x, z){
	var y = document.getElementById(x);
	$.ajax({
		url: "ajax.php", 
		type: "POST", 
		data: { count: y.value, pid: z, }, 
		success: function (response) {window.location.reload();}
	});
}

function del(x){
	$.ajax({
		url: "ajax.php", 
		type: "POST", 
		data: { prod: x },
		success: function (response) {window.location.reload();}
	});
}
