<?php
session_start();
include "system/globals.php";

check_if_logged();


?>

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="UnrealLicensing PHP Licensing System">
    <meta name="author" content="Giovanne Oliveira">
    <link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">

    <title><?php echo $product_name;?> My Account</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/dashboard.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css" id="holderjs-style"></style></head>

  <body>


<?php include "system/html/top-navbar.php";?>

    <div class="container-fluid">
      <div class="row">
        <?php include "system/html/sidebar.php";?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">My Account</h1>
		  
		<form class="form-horizontal" id="frmEditLicense" role="form">
  <div class="form-group">
    <label for="txtUsername" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" disabled value="<?php echo $_SESSION["username"];?>" id="txtUsername" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <label for="txtEmail" class="col-sm-2 control-label">E-mail</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" value="<?php echo $_SESSION["email"];?>" id="txtEmail" placeholder="E-mail">
    </div>
  </div>
    <div class="form-group">
    <label for="uniqid" class="col-sm-2 control-label">Session ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" disabled value="<?php echo $_SESSION["guid"];?>" id="uniqid" placeholder="Session ID">
    </div>
  </div>
      <div class="form-group">
    <label for="role" class="col-sm-2 control-label">Role</label>
    <div class="col-sm-10">
      <?php switch($_SESSION["role"])
	  {
		case 1:?><span class="label label-success">Authorized User</span><?php break;
		case 2:?><span class="label label-warning">Pendent User</span><?php break;
		case 3:?><span class="label label-info">SegSIS</span><?php break;
		case 4:?><span class="label label-danger">SysAdmin</span><?php break;
		case 5:?><span class="label label-danger">ROOT!</span><?php break;
	  }?>
    </div>
  </div>
        <div class="form-group">
    <label for="ip" class="col-sm-2 control-label">IP</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" disabled id="ip" value="<?php echo $_SERVER['REMOTE_ADDR']?>" placeholder="IP">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="btnSave" class="btn btn-success">Edit</button>
    </div>
  </div>
</form>

		
        </div>
      </div>
    </div>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/docs.min.js"></script>
	<script src="ajax/ajax.database.savelicense.js"></script>
  

</body></html>