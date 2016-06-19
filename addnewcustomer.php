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

if (strlen(trim($firstname)) == 0 || strlen(trim($lastname)) == 0 || strlen(trim($gender)) == 0 || strlen(trim($dateofbirth)) == 0 || strlen(trim($emailaddress)) == 0 || strlen(trim($password)) == 0 || strlen(trim($passwordconfirm)) == 0 || strlen(trim($shippingaddress)) == 0 || strlen(trim($city)) == 0 || strlen(trim($state)) == 0 || strlen(trim($country)) == 0 || strlen(trim($zipcode)) == 0 || strlen(trim($billingaddress)) == 0 || strlen(trim($cardtype)) == 0 || strlen(trim($cardnumber)) == 0 || strlen(trim($securitycode)) == 0 || strlen(trim($uptomonth)) == 0 || strlen(trim($uptoyear)) == 0) { 
    $errormsg = "- * Asterisk fields are mandatory * 1-"; 
}
if (strlen(trim($firstname)) == 0 && strlen(trim($lastname)) == 0 && strlen(trim($gender)) == 0 && strlen(trim($dateofbirth)) == 0 && strlen(trim($emailaddress)) == 0 && strlen(trim($password)) == 0 && strlen(trim($passwordconfirm)) == 0 && strlen(trim($shippingaddress)) == 0 && strlen(trim($city)) == 0 && strlen(trim($state)) == 0 && strlen(trim($country)) == 0 && strlen(trim($zipcode)) == 0 &&  strlen(trim($billingaddress)) == 0 && strlen(trim($cardtype)) == 0 && strlen(trim($cardnumber)) == 0 && strlen(trim($securitycode)) == 0 && strlen(trim($uptomonth)) == 0 && strlen(trim($uptoyear)) == 0) {
    $errormsg = "- * Asterisk fields are mandatory * 2-";
}
if (strlen(trim($firstname)) > 0 && strlen(trim($lastname)) > 0 && strlen(trim($gender)) > 0 && strlen(trim($dateofbirth)) > 0 && strlen(trim($emailaddress)) > 0 && strlen(trim($password)) > 0 && strlen(trim($passwordconfirm)) > 0 && strlen(trim($shippingaddress)) > 0 && strlen(trim($city)) > 0 && strlen(trim($state)) > 0 && strlen(trim($country)) > 0 && strlen(trim($zipcode)) > 0 &&  strlen(trim($billingaddress)) > 0 && strlen(trim($cardtype)) > 0 && strlen(trim($cardnumber)) > 0 && strlen(trim($securitycode)) > 0 && strlen(trim($uptomonth)) > 0 && strlen(trim($uptoyear)) > 0) {
    $sql1 = "select emailAddress from customers";
    $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
    if(!$con){ echo "no connection";
        die('Could not be able to connect to  mysql'); }

    mysql_select_db('hwdb', $con);
    $res1 = mysql_query($sql1);
    if ((mysql_num_rows($res1))!=0){
        while ($rows = mysql_fetch_assoc($res1)){
                $resultlist[] = $rows; }
        foreach ($resultlist as $rows) {
            if ($rows['emailAddress']==trim($emailaddress)) {
                $errormsg = "Specified Email Address was already registered. New Registration Unsuccessful";
                break;} 
            else{ $err = "no err";}
        }
    }
    if ($err == "no err" || mysql_num_rows($res1) == 0 ) {
        if(strlen(trim($contactnumber))!=0){
            $sql = "insert into customers values ('".trim($firstname)."', '".trim($lastname)."', '".trim($gender)."', '".trim($dateofbirth)."', '".trim($emailaddress)."', '".trim($password)."', '".trim($shippingaddress)."', '".trim($city)."', '".trim($state)."', '".trim($country)."', ".trim($zipcode).", '".trim($billingaddress)."', '".trim($cardtype)."', ".trim($cardnumber).", ".trim($securitycode).", ".trim($uptomonth).", ".trim($uptoyear).", ".trim($contactnumber).");";}
        else{
            $sql = "insert into customers values ('".trim($firstname)."', '".trim($lastname)."', '".trim($gender)."', '".trim($dateofbirth)."', '".trim($emailaddress)."', '".trim($password)."', '".trim($shippingaddress)."', '".trim($city)."', '".trim($state)."', '".trim($country)."', ".trim($zipcode).", '".trim($billingaddress)."', '".trim($cardtype)."', ".trim($cardnumber).", ".trim($securitycode).", ".trim($uptomonth).", ".trim($uptoyear).", null);";}        
        $con = mysql_connect(':/home/scf-25/xxx/mysql.sock','root','xxx');
        if(!$con){die('Could not be able to connect to  mysql');}
        mysql_select_db('hwdb', $con);
        $res = mysql_query($sql);
    }
}

if (strlen($errormsg) > 0) {
    require "customerregistration.php";
    echo '<div align="center" style="padding:6px"><label class="erradd">'.$errormsg.'</label></div></span></table></fieldset></div></form></body></html>';
}
elseif (!$res) {
    require "customerregistration.php";
    echo '</span></table></fieldset></div></form></body></html>';
}
elseif ($res){
    require "customerlogin.php";
    echo '<div align="center"><b>Registration Successful</b></div>';

}
?>
