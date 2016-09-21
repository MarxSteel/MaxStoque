<?php
require("../restritos.php"); 
require_once '../init.php';
$PDO = db_connect();
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $row = $query->fetch();
  $NomeUserLogado = $row['Nome'];
  $foto = $row['Foto'];
$dt = date("d/m/Y H:i");
$ChamaItens = "SELECT * FROM cad_geral";
$QyValor = $PDO->prepare($ChamaItens);
$QyValor->execute();



//CHAMANDO DADOS DE FORNECEDOR, PARA CADASTRO
$ChForn = "SELECT * FROM fornecedor";
  //Fornecedor 1
$Cf1 = $PDO->prepare($ChForn);
$Cf1->execute();
  //Fornecedor 2
$Cf2 = $PDO->prepare($ChForn);
$Cf2->execute();
  //Fornecedor 3
$Cf3 = $PDO->prepare($ChForn);
$Cf3->execute();

$ChCat = "SELECT * FROM categoria";
  //Fornecedor 1
$Cat = $PDO->prepare($ChCat);
$Cat->execute();
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
    <div class="col-md-9">
     <section class="panel">
      <header class="panel-heading">
       Cadastro Geral de Itens
      </header>
      <div class="panel-body table-responsive">
       <table id="example" class="table table-striped table-hover" cellspacing="0">
        <thead>
         <tr>
          <th width='10px'>#</th>
          <th>Item</th>
          <th>Observações</th>
          <th width='45px'></th>
          <th width='30px'></th>
         </tr>
        </thead>
        <tbody>
        <?php 
        while ($VFor = $QyValor->fetch(PDO::FETCH_ASSOC)): 
        echo '<tr>';
         echo '<td>' . $VFor['id'] . '</td>';
         echo '<td>' . $VFor['Nome'] . '</td>';
         echo '<td>' . $VFor['Nome'] . '</td>';
        ?>
           <td>
            <a class="btn btn-info" href="javascript:abrir('VisGer.php?ID=<?php echo $VFor['id']; ?>');">
             <i class="fa fa-search"></i> Visualizar  
            </a>
           </td>
           <td>
            <a class="btn bg-navy" href="javascript:abrir('Edg.php?ID=<?php echo $VFor['id']; ?>');">
             <i class="fa fa-pencil"></i> Editar  
            </a>
            </td>
            </tr>
            <?php 
             endwhile;
            ?>
        </table>
      </div>
     </section>
    </div>
    <div class="col-md-3">
     <div class="sm-st clearfix">
      <a data-toggle="modal" data-target="#AddItem">
       <span class="sm-st-icon bg-navy pull-right">
        <i class="fa fa-plus"></i>
       </span>
      </a>
        <div class="sm-st-info">
         <h4>Cadastrar</h4>
        </div>
     </div>
    </div>
<!-- INICIO DO MODAL DE TROCAR SENHA -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="AddItem" class="modal fade">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
           <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><code>X</code></button>
           <h4 class="modal-title">Cadastrar novo Item</h4>
          </div>
          <div class="modal-body">
           <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
            <div class="col-xs-8 form-group">Nome do Item
             <input class="form-control" type="text" name="nome" required="required">
            </div>
            <div class="col-xs-4 form-group">Cód.: Almoxarifado
             <input class="form-control" type="text" name="codalx" required="required">
            </div>
            <div class="col-xs-8">Categoria
             <select class="form-control" name="catt" required="required">
              <option value="" selected="selected">SELECIONE</option>
              <?php while ($VCat = $Cat->fetch(PDO::FETCH_ASSOC)): ?>
              <option value="<?php echo $VCat['Categoria'] ?>"><?php echo $VCat['Categoria'] ?></option>
              <?php endwhile; ?>
              <option value="XX">Nenhum</option>
             </select>
            </div>
            <div class="col-xs-4">Fornecedor Principal
             <select class="form-control" name="fornece1" required="required">
              <option value="" selected="selected">SELECIONE</option>
              <?php while ($VCf1 = $Cf1->fetch(PDO::FETCH_ASSOC)): ?>
              <option value="<?php echo $VCf1['f_Nome'] ?>"><?php echo $VCf1['f_Nome'] ?></option>
              <?php endwhile; ?>
              <option value="XX">Nenhum</option>
             </select>
            </div>
            <div class="col-xs-4">Fornecedor 2:
             <select class="form-control" name="fornece2" required="required">
              <option value="" selected="selected">SELECIONE</option>
              <?php while ($VCf2 = $Cf2->fetch(PDO::FETCH_ASSOC)): ?>
              <option value="<?php echo $VCf2['f_Nome'] ?>"><?php echo $VCf2['f_Nome'] ?></option>
              <?php endwhile; ?>
              <option value="XX">Nenhum</option>
             </select>
            </div>
            <div class="col-xs-4">Fornecedor 3:
             <select class="form-control" name="fornece3" required="required">
              <option value="" selected="selected">SELECIONE</option>
              <?php while ($VCf3 = $Cf3->fetch(PDO::FETCH_ASSOC)): ?>
              <option value="<?php echo $VCf3['f_Nome'] ?>"><?php echo $VCf3['f_Nome'] ?></option>
              <?php endwhile; ?>
              <option value="XX">Nenhum</option>
             </select>
            </div>
            <div class="col-xs-4 form-group">Data de Cadastro
             <input class="form-control" type="text" disabled="disabled" placeholder="<?php echo $dt; ?>">
            </div>
            <div class="col-xs-12">Descrição
             <textarea name="obs" cols="45" rows="3" class="form-control" id="obs"></textarea><hr>
            </div>
            <input name="Tsenha" type="submit" class="btn btn-success btn-block" id="Tsenha" value="Cadastrar Novo Fornecedor"  />
          </form>
          <?php
           if(@$_POST["Tsenha"]){
            $nomeCat = $_POST["nome"];
            $Codigo = $_POST["codalx"];
            $nCategoria = $_POST["catt"];
            $For1 = $_POST["fornece1"];
            $For2 = $_POST["fornece3"];
            $For3 = $_POST["fornece3"];

            $Obs = str_replace("\r\n", "<br/>", strip_tags($_POST["obs"]));
            //Adicionando o item ao Banco de Dados
            $AddCat = $PDO->query("INSERT INTO cad_geral (Nome, Obs, DataCadastro, cod_alm, categoria, for_1, for_2, for_3, UserCadastro) VALUES ('$nomeCat', '$Obs', '$dt', '$Codigo', '$nCategoria', '$For1', '$For2', '$For3', '$NomeUserLogado')");
            if($AddCat)
             {
              echo '
              <script type="text/JavaScript">alert("Cadastrado com Sucesso");
              location.href="Geral.php"</script>';
             }
             else{
             echo '<script type="text/javascript">alert("Não foi possível. Erro: 0x03");</script>';
             }
           }
          ?>
          </div>
        </div>
       </div>
      </div>
      <!-- FINAL DO MODAL DE TROCAR SENHA -->
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