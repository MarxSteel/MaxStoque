<?php
require("../restritos.php"); 
require_once '../init.php';
$PDO = db_connect();
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $row = $query->fetch();
  $NomeUserLogado = $row['Nome'];
  $foto = $row['Foto'];
$dt = date("d/m/Y - H:i:s");
$ChamaFornecedor = "SELECT * FROM fornecedor";
$Forn = $PDO->prepare($ChamaFornecedor);
$Forn->execute();
?>



<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title><?php echo $Titulo; ?></title>
 <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 <meta name="description" content="Desenvolvido por Marquistei Medeiros">
 <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
 <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
 <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- Theme style -->
 <link href="../css/style.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
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
    <img src="../img/user/<?php echo $foto; ?>" class="img-circle" alt="NickName" />
  </div>
  <?php include_once '../MenuLateral.php'; ?>
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
           <a data-toggle="tab" href="#placas">Placas</a>
          </li>
          <li class="">
           <a data-toggle="tab" href="#eletro">Eletrônicos</a>
          </li>
          <li class="">
           <a data-toggle="tab" href="#mecanico">Mecânicas</a>
          </li>
          <li class="">
           <a data-toggle="tab" href="#estrutura">Estruturais</a>
          </li>
         </ul>
        </header>
        <div class="panel-body">
         <div class="tab-content">
          <div id="placas" class="tab-pane active">
            <table id="example" class="display" cellspacing="0" width="80%" style="font-size: 1em;">
             <thead>
              <tr>
               <th width='10px'>#</th>
               <th width='250px'>Lutador</th>
               <th width='250px'>Apelido</th>
              </tr>
             </thead>
             <tbody>
              <td>1</td>
              <td>aa</td>
              <td>2</td>
            </table>
          </div>
          <div id="eletro" class="tab-pane">
          Cadastro de Eletrônicos
          </div>
          <div id="mecanico" class="tab-pane">
          Cadastro de mecanico
          </div>
          <div id="estrutura" class="tab-pane">
          Cadastro de estruturais
          </div>  
          <div id="contact" class="tab-pane">Contact</div>
         </div>
        </div>
       </section>






      </div>
     </section>
    </div>
   </div>
  </section><!-- /.content -->
 <?php include_once '../footer.php'; ?>
 </aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<script language="JavaScript">
function abrir(URL) { 
  var width = 1100;
  var height = 650;
  var left = 99;
  var top = 99;
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/Director/app.js" type="text/javascript"></script>
<script src="../js/Director/dashboard.js" type="text/javascript"></script>
</script>

 <script type="text/javascript" language="javascript" src="../plugins/js/jquery.js"></script>
 <script type="text/javascript" language="javascript" src="../plugins/js/jquery.dataTables.js"></script>
 <script type="text/javascript" language="javascript" class="init">    
    $(document).ready(function() {
        $('#example1').dataTable();
       $('#example').dataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
    } );
    </script>


</body>
</html>