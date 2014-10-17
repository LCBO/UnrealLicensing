<?php
session_start();
$time = uniqid("", true);
include "system/globals.php";

check_if_logged();
error_reporting(E_ALL);
$actGetProducts = mysql_query("SELECT * FROM products");


if(isset($_GET["data"]))
{
	$decrypt = gauntlet_decryptaes($_GET["data"]);
	$explode = explode("|", $decrypt);
	$product_code = $explode[1];
	switch($explode[0])
	{
		case "delete":
			mysql_query("DELETE FROM products WHERE productid = ".$product_code."");
			header ("location: $patch/products.php");
		break;
		
		case "enablepaypal":
			mysql_query("UPDATE products SET product_paypal = '1' WHERE productid = ".$product_code."");
			header ("location: $patch/products.php");
		break;
		
		case "disablepaypal":
			mysql_query("UPDATE products SET product_paypal = '0' WHERE productid = ".$product_code."");
			header ("location: $patch/products.php");
		break;
		
		case "enablesandbox":
			mysql_query("UPDATE products SET sandbox = '1' WHERE productid = ".$product_code."");
			header ("location: $patch/products.php");
		break;
		case "disablesandbox":
			$qry = "UPDATE products SET sandbox = '0' WHERE productid = ".$product_code."";
			mysql_query($qry) or die(mysql_error());
			header ("location: $patch/products.php");
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
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">

    <title><?php echo $product_name;?> Products</title>

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
          <h1 class="page-header">Products</h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Price</th>
				  <th>Currency</th>
                  <th>Paypal?</th>
                  <th>Sandbox?</th>
				  <th>Trial Period</th>
				  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
			  
			  <?php 
				while($row = mysql_fetch_array($actGetProducts))
			  {?>
                <tr>
                  <td><?php echo $row["productid"];?></td>
                  <td><?php echo $row["product_fullname"];?></td>
                  <td><?php echo $row["product_price"];?></td>
				  <td><?php echo $row["product_currency"];?></td>
                  <td>
				  <?php 
				  
				  if($row["product_paypal"] == "1")
				  {
				  ?><a href="products.php?data=<?php echo gauntlet_encryptaes("disablepaypal|".$row["productid"]."|$time");?>"><span class="label label-success">Yes</span></a><?php
				  }else{?>
				<a href="?data=<?php echo gauntlet_encryptaes("enablepaypal|".$row["productid"]."|$time");?>"><span class="label label-danger">No</span></a>
				   <?php
				   }
				?>
				  
				  </td>
                  
				  <td>				  <?php 
				  
				  if($row["sandbox"] == "1")
				  {
				  ?><a href="?data=<?php echo gauntlet_encryptaes("disablesandbox|".$row["productid"]."|$time");?>"><span class="label label-success">Yes</span></a><?php
				  }else{?>
				 <a href="?data=<?php echo gauntlet_encryptaes("enablesandbox|".$row["productid"]."|$time");?>"><span class="label label-danger">No</span></a>
				   <?php
				   }
				?></td>
				  <td><?php echo $row["trial_period"];?></td>
				  <td><a href="products.php?data=<?php echo gauntlet_encryptaes("delete|".$row["productid"]."|$time");?>"><span class="glyphicon glyphicon-remove"></span></a>    <a href="editproduct.php?command=System.Licensing.Products.EditProduct.Single(product)&params=<?php echo base64_encode(base64_encode(sha1(md5(rand()))));?>&data=<?php echo gauntlet_encryptaes($row["productid"]);?>"><span class="glyphicon glyphicon-edit"></span></a></td>
				  <?php }?>
                </tr>
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