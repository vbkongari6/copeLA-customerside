<?php
session_start();
require "validatecustomer.php";
$firstname = $_POST['custfname'];
$lastname = $_POST['custlname'];
$gender = $_POST['custgender'];
$dateofbirth = $_POST['custdob'];
$emailaddress = $_POST['custemail'];
$password = $_POST['custpassword'];
$passwordconfirm = $_POST['custpasswordconfirm'];
$shippingaddress = $_POST['custshippingaddress'];
$city = $_POST['custshippingcity'];
$state = $_POST['custshippingstate'];
$country = $_POST['custshippingcountry'];
$zipcode = $_POST['custshippingzipcode'];
$billingaddress = $_POST['custbillingaddress'];
$cardtype = $_POST['custcardtype'];
$cardnumber = $_POST['custcardnumber'];
$securitycode = $_POST['custcardsecuritycode'];
$uptomonth = $_POST['custcardvalidthrumonth'];
$uptoyear = $_POST['custcardvalidthruyear'];
$contactnumber = $_POST['custcontactnumber'];
$editme = $_POST['inputemail'];
//$var3 = $_POST['submit3'];
$errormsg = "";

if (strlen(trim($firstname)) == 0 || strlen(trim($lastname)) == 0 || strlen(trim($gender)) == 0 || strlen(trim($dateofbirth)) == 0 || strlen(trim($emailaddress)) == 0 || strlen(trim($password)) == 0 || strlen(trim($shippingaddress)) == 0 || strlen(trim($city)) == 0 || strlen(trim($state)) == 0 || strlen(trim($country)) == 0 || strlen(trim($zipcode)) == 0 || strlen(trim($billingaddress)) == 0 || strlen(trim($cardtype)) == 0 || strlen(trim($cardnumber)) == 0 || strlen(trim($securitycode)) == 0 || strlen(trim($uptomonth)) == 0 || strlen(trim($uptoyear)) == 0) { 
    $errormsg = "- * Asterisk fields are mandatory * 1-"; 
}
if (strlen(trim($firstname)) == 0 && strlen(trim($lastname)) == 0 && strlen(trim($gender)) == 0 && strlen(trim($dateofbirth)) == 0 && strlen(trim($emailaddress)) == 0 && strlen(trim($password)) == 0 && strlen(trim($shippingaddress)) == 0 && strlen(trim($city)) == 0 && strlen(trim($state)) == 0 && strlen(trim($country)) == 0 && strlen(trim($zipcode)) == 0 &&  strlen(trim($billingaddress)) == 0 && strlen(trim($cardtype)) == 0 && strlen(trim($cardnumber)) == 0 && strlen(trim($securitycode)) == 0 && strlen(trim($uptomonth)) == 0 && strlen(trim($uptoyear)) == 0) {
    $errormsg = "- * Asterisk fields are mandatory * 2-";
}
if (strlen(trim($firstname)) > 0 && strlen(trim($lastname)) > 0 && strlen(trim($gender)) > 0 && strlen(trim($dateofbirth)) > 0 && strlen(trim($emailaddress)) > 0 && strlen(trim($password)) > 0 && strlen(trim($shippingaddress)) > 0 && strlen(trim($city)) > 0 && strlen(trim($state)) > 0 && strlen(trim($country)) > 0 && strlen(trim($zipcode)) > 0 &&  strlen(trim($billingaddress)) > 0 && strlen(trim($cardtype)) > 0 && strlen(trim($cardnumber)) > 0 && strlen(trim($securitycode)) > 0 && strlen(trim($uptomonth)) > 0 && strlen(trim($uptoyear)) > 0) {
	if(strlen(trim($contactnumber))!=0){
		$sql = "update customers set firstName ='".trim($firstname)."', lastName ='".trim($lastname)."', gender ='".trim($gender)."', dateOfBirth='".trim($dateofbirth)."', emailAddress='".trim($emailaddress)."', password='".trim($password)."', shippingAddress='".trim($shippingaddress)."', city ='".trim($city)."', state ='".trim($state)."', country ='".trim($country)."', zipCode='".trim($zipcode)."', billingAddress='".trim($billingaddress)."', cardType='".trim($cardtype)."', cardNumber='".trim($cardnumber)."', cvv='".trim($securitycode)."', cardValidMonth='".trim($uptomonth)."', cardValidYear='".trim($uptoyear)."', contactNumber='".trim($contactnumber)."' where emailAddress='".trim($editme)."';";
	}
	else{
		$sql = "update customers set firstName ='".trim($firstname)."', lastName ='".trim($lastname)."', gender ='".trim($gender)."', dateOfBirth='".trim($dateofbirth)."', emailAddress='".trim($emailaddress)."', password='".trim($password)."', shippingAddress='".trim($shippingaddress)."', city ='".trim($city)."', state ='".trim($state)."', country ='".trim($country)."', zipCode='".trim($zipcode)."', billingAddress='".trim($billingaddress)."', cardType='".trim($cardtype)."', cardNumber='".trim($cardnumber)."', cvv='".trim($securitycode)."', cardValidMonth='".trim($uptomonth)."', cardValidYear='".trim($uptoyear)."' where emailAddress='".trim($editme)."';";
    }
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ die('Could not be able to connect to  mysql');}
    mysql_select_db('hwdb', $con);
    $res = mysql_query($sql);
}

if (strlen($errormsg) > 0) {
    require "home1.php";
    echo '
                <div id="customerregisterinfo" align="center">
                    <p style="text-decoration:underline">Edit My Profile</p>    
                    <form method="POST" action="customerprofileediting.php" name="customerregistration" onsubmit="return validateCustomerProfileEdit()">
                        <fieldset id="fieldsetautowidth" style="padding-bottom:10px">
                            <legend>Registration Form 1</legend>
                                <table>
                                    <tr><td>First Name *</td>                           
                                        <td><input type="text" name="custfname" id="custfname" maxlength="50" value="'.$firstname.'"/></td></tr>
                                    <tr><td>Last Name *</td>
                                        <td><input type="text" name="custlname" id="custlname" maxlength="50" value="'.$lastname.'"/></td></tr>
                                    <tr><td>Gender *</td>
                                        <td>
                                            <input type="radio" name="custgender" id="custgender" value="Male"';
                                            if($gender == "Male"){echo "checked";} 
                                            echo '/>Male
                                            <input type="radio" name="custgender" id="custgender" value="Female"';
                                            if($gender == "Female"){echo "checked";}
                                            echo '/>Female</td></tr>
                                    <tr><td>Date of Birth *</td>
                                        <td><input type="date" name="custdob" id="custdob" value="'.$dateofbirth.'"/></td></tr>  
                                    <tr><td>Email Address *</td>
                                        <td><input type="email" name="custemail" id="custemail" value="'.$emailaddress.'"/></td></tr>
                                    <tr><td>Password *</td>
                                        <td><input type="password" name="custpassword" id="custpassword" value="'.$password.'"/></td></tr>
                                    <tr><td>Shipping Address *</td>
                                        <td><textarea name="custshippingaddress" id="custshippingaddress" maxlength="180"  style="color:maroon"/>'.$shippingaddress.'</textarea></td></tr>
                                    <tr><td>City *</td>
                                        <td><input type="text" name="custshippingcity" id="custshippingcity" maxlength="50" value="'.$city.'"/></td></tr>
                                    <tr><td>State *</td>
                                        <td><input type="text" name="custshippingstate" id="custshippingstate" maxlength="50" value="'.$state.'"/></td></tr>       
                                </table>
                        </fieldset>
                        <fieldset id="fieldsetautowidth" style="padding-bottom:27px">
                            <legend>Registration Form 2</legend>                    
                                <table>
                                    <tr><td>Country *</td>
                                        <td><input type="text" name="custshippingcountry" id="custshippingcountry" maxlength="50" value="'.$country.'"/></td></tr>
                                    <tr><td>Zip Code *</td>
                                        <td><input type="text" name="custshippingzipcode" id="custshippingzipcode" maxlength="10" value="'.$zipcode.'"/></td></tr>
                                    <tr><td>Billing Address *</td>
                                        <td>
                                            <input type="button" name="shipequalbilladdress" id="shipequalbilladdress" value="same as shipping address" onclick="sameasshippingaddress()"/><br>
                                            <textarea name="custbillingaddress" id="custbillingaddress" maxlength="180"  style="color:maroon"/>'.$billingaddress.'</textarea></td></tr>                          
                                    <tr><td>Card Type *</td>
                                        <td>
                                            <input type="radio" name="custcardtype" id="custcardtype" value="Credit"';
                                            if($cardtype == "Credit"){echo ' checked';}
                                            echo '/>Credit
                                            <input type="radio" name="custcardtype" id="custcardtype" value="Debit"';
                                            if($cardtype == "Debit"){echo ' checked';}
                                            echo '/>Debit
                                        </td></tr>
                                    <tr><td>Card Number *</td>
                                        <td><input type="text" name="custcardnumber" id="custcardnumber" maxlength="16" value="'.$cardnumber.'"/></td></tr>
                                    <tr><td>Card Security Code *</td>
                                        <td><input type="number" name="custcardsecuritycode" id="custcardsecuritycode" max="9999" value="'.$securitycode.'"/></td></tr>
                                    <tr><td>Valid Thru *</td>
                                        <td>
                                            <input type="text" name="custcardvalidthrumonth" id="custcardvalidthrumonth" size="2" placeholder="MM" value="'.$uptomonth.'"/>
                                            <input type="text" name="custcardvalidthruyear" id="custcardvalidthruyear" size="2" placeholder="YY" value="'.$uptoyear.'"/>
                                        </td></tr>
                                    <tr><td>Contact Number :</td>
                                        <td><input type="number" name="custcontactnumber" id="custcontactnumber" max="9999999999" value="'.$contactnumber.'"/></td></tr>                         
                                </table>    
                        </fieldset>
                        <p><input type="submit" name="custregformsubmit" id="custregformsubmit" value="Edit" width="50px"></p> 
                        <input type="text" name="inputemail" id="inputemail" value="'.$editme.'" hidden/>                 
                    </form>         
                    <p id="error"></p>
                    <p>'.$errormsg.'</p>
                </div>
            </body>
        </html>
    ';
}

elseif (!$res) {	
    require "home1.php";
    echo '
                <div id="customerregisterinfo" align="center">
                    <p style="text-decoration:underline">Edit My Profile</p>    
                    <form method="POST" action="customerprofileediting.php" name="customerregistration" onsubmit="return validateCustomerProfileEdit()">
                        <fieldset id="fieldsetautowidth" style="padding-bottom:10px">
                            <legend>Registration Form 1</legend>
                                <table>
                                    <tr><td>First Name *</td>                           
                                        <td><input type="text" name="custfname" id="custfname" maxlength="50" value="'.$firstname.'"/></td></tr>
                                    <tr><td>Last Name *</td>
                                        <td><input type="text" name="custlname" id="custlname" maxlength="50" value="'.$lastname.'"/></td></tr>
                                    <tr><td>Gender *</td>
                                        <td>
                                            <input type="radio" name="custgender" id="custgender" value="Male"';
                                            if($gender == "Male"){echo "checked";} 
                                            echo '/>Male
                                            <input type="radio" name="custgender" id="custgender" value="Female"';
                                            if($gender == "Female"){echo "checked";}
                                            echo '/>Female</td></tr>
                                    <tr><td>Date of Birth *</td>
                                        <td><input type="date" name="custdob" id="custdob" value="'.$dateofbirth.'"/></td></tr>  
                                    <tr><td>Email Address *</td>
                                        <td><input type="email" name="custemail" id="custemail" value="'.$emailaddress.'"/></td></tr>
                                    <tr><td>Password *</td>
                                        <td><input type="password" name="custpassword" id="custpassword" value="'.$password.'"/></td></tr>
                                    <tr><td>Shipping Address *</td>
                                        <td><textarea name="custshippingaddress" id="custshippingaddress" maxlength="180" style="color:maroon"/>'.$shippingaddress.'</textarea></td></tr>
                                    <tr><td>City *</td>
                                        <td><input type="text" name="custshippingcity" id="custshippingcity" maxlength="50" value="'.$city.'"/></td></tr>
                                    <tr><td>State *</td>
                                        <td><input type="text" name="custshippingstate" id="custshippingstate" maxlength="50" value="'.$state.'"/></td></tr>       
                                </table>
                        </fieldset>
                        <fieldset id="fieldsetautowidth" style="padding-bottom:27px">
                            <legend>Registration Form 2</legend>                    
                                <table>
                                    <tr><td>Country *</td>
                                        <td><input type="text" name="custshippingcountry" id="custshippingcountry" maxlength="50" value="'.$country.'"/></td></tr>
                                    <tr><td>Zip Code *</td>
                                        <td><input type="text" name="custshippingzipcode" id="custshippingzipcode" maxlength="10" value="'.$zipcode.'"/></td></tr>
                                    <tr><td>Billing Address *</td>
                                        <td>
                                            <input type="button" name="shipequalbilladdress" id="shipequalbilladdress" value="same as shipping address" onclick="sameasshippingaddress()"/><br>
                                            <textarea name="custbillingaddress" id="custbillingaddress" maxlength="180" style="color:maroon"/>'.$billingaddress.'</textarea></td></tr>                          
                                    <tr><td>Card Type *</td>
                                        <td>
                                            <input type="radio" name="custcardtype" id="custcardtype" value="Credit"';
                                            if($cardtype == "Credit"){echo ' checked';}
                                            echo '/>Credit
                                            <input type="radio" name="custcardtype" id="custcardtype" value="Debit"';
                                            if($cardtype == "Debit"){echo ' checked';}
                                            echo '/>Debit
                                        </td></tr>
                                    <tr><td>Card Number *</td>
                                        <td><input type="text" name="custcardnumber" id="custcardnumber" maxlength="16" value="'.$cardnumber.'"/></td></tr>
                                    <tr><td>Card Security Code *</td>
                                        <td><input type="number" name="custcardsecuritycode" id="custcardsecuritycode" max="9999" value="'.$securitycode.'"/></td></tr>
                                    <tr><td>Valid Thru *</td>
                                        <td>
                                            <input type="text" name="custcardvalidthrumonth" id="custcardvalidthrumonth" size="2" placeholder="MM" value="'.$uptomonth.'"/>
                                            <input type="text" name="custcardvalidthruyear" id="custcardvalidthruyear" size="2" placeholder="YY" value="'.$uptoyear.'"/>
                                        </td></tr>
                                    <tr><td>Contact Number :</td>
                                        <td><input type="number" name="custcontactnumber" id="custcontactnumber" max="9999999999" value="'.$contactnumber.'"/></td></tr>                          
                                </table>    
                        </fieldset>
                        <p><input type="submit" name="custregformsubmit" id="custregformsubmit" value="Edit" width="50px"></p>         
                    </form>         
                    <p id="error"></p>
                    <input type="text" name="inputemail" id="inputemail" value="'.$editme.'" hidden/>
                </div>
            </body>
        </html>
    ';
}

elseif ($res){
    require "customermyprofile.php";
}
?>
