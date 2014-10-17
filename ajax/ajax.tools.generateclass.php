<?php
include "../system/globals.php";
include "../system/ByteScrambler.php";	
if(isset($_POST['product'])){

$product = $_POST['product'];
	$class_content = "<?php 
\$domain=\$_SERVER['SERVER_NAME'];
\$product=\"$product\";
\$licenseServer = \"$patch/system/core/checker.php\";
    
\$postvalue=\"domain=\$domain&product=\".urlencode(\$product);

\$ch = curl_init();
curl_setopt(\$ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt(\$ch, CURLOPT_URL, \$licenseServer);
curl_setopt(\$ch, CURLOPT_POST, true);
curl_setopt(\$ch, CURLOPT_POSTFIELDS, \$postvalue);
\$result=curl_exec(\$ch);
curl_close(\$ch);  
\$result2 = explode(\"|\", \$result);

if(\$result != 1) {


die( '<div align=\"center\">

<table width=\"100%\" border=\"0\" style=\"padding:15px; border-color:#F00; border-style:solid; background-color:#FF6C70; font-family:Tahoma, Geneva, sans-serif; font-size:22px; color:white;\">

<tr>

<td><b>You don\'t have permission to use '.\$product.'.<br>Contact the Script Developer</b></td>

</tr>

</table>

</div>');

}

	
?>";

	$comment = "
	* UnrealDev Systems - UnrealLicense Check Class v2.1.14
	*
	* PHP version > 5
	*
	* LICENSE: This source file is subject to version 3.01 of the PHP license
	* that is available through the world-wide-web at the following URI:
	* http://www.php.net/license/3_01.txt.  If you did not receive a copy of
	* the PHP License and are unable to obtain it through the web, please
	* send a note to license@php.net so we can mail you a copy immediately.
	*
	* @category   Essential Add-on Pack
	* @package    UnrealLicensing v2
	* @author     Giovanne Oliveira <jhollsantos@gmail.com>
	* @copyright  2009 - 2014 UnrealDev Team
	* @license    http://www.php.net/license/3_01.txt  PHP License 3.01
	* @version    v2.1.14
	* @link       http://unrealdev.com.br/software/licensing
	* @since      File available since Release 1.0.0
	* @deprecated File will be deprecated in version 4.0
	";
	$Encoder = new ByteScrambler();
	$Encoder->SetCode($class_content);
	if(!empty($class_content)){
		$Encoder->SetComment($comment);
	}
	$encoded = $Encoder->GetEncodedCode();
	echo $encoded;
}else{
	echo "Falta parametro";
}

?>