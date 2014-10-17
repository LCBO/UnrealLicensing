<?php 
$file = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $file);
$filename = $break[count($break) - 1];
?>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $product_name;?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
				<li <?php if($filename == "index.php"){echo "class=\"active\"";}?>><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
				<li <?php if($filename == "myaccount.php"){echo "class=\"active\"";}?>><a href="myaccount.php"><i class="fa fa-cog"></i><span>My Account</span></a></li>
				<li><a href="ajax/logout.php"><i class="fa fa-sign-out"></i><span>Logoff</span></a></li>
          </ul>
        </div>
      </div>
    </div>
	
