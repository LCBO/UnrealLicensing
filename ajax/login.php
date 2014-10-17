<?php 
include "../system/globals.php";
  
if (isset($_POST["username"]))
{
    $login = gauntlet_exec($_POST["username"]);
    $password = md5(gauntlet_exec($_POST["password"]));
    $qryGetUserData = "SELECT * FROM users WHERE username = '$login' AND password = '$password'";
	$actGetUserData = mysql_query($qryGetUserData);
	$UserData = mysql_fetch_array($actGetUserData);
	$CountUserDataRows = mysql_num_rows($actGetUserData);
    if($CountUserDataRows==1){
        echo "Login_Sucessfull";
		session_start();
        $_SESSION["username"] = $username;
        $_SESSION["logged"] = "true";
        $_SESSION["email"] = $UserData["email"];
		$_SESSION["last_login"] = $UserData["last_login"];
		$_SESSION["guid"] = create_guid();
		$_SESSION["role"] = $UserData["role"];
		$_SESSION["type"] = "31b5d7b1a473763500b9b0d66e1a63c2";
    }else{
        echo "Login Fail";
    }
  
      
      
}   
      
  
?>