<?php


function check_if_logged()
{
	$i = 0;
	if(!isset($_SESSION["logged"]))
	{
		//header("Location: login.php?go=".$_SERVER["REQUEST_URI"]."");
		$i++;
	}
	if($_SESSION["type"] != "31b5d7b1a473763500b9b0d66e1a63c2")
	{
		$i++;
	}
	
	if($i > 0)
	{
		header("Location: login.php?go=".$_SERVER["REQUEST_URI"]."");
	}
}





  function create_guid() {    
    static $guid = '';
    $namespace = "teste";
    $uid = uniqid("", true);
    $data = $namespace;
    $data .= $_SERVER['REQUEST_TIME'];
    $data .= $_SERVER['HTTP_USER_AGENT'];
    $data .= $_SERVER['LOCAL_ADDR'];
    $data .= $_SERVER['LOCAL_PORT'];
    $data .= $_SERVER['REMOTE_ADDR'];
    $data .= $_SERVER['REMOTE_PORT'];
    $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
    $guid = '' .  
            substr($hash,  0,  8) .
            '-' .
            substr($hash,  8,  4) .
            '-' .
            substr($hash, 12,  4) .
            '-' .
            substr($hash, 16,  4) .
            '-' .
            substr($hash, 20, 12) .
            '';
   return $guid;
  }
  
  
  /*
  // Old Certificate Generator function
  function genLicense($domain) {
	
	
	$license_key="----------BEGIN LICENSE DATA----------"
	.base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(AESEncrypt("$domain
	Last Request From Server: ".date("Y-m-d").""))))))."
	----------END LICENSE DATA----------";


	//$hashDomain = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(AESEncrypt(hash('sha512',$domain)))))));

	//$license_key = str_replace("=","",$hashDomain);	

	return $license_key;	

}*/

function genLicense($domain)
{
    static $guid = '';
    $namespace = $domain;
    $uid = uniqid("", true);
    $data = $namespace;
    $data .= $_SERVER['REQUEST_TIME'];
//    $data .= $_SERVER['HTTP_USER_AGENT'];
//    $data .= $_SERVER['LOCAL_ADDR'];
//    $data .= $_SERVER['LOCAL_PORT'];
    $data .= $_SERVER['REMOTE_ADDR'];
    $data .= $_SERVER['REMOTE_PORT'];
    $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
    $guid = '' .  
            substr($hash,  0,  8) .
            '-' .
            substr($hash,  8,  4) .
            '-' .
            substr($hash, 12,  3) .
            '-' .
            substr($hash, 15,  4) .
            '-' .
            substr($hash, 19, 12) .
            '';
   return $guid;
}

/* Backup function */
function backupDatabase($file){
   $tables = array();
   $result = mysql_query('SHOW TABLES');
     while($row = mysql_fetch_row($result)){ $tables[] = $row[0]; } 
     //cycle through
     $return = "";
     foreach($tables as $table){
     $result = mysql_query('SELECT * FROM '.$table);
     $num_fields = mysql_num_fields($result); 
     $return.= 'DROP TABLE '.$table.';';
     $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
     $return.= "\n\n".$row2[1].";\n\n"; 
     for ($i = 0; $i < $num_fields; $i++){
       while($row = mysql_fetch_row($result)){
       $return.= 'INSERT INTO '.$table.' VALUES(';
         for($j=0; $j<$num_fields; $j++){
         $row[$j] = addslashes($row[$j]);
         $row[$j] = ereg_replace("\n","\\n",$row[$j]);
         if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
           if ($j<($num_fields-1)) { $return.= ','; }
         }
       $return.= ");\n";
       }
     }
     $return.="\n\n\n";
     }
   //save file
   $handle = fopen($file,'w+');
   fwrite($handle,$return);
   fclose($handle);
}


/* Calculate days between dates function */
function calculate_days_between_dates($startDate, $endDate = null) {
	if(empty($endDate)) $endDate = date('Y-m-d');
	return abs(strtotime($endDate) - strtotime($startDate)) / (60*60*24);
}

function GenByMask($template)
{
    //$template   = 'UNREAL-X9XX-9999-XX9XS-XX99';
    $k = strlen($template);
    $sernum = '';
    for ($i=0; $i<$k; $i++)
    {
        switch($template[$i])
        {
            case 'X': $sernum .= chr(rand(65,90)); break;
            case '9': $sernum .= rand(0,9); break;
            case '-': $sernum .= '-';  break;
	    case '#': if(rand(1,2) == 1){
			$sernum .= chr(rand(65,90));
			}else{$sernum .= rand(0,9);} break;

	    default: $sernum.=$template[$i];break;
        }
    }
    return $sernum;
}
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, count($alphabet)-1);
        $pass[$i] = $alphabet[$n];
    }
    return $pass;
}



?>