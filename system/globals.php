<?php
include "config.php";
include "gauntlet.php";
include_once "functions.php";
include_once "aes.class.php";
$product_name = "Unreal Licensing";
$version = "v2.2.7";
if(!isset($patch))
{
	header("Location: install/");
}

if(isset($_SERVER['HTTPS']))
{
	$https = true;
}else{
	$https = false;
}

function sanitize_output($buffer) {

    $search = array(
        '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
    );

    $replace = array(
        '>',
        '<',
        '\\1'
    );

    $buffer = preg_replace($search, $replace, $buffer);
	$buffer2 = "<!--".base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(uniqid()))))))))))."-->";
	$buffer2 .= $buffer;

    return $buffer2;
}


//ob_start("sanitize_output");
?>