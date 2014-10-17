<?php
include "../system/globals.php";	
if(isset($_GET["domain"]))
{
	$id = gauntlet_exec($_GET["id"]);
	$domain = gauntlet_exec($_GET["domain"]);
	$licensekey = create_guid();
	$expiry_date = gauntlet_exec($_GET["expiry_date"]);
	$customer_email = gauntlet_exec($_GET["customer_email"]);
	$product = gauntlet_exec($_GET["product"]);
	$details = gauntlet_exec($_GET["details"]);
	
	$qryUpdateLicense = "INSERT INTO `licenseinfo` (`usrid`, `domain`, `product`, `licensekey`, `status`, `expiry_date`, `comments`, `notification_days`, `customer_email`) VALUES ('1', '$domain', '$product', '$licensekey', 'DISABLED', '$expiry_date', '$details', '0', '$customer_email');
";
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