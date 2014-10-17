?><?php


# Include Configuration
include "../config.php";
include "../functions.php";

$setSQL = mysql_query("SELECT * FROM settings");
$setting = mysql_fetch_array($setSQL);

	# Select the information from the db.
	$SQL = mysql_query("SELECT * FROM licenseinfo") or die(mysql_error()); 
	
	#Set todays date.
	$todays_date = date("Y-m-d");

	#Set the licenses to expired that are expiring today.
	mysql_query("UPDATE licenseinfo SET status = 'EXPIRED' where expiry_date ='$todays_date'");	

while($result = mysql_fetch_array($SQL)){
	#Get license key expiry date.
	$expiry_date = $result['expiry_date'];
	#Calculate days to return the difference so we can send a notification.
	$days = calculate_days_between_dates($todays_date,$expiry_date);
	
	
	#Send an email to customers whose license keys are due for expiring if the setting is enabled.
	if ($setting['enable_notifactions'] == "TRUE") {
		
		if(($result['notification_days']!= "0000-00-00") && ($result['notification_days'] <= $days) && ($result['status'] = "ACTIVE")) {
			mail("{$result['customer_email']}","{$result['product']} license expiration.","Your license key for {$result['product']}, installed on {$result['domain']} will expire in $days days","From: {$setting['email_from']}");
		}
		
		# if settings is set to log email insert email log.
		if ($setting['log_email'] == "TRUE") {
			mysql_query("INSERT into emailLog values ('','{$result['customer_email']}','{$result['product']} license expiration.','Your license key for {$result['product']} will expire in $days days','".date("Y-m-d")."')")or die(mysql_error());
		}
	}
}
echo "Procedure Complete";

/* Update the cron job column so we can see a record of the last run. */
mysql_query("UPDATE settings SET cron_job_runtime = NOW();");

?>