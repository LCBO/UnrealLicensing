<?php
include "../system/globals.php";	
if(isset($_GET["domain"]))
{
	$id = gauntlet_exec($_GET["id"]);
	$domain = gauntlet_exec($_GET["domain"]);
	$licensekey = gauntlet_exec($_GET["licensekey"]);
	$expiry_date = gauntlet_exec($_GET["expiry_date"]);
	$customer_email = gauntlet_exec($_GET["customer_email"]);
	$details = gauntlet_exec($_GET["details"]);
	
	$qryUpdateLicense = "UPDATE `licenseinfo` SET `domain`='".$domain."', `licensekey`='".$licensekey."', `expiry_date`='".$expiry_date."', `customer_email`='".$customer_email."', `comments`='".$details."' WHERE `id`='$id'";
	//echo $qryUpdateLicense;
	$actUpdateLicense = mysql_query($qryUpdateLicense);
	
	if($actUpdateLicense)
	{
		echo "Success";
	}
	else
	{
		echo "Fail";
	}
}
else
{
	echo "Falta os Parametros";
}


?>