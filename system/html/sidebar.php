<?php 
$file = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $file);
$filename = $break[count($break) - 1];
?> <div class="col-sm-3 col-md-2 sidebar">
		  <ul class="nav nav-sidebar">
		    <li <?php if($filename == "index.php"){echo "class=\"active\"";}?>><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span><i class="fa fa-angle-right"></i><span <?php if($filename == "index.php"){echo "class=\"selected\"";}?>></a></li>
			
			<li <?php if($filename == "licenses.php"){echo "class=\"active\"";}?>><a href="licenses.php"><i class="fa fa-key"></i><span>Licenses</span><i class="fa fa-angle-right"></i><span <?php if($filename == "licenses.php"){echo "class=\"selected\"";}?>></a></li>
			
			<li <?php if($filename == "newlicense.php"){echo "class=\"active\"";}?>><a href="newlicense.php"><i class="fa fa-plus"></i><span>New License</span><i class="fa fa-angle-right"></i><span <?php if($filename == "newlicense.php"){echo "class=\"selected\"";}?>></a></li>
			
			<li <?php if($filename == "generateclass.php"){echo "class=\"active\"";}?>><a href="generateclass.php"><i class="fa fa-shield"></i><span>Generate Protect Class</span><i class="fa fa-angle-right"></i><span <?php if($filename == "generateclass.php"){echo "class=\"selected\"";}?>></a></li>
			
			<li <?php if($filename == "obfuscate.php"){echo "class=\"active\"";}?>><a href="obfuscate.php"><i class="fa fa-unlock-alt"></i><span>Protect your Code</span><i class="fa fa-angle-right"></i><span <?php if($filename == "obfuscate.php"){echo "class=\"selected\"";}?>></a></li>
			
			<li <?php if($filename == "products.php"){echo "class=\"active\"";}?>><a href="products.php"><i class="fa fa-shopping-cart"></i><span>Products</span><i class="fa fa-angle-right"></i><span <?php if($filename == "products.php"){echo "class=\"selected\"";}?>></a></li>
			
			<li <?php if($filename == "newproduct.php"){echo "class=\"active\"";}?>><a href="newproduct.php"><i class="fa fa-plus"></i><span>New Product</span><i class="fa fa-angle-right"></i><span <?php if($filename == "newproduct.php"){echo "class=\"selected\"";}?>></a></li>
			
			<li <?php if($filename == "about.php"){echo "class=\"active\"";}?>><a href="about.php"><i class="fa fa-info-circle"></i><span>About/Credits</span><i class="fa fa-angle-right"></i><span <?php if($filename == "about.php"){echo "class=\"selected\"";}?>></a></li>
          </ul>
   </div>
		
		