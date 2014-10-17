<?php
include "aes.class.php";

$key = AES::keygen( AES::KEYGEN_256_BITS, "giovannedeoliveirasantos" );

echo $key;

?>