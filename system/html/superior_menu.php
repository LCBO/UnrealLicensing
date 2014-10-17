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
		    <li><?php if(isset($_SERVER['HTTPS'])) {
?><span class="label label-success">Secure Connection <span class="glyphicon glyphicon-lock"></span> </span><?php }else{?><span class="label label-danger">Conexão Insegura <span class="glyphicon glyphicon-unlock"></span> </span><?php }?></li>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Configurações</a></li>
            <li><a href="#">Minha Conta</a></li>
            <li><a href="ajax/logout.php">Sair</a></li>
          </ul>
        </div>
      </div>
    </div>