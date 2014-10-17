<?php
include "../system/ByteScrambler.php";	

if(isset($_POST['txtscript'])){

	// Declarations
	//$comment = htmlspecialchars($_POST['txtcomment']);
	$comment = htmlspecialchars("Encryption Provided by Unreal PHP Obfuscator BETA");
	$script = stripslashes($_POST['txtscript']);
	$Encoder = new ByteScrambler();
	$Encoder->SetCode($script);
	// Place comment
	if(!empty($script)){
		$Encoder->SetComment($comment);
	}
	// Encode script
	$encoded = $Encoder->GetEncodedCode();
	
	echo $encoded;
}else{
	echo "Falta parametro";
}

?>