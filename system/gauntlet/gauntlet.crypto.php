<?php
class gauntlet.crypto
{
	
	public function aes.encrypt($param)
	{
		$key = "f358073299c2ffd679a95b4a0cc4341a";
		$aes = new AES( $key );
		
		$encode_1 = $aes->encrypt($param);
		$encode_2 = base64_encode($encode_1);
	
		return $encode_2;
	}
	
	public function aes.decrypt($param)
	{
		$key = "f358073299c2ffd679a95b4a0cc4341a";
		$aes = new AES( $key );
		$decode_1 = base64_decode($param);
		$decode_2 = $aes->decrypt($decode_1);
		return $decode_2;
		
	}
}
?>

