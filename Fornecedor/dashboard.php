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
     <div class="panel">
      <header class="panel-heading">Cadastro de Forcenecedor</header>
      <div class="panel-body">
       <table id="Categoria" class="table table-bordered table-striped">
        <thead>
         <tr>
          <th style="width: 10px">#</th>
          <th>Fornecedor</th>
          <th style="width: 15px">Modalidade</th>
          <th style="width: 50px"></th>
         </tr>
        </thead>
        <tbody>
         <?php 
          while ($VFor = $Forn->fetch(PDO::FETCH_ASSOC)): 
           echo '<tr>';
            echo '<td>' . $VFor['f_id'] . '</td>';
            echo '<td>' . $VFor['f_Nome'] . '</td>';
            $TipoForn = $VFor['f_Tipo'];
            if ($TipoForn === "1") {
            echo '<td><span class="label label-info">NACIONAL</span></td>'; 
            }
            else{
            echo '<td><span class="label label-danger">INTERNACIONAL</span></td>'; 
            }
            ?>
            <td>
            <a class="btn btn-info btn-xs" href="javascript:abrir('CadFornecedor.php?ID=<?php echo $VFor['f_id']; ?>');">
             <i class="material-icons">search</i>
            </a>
            </td>
            <?php
           echo '</tr>';
           endwhile;
         ?>
        </tbody>
       </table>
      </div><!-- /.panel-body -->
     </div><!-- /.panel -->
    </div><!-- /.col -->
    <div class="col-md-3">
     <div class="sm-st clearfix">
      <a data-toggle="modal" data-target="#NovaCat">
       <span class="sm-st-icon st-green">
        <i class="material-icons">speaker_notes</i>
       </span>
      </a>
        <div class="sm-st-info">
         <h4>Cadastrar Fornecedor</h4>
        </div>
     </div>
    </div>
    <!-- INICIO DO MODAL DE TROCAR SENHA -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="NovaCat" class="modal fade">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
           <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><code>X</code></button>
           <h4 class="modal-title">Adicionar Fornecedor</h4>
          </div>
          <div class="modal-body">
           <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
            <div class="col-xs-7 form-group">Nome do Fornecedor
             <input class="form-control" type="text" name="nome" required="required">
            </div>
            <div class="col-xs-5 form-group">Data de Cadastro
             <input class="form-control" type="text" disabled="disabled" placeholder="<?php echo $dt; ?>">
            </div>
            <div class="col-xs-12">Observações
             <textarea name="obs" cols="45" rows="3" class="form-control" id="obs"></textarea><hr>
            </div>
            <input name="Tsenha" type="submit" class="btn btn-success btn-block" id="Tsenha" value="Cadastrar Novo Fornecedor"  />
          </form>
          <?php
           if(@$_POST["Tsenha"]){
            $nomeCat = $_POST["nome"];
            
            $Obs = str_replace("\r\n", "<br/>", strip_tags($_POST["obs"]));
            $AddCat = $PDO->query("INSERT INTO fornecedor (f_Nome, Obs, DataCadastro) VALUES ('$nomeCat', '$Obs', '$dt')");
            if($AddCat)
             {
              echo '
              <script type="text/JavaScript">alert("Fornecedor Cadastrado com Sucesso");
              location.href="dashboard.php"</script>';
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
   </div><!-- /.row -->
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
</body>
</html>