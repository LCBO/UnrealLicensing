<?php
include "../system/globals.php";	
if(isset($_GET["product_fullname"]))
{
	$product_fullname = gauntlet_exec($_GET["product_fullname"]);
	$product_price = gauntlet_exec($_GET["product_price"]);
	$recurring_frequency = gauntlet_exec($_GET["recurring_frequency"]);
	$paypalemail = gauntlet_exec($_GET["paypalemail"]);
	$trial_period = gauntlet_exec($_GET["trial_period"]);
	$productlink = gauntlet_exec($_GET["productlink"]);
	//$product_code = gauntlet_exec($_GET["product_code"]);
	
	$qryUpdateLicense = "INSERT INTO `products` (`product_fullname`, `product_price`, `product_code`, `recurring_frequency`, `product_currency`, `paypalemail`, `product_paypal`, `dateadded`, `sandbox`, `downloadlink`, `trial_period`) VALUES ('$product_fullname', '$product_price', '$product_code', '$recurring_frequency', 'BRL`', '$paypalemail', '1', '2014-03-06', '0', '$downloadlink', '$trial_period');";
	$actUpdateLicense = mysql_query($qryUpdateLicense) or die(mysql_error());
	
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