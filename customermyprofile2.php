<?php
    session_start();
    require "validatecustomer.php";
    require "home1.php";
    echo '
                <div id="customerrelogininfo" align="center">
                    <p>For Account Security concerns, your need to enter password to edit profile</p>
                    <form method="POST" action="customerprofileedit.php" onsubmit="return fillpassword()">
                        <fieldset id="fieldsetautowidth">  
                            <table>
                                <tr><td>Password :</td>
                                    <td><input type="password" name="custloginpassword" id="custloginpassword"/>
                                        <input type="submit" value="Submit" style="color:maroon"/>
                                    </td></tr>
                            </table>                                     
                        </fieldset>                    
                    </form>
                    <p><input type="button" name="canceleditmyprofile" id="canceleditmyprofile" value="Cancel Edit" style="color:maroon"/></p>
                    <p id="error"></p>
                </div>
                </body>
        </html>
    '; 
?>