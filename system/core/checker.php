<?php 

/*
-------------------------------------------------------------------------
  Filename:            checker.php
  
  Description:        Return the License Data.

  Purpose:            Determine the License Status and Comments
  
  Copyright:        (c) UnrealLicensing v2.0.18
  
  Author:            Giovanne Oliveira - UnrealTeam
    
Changes:
  Date          Who     Description and CR ref
  --------      ----     -------------------------------------------------
  16/03/2014     UD      File created
  -----------------------------------------------------------------------
*/

# Include Configuration
include "../config.php";
include "../functions.php";


    # Select the settings table
    $SetSQL = mysql_query("SELECT * FROM settings") or die(mysql_error()); 
    $setting = mysql_fetch_array($SetSQL);

# Created variables based on parameters passed to the script.


$domain = $_POST['domain'];
$product = $_POST['product'];
//$licensekey = genLicense($domain);

# Validate and make sure enough parameters have been passed to script.
//if(!empty($domain) &&  !empty($product) && !empty($licensekey)) {
    //mail("jmv_922@yahoo.com","test","SELECT * FROM licenseinfo WHERE domain='$domain' AND product='$product' AND licensekey='$licensekey");//
    # Select the information from the db.
if(strpos($domain,"www.")===0)
{
$URL1 = $domain;
$URL2 = preg_replace("/www./","",$domain,1);
$LK1 = genLicense($URL1);
$LK2 = genLicense($URL2);
}
else
{
$URL1 = $domain;
$URL2 = "www.".$domain;
$LK1 = genLicense($URL1);
$LK2 = genLicense($URL2);
}

$q1 = mysql_query("SELECT trial_period FROM products WHERE product_fullname  = '$product'");
$ar1 = @mysql_fetch_array($q1);
if ($ar1['trial_period']>0)
{
$q2 = mysql_query("SELECT product FROM licenseinfo WHERE (domain='$URL1' OR domain='$URL2') AND product='$product'");
$count = @mysql_num_rows($q2);
if ($count<1)
{
$expiry_date = date('Y-m-d',strtotime(date("Y-m-d", strtotime(date('Y-m-d'))) . "+{$ar1['trial_period']} day"));
@mysql_query("INSERT INTO licenseinfo
(
usrid,
domain,
product,
licensekey,
status,
expiry_date,
comments,
notification_days,
customer_email
)
VALUES
(
0, 
'$URL1',
'$product',
'$LK1',
'ACTIVE',
'$expiry_date',
'Automatic Trial License',
'0',
''
)");
}
}


  // $SQL = mysql_query("SELECT * FROM licenseinfo WHERE (domain='$URL1' OR domain='$URL2') AND product='$product' AND (licensekey='$LK1' OR licensekey='$LK2')") or die(mysql_error()); 
  $SQL = mysql_query("SELECT * FROM licenseinfo WHERE (domain='$URL1' OR domain='$URL2') AND product='$product'") or die(mysql_error()); 
    $result = mysql_fetch_array($SQL);
    $valid  = 'Y';
    if($result['expiry_date']<>'0000-00-00')
    {
        if($result['expiry_date']<=date('Y-m-d'))
            $valid  = 'N';
        else 
            $valid = 'Y';


    }
    #Output the license state.
    if($result['status'] == "ACTIVE" and $valid  == "Y") {
        $return = 1;
    }
    else {
	   // $reason_comment = mysql_query("SELECT comments FROM licenseinfo WHERE (domain='$URL1' OR domain='$URL2')") or die(mysql_error()); 
        $return = 0;
    }
    echo $return;
    if ($domain<>"")
{
    /* if the setting is set to automatically setup invalid licenses. */
    if ($return == "License Invalid" && $setting['auto_setup'] == "TRUE") {
        mysql_query("INSERT INTO licenseinfo VALUES ('','1','".$domain."','".$product."','".genLicense($domain)."','ACTIVE','0000-00-00','This license was created automatically via the server response, The setting to create invalid licenses is enabled.','7','#N/A');");
    }
        
    # If the setting to log the license request is checked.
    if ($setting['log_license_requests'] == "TRUE") {
        mysql_query("INSERT INTO licenselog VALUES ('','$domain','{$result['licensekey']}','$product',NOW(),'$return')");
    }
}
//}
//else {
//    echo "There has not been enough parameters passed to return any results.";    
//}

?>