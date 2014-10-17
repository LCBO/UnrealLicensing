<?php
session_start();
include "system/globals.php";
$time = uniqid("", true);
check_if_logged();
error_reporting(E_ALL);
$actGetLicenses = mysql_query("SELECT * FROM licenseinfo");


if(isset($_GET["data"]))
{
	$decrypt = gauntlet_decryptaes($_GET["data"]);
	$explode = explode("|", $decrypt);
	switch($explode[0])
	{
		case "suspend":
			$licenseid = $explode[1];
			mysql_query("UPDATE licenseinfo SET status = 'DISABLED' WHERE id = ".$licenseid."");
			header ("location: $patch/licenses.php");
		break;
		case "unsuspend":
			$licenseid = $explode[1];
			mysql_query("UPDATE licenseinfo SET status = 'ACTIVE' WHERE id = ".$licenseid."");
			header ("location: $patch/licenses.php");
			break;
		case "delete":
			$licenseid = $explode[1];
			mysql_query("DELETE FROM licenseinfo WHERE id = ".$licenseid."");
			mysql_query("DELETE FROM licenselog WHERE id = ".$licenseid."");
			header ("location: $patch/licenses.php");
		break;
	}
	
	
}

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

    <title><?php echo $product_name;?> Licenses</title>

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
          <h1 class="page-header">Licenses</h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>License ID</th>
                  <th>Product</th>
                  <th>Domain</th>
				  <th>Status</th>
                  <th>Expiration Date</th>
                  <th>Details</th>
				  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
			  
			  <?php 
				while($row = mysql_fetch_array($actGetLicenses))
			  {?>
                <tr>
                  <td><div data-toggle="tooltip" data-placement="top" title="Click to Edit"><?php echo $row["id"];?></div></td>
                  <td><?php echo $row["product"];?></td>
                  <td><?php echo $row["domain"];?></td>
                  <td>
				  <?php 
				  
				  if($row["status"] == "ACTIVE")
				  {
				  ?><a href="licenses.php?data=<?php echo gauntlet_encryptaes("suspend|".$row["id"]."|$time");?>"><span class="label label-success">ACTIVE</span></a><?php
				  }else if($row["status"] == "DISABLED"){?>
				  <a href="licenses.php?data=<?php echo gauntlet_encryptaes("unsuspend|".$row["id"]."|$time");?>"><span class="label label-danger">SUSPENDED</span></a>
				   <?php
				   }else if($row["status"] == "ALERT")
				   {?><span class="label label-warning">ALERT!!!</span><?php }
				?>
				  
				  </td>
                  <td><?php echo $row["expiry_date"];?></td>
				  <td><?php echo $row["comments"];?></td>
				  <td><a href="licenses.php?data=<?php echo gauntlet_encryptaes("delete|".$row["id"]."|$time");?>"><span class="glyphicon glyphicon-remove"></span></a>    <a href="editlicense.php?data=<?php echo gauntlet_encryptaes($row["id"]);?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                </tr>
				<?php }?>
              </tbody>
            </table>
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
</body></html>