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
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">

    <title><?php echo $product_name;?> About</title>

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
          <h1 class="page-header">About/Credits</h1>
<div class="row">
  <div class="col-md-6 col-md-offset-2">
  
<table class="table table-condensed">
     <!-- <thead>
        <tr>
          <th>Descrição</th>
          <th>Status</th>
        </tr>
      </thead>-->
      <tbody>
	    <tr>
          <td><b>Version:</b></td>
          <td><?php echo $version;?></td>
        </tr>
        <tr>
          <td><b>Main Developer:</b></td>
          <td>Giovanne Oliveira</td>
        </tr>
		<tr>
          <td><b>Dev. Team</b></td>
          <td>UnrealDev Team</td>
        </tr>
		<tr>
          <td><b>Contact the Developer</b></td>
          <td>jhollsantos@gmail.com</td>
        </tr>
		<tr>
        <td><b>Support:</b></td>
          <td><a href="http://unreal-security.com/support/">http://unreal-security.com/support</a></td>
        </tr>
		<td><b>Last Revision:</b></td>
          <td> 17/10/2014</td>
        </tr>
		<td><b>Distributed under</b></td>
          <td>GNU License - <a href="https://github.com/JhollsOliver/UnrealLicensing/">Official Github Repository</a></td>
        </tr>
      </tbody>
    </table>
  
  
  </div>
</div>

		
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