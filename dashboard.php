<!DOCTYPE html>
<html>
<?php
include 'valores.php'; //ADICIONANDO AS STRINGS ANTES DE MIGRAR PARA O PHP
include_once 'head.php';
?>
<body class="skin-black">
<?php
include_once 'header.php';
?>
<div class="wrapper row-offcanvas row-offcanvas-left">
 <aside class="left-side sidebar-offcanvas">
  <?php include_once 'MenuLateral.php'; ?>
 </aside>
 <aside class="right-side">
  <section class="content">
   <div class="row">
    <div class="col-md-3">
     <div class="sm-st clearfix">
      <span class="sm-st-icon st-red">
       <i class="fa fa-check-square-o"></i></span>
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