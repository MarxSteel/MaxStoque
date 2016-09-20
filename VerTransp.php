<?php

require("restritos.php"); 
require_once 'init.php';
$PDO = db_connect();
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $row = $query->fetch();
  $NomeUserLogado = $row['Nome'];
  $foto = $row['Foto'];
$dt = date("d/m/Y - H:i:s");
$ChamaTransp = "SELECT * FROM transporte";
$CadTransp = $PDO->prepare($ChamaTransp);
$CadTransp->execute();


$ValorTransp = $_GET['ID'];

 $Dados = $PDO->prepare("SELECT * FROM transporte WHERE id_transp='$ValorTransp'");
  $Dados->execute();
  $campo = $Dados->fetch();
  $NomeTransporte = $campo['Nome'];
  $TipoTransporte = $campo['Tipo'];
  $Modalidade = $campo['Categoria'];
  $Endereco = $campo['End'];
  $Numero = $campo['Num'];
  $Bairro = $campo['Bairro'];
  $Cidade = $campo['Cidade'];
  $UF = $campo['UF'];
  $CEP = $campo['CEP'];


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
 <section class="panel">
  <header class="panel-heading">CADASTRO DE TRANSPORTADORA</header>
  <div class="panel-body">
   <div class="row">
    <div class="col-md-12 form-group">
     <h2><strong><?php echo $NomeTransporte; ?></strong></h2>
    </div>
    <div class="col-md-3 form-group">Tipo de Transporte:
    <?php 
     if ($TipoTransporte === '1') {
      echo '<strong>Aéreo</strong>';
     }
     elseif ($TipoTransporte === '2') {
      echo '<strong>Marítimo</strong>';
     }
     elseif ($TipoTransporte === '3') {
      echo '<strong>Terrestre</strong>';
     }
     else{
    }
    ?>
    </div>
    <div class="col-md-3 form-group">Modalidade de Frete:
     <?php 
      if ($Modalidade === '1') {
       echo '<strong>Nacional</strong>';
      }
      elseif ($TipoTransporte === '2') {
        echo '<strong>Importação</strong>';
      }
      else{
      }
     ?>
    </div>
   <div class="col-sm-12">
   <h3>Informações de Endereço</h3>
   </div>
   <div class="col-sm-3">Endereço: <br />
   <strong><?php echo $Endereco . ' Nr.: ' . $Numero; ?></strong>
   </div>
   <div class="col-sm-3">Bairro: <br />
   <strong><?php echo $Bairro; ?></strong>
   </div>
   <div class="col-sm-3">CEP: <br />
   <strong><?php echo $CEP; ?></strong>
   </div>
   <div class="col-sm-3">Cidade: <br />
   <strong><?php echo $Cidade . ' - ' . $UF; ?></strong>
   </div>
  </div>
 </div>
 </section>
  <section class="content">
   <div class="row">
    <div class="col-md-12">
     <div class="panel">
      <header class="panel-heading">Detalhes de Transportadora</header>
      SASAS
     </div><!-- /.panel -->
    </div><!-- /.col -->
    <div class="col-md-3">
     <div class="sm-st clearfix">
      <a data-toggle="modal" data-target="#NovaTransp">
       <span class="sm-st-icon st-red">
        <i class="material-icons">speaker_notes</i>
       </span>
      </a>
        <div class="sm-st-info">
         <h4>Cadastrar Transportador</h4>
        </div>
     </div>
    </div>
    <!-- INICIO DO MODAL DE TROCAR SENHA -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="NovaTransp" class="modal fade">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
           <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><code>X</code></button>
           <h4 class="modal-title">Adicionar Transportadora</h4>
          </div>
          <div class="modal-body">
           <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
            <div class="col-xs-7 form-group">Nome da Transportadora
             <input class="form-control" type="text" name="nome" required="required">
            </div>
            <div class="col-xs-5 form-group">Data de Cadastro
             <input class="form-control" type="text" disabled="disabled" placeholder="<?php echo $dt; ?>">
            </div>
            <div class="col-xs-5 form-group">Tipo de Transporte
             <select class="form-control" name="Tiptran" required="required">
              <option value="" selected="selected">SELECIONE</option>
              <option value="1">Aéreo</option>
              <option value="2">Marítimo</option>
              <option value="3">Terrestre</option>
             </select>
            </div>
            <div class="col-xs-4 form-group">Perfil de Transporte
             <select class="form-control" name="perftran" required="required">
              <option value="" selected="selected">SELECIONE</option>
              <option value="1">Nacional</option>
              <option value="2">Internacional</option>
             </select>
            </div>
            <div class="col-xs-12">Observações
             <textarea name="obs" cols="45" rows="3" class="form-control" id="obs"></textarea><hr>
            </div>
            <input name="Tsenha" type="submit" class="btn btn-success btn-block" id="Tsenha" value="ADICIONAR TRANSPOTADORA"  />
          </form>
          <?php
           if(@$_POST["Tsenha"]){
            $NomeT = $_POST["nome"];
            $TipoTran = $_POST["Tiptran"];
            $PerfTran = $_POST["perftran"];
            $Obs = str_replace("\r\n", "<br/>", strip_tags($_POST["obs"]));
            $AddCat = $PDO->query("INSERT INTO transporte (Nome, Tipo, Categoria, Status, Obs) VALUES ('$NomeT', '$TipoTran', '$PerfTran', '1', '$Obs'");
            if($AddCat)
             {
              echo '
              <script type="text/JavaScript">alert("Cadastrado com Sucesso");
              location.href="Transporte.php"</script>';
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
 <?php include_once 'footer.php'; ?>
 </aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<script language="JavaScript">
function abrir(URL) { 
  var width = 800;
  var height = 650;
  var left = 99;
  var top = 99;
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/Director/app.js" type="text/javascript"></script>
<script src="js/Director/dashboard.js" type="text/javascript"></script>
</script>
</body>
</html>