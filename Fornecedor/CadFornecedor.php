<?php
require("../restritos.php"); 
require_once '../init.php';
$PDO = db_connect();
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $row = $query->fetch();
  $NomeUserLogado = $row['Nome'];
  
  $foto = $row['Foto'];
  

  $CForn = $_GET['ID'];
  $QryForn = $PDO->prepare("SELECT * FROM fornecedor WHERE f_id='$CForn'");
  $QryForn->execute();
  $ChForn = $QryForn->fetch();
  $Nome = $ChForn['f_Nome'];
  $Documento = $ChForn['f_CNPJ'];
  $Logo = $ChForn['logo'];
  $Tel = $ChForn['f_Fone'];
  $Fax = $ChForn['f_Fax'];
  $Cel = $ChForn['f_Celular'];
  $Ramal = $ChForn['f_Ramal'];
  $Email = $ChForn['f_Mail'];
  //dados de endereço
  $Endereco = $ChForn['f_End'];
  $Bairro = $ChForn['f_Bairro'];
  $Num = $ChForn['f_Num'];
  $CEP = $ChForn['f_CEP'];
  $UF = $ChForn['f_UF'];
  $Cidade = $ChForn['f_Cidade'];

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
 <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
 <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
 <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
 <link href="../css/style.css" rel="stylesheet" type="text/css" />
 </head>
<body class="skin-black">
 <header class="header">
  <a href="#" class="logo"><img src="../img/logo/logoWhite.png"/></a>
 <nav class="navbar navbar-static-top" role="navigation">
   <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
   <span class="sr-only">Minimizar Navegação</span>
   <span class="icon-bar"></span>
   <span class="icon-bar"></span>
   <span class="icon-bar"></span>
  </a>
  <div class="navbar-right">
   <ul class="nav navbar-nav">
    <li class="dropdown user user-menu">
     <a href="../dashboard.php" class="dropdown-toggle" data-toggle="dropdown">
      <i class="fa fa-user"></i>
       <span><?php echo $NomeUserLogado; ?><i class="caret"></i></span>
     </a>
     <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
      <li class="dropdown-header text-center">Conta</li>
       <li class="divider"></li>
       <li>
        <a href="#"><i class="fa fa-user fa-fw pull-right"></i>Perfil</a>
       </li>
       <li class="divider"></li>
       <li>
        <a href="#"><i class="fa fa-ban fa-fw pull-right"></i> Sair</a>
       </li>
     </ul>
    </li>
   </ul>
  </div>
 </nav>
</header>
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
  <section class="panel">
   <header class="panel-heading">
    Informações de fornecedor
   </header>
    <div class="panel-body">
     <div class="row">
      <div class="col-xs-3 form-group">
       <img src="img/<?php echo $Logo; ?>" height="200" width="200" />      
      </div>
      <div class="col-xs-5 form-group">
      <h4><?php echo $Nome; ?></h4>
      </div>
      <div class="col-xs-4 form-group">
      <strong>Documento:</strong><br />
      <?php echo $Documento; ?>
      </div>
      <div class="col-xs-3 form-group">
      <strong>Telefone: </strong>
      <?php echo $Tel; ?>
      </div>
      <div class="col-xs-3 form-group">
      <strong>Fax: </strong>
      <?php echo $Fax; ?>
      </div>
      <div class="col-xs-3 form-group">
      <strong>Celular: </strong>
      <?php echo $Cel; ?>
      </div>
      <div class="col-xs-3 form-group">
      <strong>Ramal: </strong>
      <?php echo $Ramal; ?>
      </div>
      <div class="col-xs-6 form-group">
      <strong>E-Mail: </strong>
      <?php echo $Email; ?>
      </div>
      <div class="col-xs-8 form-group">
      <strong>Informações de Endereço: </strong>
      </div>
      <div class="col-xs-5 form-group">
      <strong>Endereço:</strong><br />
      <?php echo $Endereco; ?>
      </div>
      <div class="col-xs-3 form-group">
      <strong>Num.:</strong><br />
      <?php echo $Num; ?>
      </div>
      <div class="col-md-3 form-group">
      <a href="#TrocaFoto" data-toggle="modal" class="btn btn-md btn-block btn-success">
      Trocar Logo
      </a>
      </div>
      <div class="col-xs-3 form-group">
      <strong>Bairro:</strong><br />
      <?php echo $Bairro; ?>
      </div>
      <div class="col-xs-2 form-group">
      <strong>CEP:</strong><br />
      <?php echo $CEP; ?>
      </div>
      <div class="col-xs-2 form-group">
      <strong>Cidade:</strong><br />
      <?php echo $Cidade; ?>
      </div>
            <div class="col-xs-2 form-group">
      <strong>UF:</strong><br />
      <?php echo $UF; ?>
      </div>

      <div class="col-md-3 form-group">
      <a href="#EditaForn" data-toggle="modal" class="btn btn-block btn-info">
      Editar Dados de Contato
      </a>
      </div>
      <div class="col-xs-12 form-group"></div>
      <div class="col-md-3 form-group">
      <a href="#EditaEnd" data-toggle="modal" class="btn btn-block btn-danger">
      Editar Dados de Endereço
      </a>
      </div>
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="TrocaFoto" class="modal fade">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><code>×</code></button>
          <h4 class="modal-title">Formulário de troca de Foto de Perfil</h4>
         </div>
          <div class="modal-body">
           <form action="#" method="POST" enctype="multipart/form-data">
            <div class="col-md-4 form-group">Foto Atual:
             <img src="img/<?php echo $Logo; ?>" width="100" />      
            </div>
            <div class="col-xs-8">
             <input type="file" name="fileUpload">
            </div>
            <div><br /><br /><br /><br />
             <input type="submit" class="btn btn-success" value="Trocar Foto">
              </div>
           </form>
           <?php
            if(isset($_FILES['fileUpload']))
            {
             $ext = strtolower(substr($_FILES['fileUpload']['name'],-4));
             $NomeFoto = md5($NomeUserLogado);
             $new_name = $NomeFoto . $ext; 
             $dir = 'img/'; //Diretório para uploads
             move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
             echo '<script type="text/javascript">alert("Foto atualizada no Sistema");</script>';
             $AtFoto = $PDO->query("UPDATE fornecedor SET logo='$new_name' WHERE f_id='$CForn'");
              if ($AtFoto) {
              echo '
              <script type="text/JavaScript">alert("Imagem vinculada");
              location.href="CadFornecedor.php?ID=' . $CForn . '"</script>';
              }
              else{
              echo '<script type="text/javascript">alert("Erro ao vincular imagem");</script>';
              }
            }
           ?>
            </div>
         </div>
       </div>
      </div> <!-- FIM DO MODAL DE FOTO -->
      <!-- INICIO DO MODAL DE EDITAR CADASTRO -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="EditaForn" class="modal fade">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
           <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><code>X</code></button>
           <h4 class="modal-title">Editando Cadastro</h4>
          </div>
          <div class="modal-body">
           <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
           <div class="col-xs-12 form-group">
            <h3><?php echo $Nome; ?></h3>
           </div>
           <div class="col-xs-4 form-group">Telefone
            <input class="form-control" type="text" name="fone" required="required">
           </div>
           <div class="col-xs-4 form-group">Telefone 2 (Fax)
            <input class="form-control" type="text" name="fax" required="required">
           </div>

           <div class="col-xs-4 form-group">Celular
            <input class="form-control" type="text" name="celular" required="required">
           </div>
           <div class="col-xs-8 form-group">E-Mail
            <input class="form-control" type="email" name="email" required="required">
           </div>
           <div class="col-xs-4 form-group">Ramal
            <input class="form-control" type="text" name="ramal" required="required">
           </div>
           <input name="enviar" type="submit" class="btn btn-success btn-block" id="enviar" value="Atualizar Dados"  />
          </form>
          <?php
           if(@$_POST["enviar"]){
            $nFone = $_POST["fone"];
            $nFax = $_POST["fax"];
            $nCel = $_POST["celular"];
            $NMail = $_POST["email"];
            $nRamal = $_POST["ramal"];
            //EXECUTANDO A QUERY
            $AtPerfil = $PDO->query("UPDATE fornecedor SET f_Fone='$nFone', f_Fax='$nFax', f_Celular='$nCel', f_Mail='$NMail', f_Ramal='$nRamal' WHERE f_id='$CForn'");
             if($AtPerfil)
             {
              echo '
              <script type="text/JavaScript">alert("Contato Atualizado com Sucesso");
              location.href="CadFornecedor.php?ID=' . $CForn . '"</script>';
              }
             else{
              echo '<script type="text/javascript">alert("Não foi possível. Erro: 0x01");</script>';
             }
           }
          ?>
          </div>
        </div>
       </div>
      </div>
      <!-- FINAL DO MODAL DE EDITAR CADASTRO -->
      <!-- INICIO DO MODAL DE EDITAR Endereço -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="EditaEnd" class="modal fade">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
           <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><code>X</code></button>
           <h4 class="modal-title">Editar Dados de Endereço</h4>
          </div>
          <div class="modal-body">
           <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
           <div class="col-xs-12 form-group">
            <h3><?php echo $Nome; ?></h3>
           </div>
           <div class="col-xs-7 form-group">Rua
            <input class="form-control" type="text" name="end" required="required">
           </div>
           <div class="col-xs-3 form-group">Num.:
            <input class="form-control" type="text" name="num" required="required">
           </div>
           <div class="col-xs-2 form-group">UF
            <input class="form-control" type="text" name="uf" required="required">
           </div> 
           <div class="col-xs-4 form-group">Bairro
            <input class="form-control" type="text" name="bairro" required="required">
           </div>
           <div class="col-xs-4 form-group">Cidade
            <input class="form-control" type="text" name="cidade" required="required">
           </div>
           <div class="col-xs-4 form-group">CEP
            <input class="form-control" type="text" name="cep" required="required">
           </div>
           <input name="AttEnd" type="submit" class="btn btn-success btn-block" id="AttEnd" value="Atualizar Dados"  />
          </form>
          <?php
           if(@$_POST["AttEnd"]){
            $nRua = $_POST["end"];
            $nNum = $_POST["num"];
            $nUF = $_POST["uf"];
            $nBairro = $_POST["bairro"];
            $nCidade = $_POST["cidade"];
            $nCEP = $_POST["cep"];
            //EXECUTANDO A QUERY
            $AtPerfil = $PDO->query("UPDATE fornecedor SET f_End='$nRua', f_Num='$nNum', f_Bairro='$nBairro', f_CEP='$nCEP', f_Cidade='$nCidade', f_UF='$nUF' WHERE f_id='$CForn'");
             if($AtPerfil)
             {
              echo '
              <script type="text/JavaScript">alert("Endereço Atualizado com Sucesso");
              location.href="CadFornecedor.php?ID=' . $CForn . '"</script>';
              }
             else{
              echo '<script type="text/javascript">alert("Não foi possível. Erro: 0x01");</script>';
             }
           }
          ?>
          </div>
        </div>
       </div>
      </div>
      <!-- FINAL DO MODAL DE EDITAR CADASTRO -->





                                  


                                </div>
                            </section>
 <br /><br /><br /><br /><br /><br /><br />
 <br /><br /><br /><br /><br /><br /><br />
 <?php include_once '../footer.php'; ?>
 </aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/Director/app.js" type="text/javascript"></script>
<script src="../js/Director/dashboard.js" type="text/javascript"></script>
</script>
</body>
</html>