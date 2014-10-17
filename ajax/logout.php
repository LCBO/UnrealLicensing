<?php
include "../system/globals.php";
session_start();
session_destroy();
echo ("<META HTTP-EQUIV='Refresh' CONTENT='0 ; URL=$patch/login.php'>");
?>