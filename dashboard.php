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
    <div class="col-md-3">
     <div class="sm-st clearfix">
      <a href="Fornecedor/dashboard.php" >
       <span class="sm-st-icon st-red">
        <i class="fa fa-check-square-o"></i></span>
      </a>
        <div class="sm-st-info">
         <h4>Fornecedores</h4>
        </div>
     </div>
    </div>
    <div class="col-md-3">
     <div class="sm-st clearfix">
      <span class="sm-st-icon st-red">
       <i class="fa fa-check-square-o"></i></span>
        <div class="sm-st-info">
         <h4>Produtos</h4>
        </div>
     </div>
    </div>
    <div class="col-md-3">
     <div class="sm-st clearfix">
      <span class="sm-st-icon st-red">
       <i class="fa fa-check-square-o"></i></span>
        <div class="sm-st-info">
         <h4>Estoques</h4>
        </div>
     </div>
    </div>
    <div class="col-md-3">
     <div class="sm-st clearfix">
      <span class="sm-st-icon st-red">
       <i class="fa fa-check-square-o"></i></span>
        <div class="sm-st-info">
         <h4>Relatórios</h4>
        </div>
     </div>
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