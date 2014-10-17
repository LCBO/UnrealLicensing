<?php 
include "../globals.php";
$APIKey = '1UE8gRBmFCm6FnCW';

if(!isset($_REQUEST['token']))
{
	die('Missing Token Parameter');
}
if(!isset($_REQUEST['mdl']))
{
	die('Missing Execution Module Parameter');
}

if(isset($_REQUEST['token']))
{
	if($_REQUEST['token'] <> $APIKey)
	{
		die('Invalid Token');
	}
}

$command = $_REQUEST['mdl'];

switch($command)
{
	case 'suspend':
		$domain = $_REQUEST['domain'];
		if(isset($_REQUEST['reason']))
		{
			$reason = $_REQUEST['reason'];
		}
		Suspend($domain, $reason);
	break;
	
	case 'unsuspend':
		$domain = $_REQUEST['domain'];
		UnSuspend($domain);
	break;
	
	case 'check_suspension_reason':
		$domain = $_REQUEST['domain'];
		CheckSuspensionReason($domain);
	break;
	
	case 'getemailbydomain':
		$domain = $_REQUEST['domain'];
		GetEmailByDomain($domain);
	break;
	
	case 'getdomainbyemail':
		$email = $_REQUEST['email'];
		GetDomainByEmail($email);
	break;
	
	case 'activatelicense':
		$email = $_REQUEST['email'];
		UnSuspend($domain);
	break;
	
	case 'getlicensekeybydomain':
		$domain = $_REQUEST['domain'];
		GetLicenseKeyByDomain($domain);
	break;
}
	

function Suspend($domain, $reason)
{
	mysql_query("UPDATE licenseinfo SET status = 'DISABLED' WHERE domain = '".$domain."'") or die(mysql_error());
	mysql_query("UPDATE licenseinfo SET comments = '$reason' WHERE domain = '".$domain."'")or die(mysql_error());
	echo "Command Sucessfull Executed";
}

function UnSuspend($domain)
{
	mysql_query("UPDATE licenseinfo SET status = 'ENABLED' WHERE domain = '".$domain."'") or die(mysql_error());
	mysql_query("UPDATE licenseinfo SET comments = '' WHERE domain = '".$domain."'")or die(mysql_error());
	echo "Command Sucessfull Executed";
}

function CheckSuspensionReason($domain)
{
	$query = mysql_query("SELECT comments FROM licenseinfo WHERE domain = '$domain'");
	if(mysql_num_rows($query) >= 1)
	{
		$data = mysql_fetch_array($query);
		echo $data['comments'];
	}else{
		echo 'Search return zero results';
	}
}

function GetEmailByDomain($domain)
{
	$query = mysql_query("SELECT customer_email FROM licenseinfo WHERE domain = '$domain'");
	if(mysql_num_rows($query) >= 1)
	{
		$data = mysql_fetch_array($query);
		echo $data['customer_email'];
	}else{
	 echo 'Search return zero results';
	}
}

function GetDomainByEmail($email)
{
	$query = mysql_query("SELECT domain FROM licenseinfo WHERE customer_email = '$email'");
	if(mysql_num_rows($query) >= 1)
	{
		$data = mysql_fetch_array($query);
		echo $data['domain'];
	}else{
		echo 'Search return zero results';
	}
}
function GetLicenseKeyByDomain($domain)
{
	$query = mysql_query("SELECT licensekey FROM licenseinfo WHERE domain = '$domain'");
	if(mysql_num_rows($query) >= 1)
	{
		$data = mysql_fetch_array($query);
		echo $data['licensekey'];
	}else{
		echo 'Search return zero results';
	}
}


?>
                            