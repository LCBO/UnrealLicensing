<?php
include "../system/globals.php";	
if(isset($_GET["productid"]))
{
	$productid = gauntlet_exec($_GET["productid"]);
	$product_fullname = gauntlet_exec($_GET["product_fullname"]);
	$product_price = gauntlet_exec($_GET["product_price"]);
	$recurring_frequency = gauntlet_exec($_GET["recurring_frequency"]);
	$paypalemail = gauntlet_exec($_GET["paypalemail"]);
	$trial_period = gauntlet_exec($_GET["trial_period"]);
	
	
	
	
	$qryUpdateLicense = "UPDATE `products` SET `product_fullname`='$product_fullname', `product_price`='$product_price', `recurring_frequency`='$recurring_frequency', `paypalemail`='$paypalemail', `trial_period`='$trial_period' WHERE `productid`='$productid';";
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