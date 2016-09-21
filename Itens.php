<?php

require("restritos.php"); 
require_once 'init.php';
$PDO = db_connect();
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $row = $query->fetch();
  $NomeUserLogado = $row['Nome'];
  $foto = $row['Foto'];

?>



<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title><?php echo $Titulo; ?></title>
 <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 <meta name="description" content="Desenvolvido por Marquistei Medeiros">
 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
 <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
 <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
 <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
 <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- Theme style -->
 <link href="css/style.css" rel="stylesheet" type="text/css" />
 </head>
<body class="skin-black">
<?php
include_once 'header.php';
?>
<div class="wrapper row-offcanvas row-offcanvas-left">
 <aside class="left-side sidebar-offcanvas">
 <section class="sidebar">
 <div class="user-panel">
  <div class="pull-left image">
    <img src="img/user/<?php echo $foto; ?>" class="img-circle" alt="NickName" />
  </div>
  <?php include_once 'MenuLateral.php'; ?>
 </aside>
 <aside class="right-side">
  <section class="content">
   <div class="row">
    <div class="col-md-12">
     <section class="panel">
      <header class="panel-heading">
       Cadastro de itens Produção
      </header>
      <div class="panel-body">
       <section class="panel general">
        <header class="panel-heading tab-bg-dark-navy-blue">
         <ul class="nav nav-tabs">
          <li class="active">
           <a data-toggle="tab" href="#home">Placas</a>
          </li>
          <li class="">
           <a data-toggle="tab" href="#about">Eletrônicos</a>
          </li>
          <li class="">
           <a data-toggle="tab" href="#profile">Mecânicas</a>
          </li>
          <li class="">
           <a data-toggle="tab" href="#contact">Estruturais</a>
          </li>
         </ul>
        </header>
        <div class="panel-body">
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active">
                                        Home
                                    </div>
                                    <div id="about" class="tab-pane">About</div>
                                    <div id="profile" class="tab-pane">Profile</div>
                                    <div id="contact" class="tab-pane">Contact</div>
                                </div>
                            </div>
                        </section>






      </div>
     </section>
    </div>
   </div>
  </section><!-- /.content -->
 <?php include_once 'footer.php'; ?>
 </aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/Director/app.js" type="text/javascript"></script>
<script src="js/Director/dashboard.js" type="text/javascript"></script>
</script>
</body>
</html>