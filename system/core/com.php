<?php 

/*
-------------------------------------------------------------------------
  Filename:            checker.php
  
  Description:        Return the License Data.

  Purpose:            Determine the License Status and Comments
  
  Copyright:        (c) UnrealLicensing v1.8.1
  
  Author:            Giovanne Oliveira - UnrealTeam
    
Changes:
  Date          Who     Description and CR ref
  --------      ---     -------------------------------------------------
  18/09/2013      JH      New Return System Added
  01/07/2013      JH      File created
  -----------------------------------------------------------------------
*/

# Include Configuration
include "../config.php";
include "../functions.php";


    # Select the settings table
    //$SetSQL = mysql_query("SELECT * FROM settings") or die(mysql_error()); 
    //$setting = mysql_fetch_array($SetSQL);

# Created variables based on parameters passed to the script.


$domain = $_POST['domain'];
$product = $_POST['product'];
$command = $_POST['command'];
//$licensekey = genLicense($domain);

/*
if($command = "suspend")
{
	mysql_query("UPDATE licenseinfo SET status = 'DISABLED' WHERE domain = '".$domain."'") or die(mysql_error());
	mysql_query("UPDATE licenseinfo SET comments = 'Desabilitada por Erro nos Arquivos' WHERE domain = '".$domain."'")or die(mysql_error());
	echo "Command Sucessfull Executed";
}*/

switch($command)
{
	case "suspend":
		mysql_query("UPDATE licenseinfo SET status = 'DISABLED' WHERE domain = '".$domain."'") or die(mysql_error());
		mysql_query("UPDATE licenseinfo SET comments = 'Desabilitada por Erro nos Arquivos' WHERE domain = '".$domain."'")or die(mysql_error());
		echo "Command Sucessfull Executed";
	break;
	
	case "checkreason":
	$SQL = mysql_query("SELECT comments FROM licenseinfo WHERE domain='$domain' AND product='$product'") or die(mysql_error()); 
	$result = mysql_fetch_array($SQL);
	
	echo $result["comments"];
	
	break;
}


?>