<?php
require("../restritos.php"); 
require_once '../init.php';
$PDO = db_connect();
 $query = $PDO->prepare("SELECT * FROM login WHERE login='$login'");
 $query->execute();
  $row = $query->fetch();
  $NomeUserLogado = $row['Nome'];
  $AttSenha = $row['senha'];
  $foto = $row['Foto'];
  $ramal = $row['Ramal'];
  $mail = $row['Mail'];
  $telefone = $row['Fone'];
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
    Configurações de Perfil
   </header>
    <div class="panel-body">
     <div class="row">
      <div class="col-md-3 form-group">
       <img src="../img/user/<?php echo $foto; ?>" width="200" />      
      </div>
      <div class="col-md-5 form-group">
      <strong>Nome Completo: </strong>
      <input class="form-control" disabled="disabled" placeholder="<?php echo $NomeUserLogado; ?>">
      </div>
      <div class="col-md-4 form-group">
      <strong>Usuário: </strong>
      <input class="form-control" disabled="disabled" placeholder="<?php echo $login; ?>">
      </div>
      <div class="col-md-5 form-group">
      <strong>E-Mail: </strong>
      <input class="form-control" disabled="disabled" placeholder="<?php echo $mail; ?>">
      </div>
      <div class="col-md-2 form-group">
      <strong>Ramal: </strong>
      <input class="form-control" disabled="disabled" placeholder="<?php echo $ramal; ?>">
      </div>
      <div class="col-md-2 form-group">
      <strong>Telefone: </strong>
      <input class="form-control" disabled="disabled" placeholder="<?php echo $telefone; ?>">
      </div>
      <div class="col-md-3 form-group">
      <a href="#TrocaFoto" data-toggle="modal" class="btn btn-lg btn-success">
      Trocar Foto de Perfil
      </a>
      </div>
      <div class="col-md-3 form-group">
      <a href="#EditaPerfil" data-toggle="modal" class="btn btn-lg btn-info">
      Editar Perfil
      </a>
      </div>
      <div class="col-md-3 form-group">
      <a href="#NSenha" data-toggle="modal" class="btn btn-lg btn-warning">
      Trocar Senha
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
             <img src="../img/user/<?php echo $foto; ?>" width="100" />      
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
             $dir = '../img/user/'; //Diretório para uploads
             move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
             echo '<script type="text/javascript">alert("Foto atualizada no Sistema");</script>';
             $AtFoto = $PDO->query("UPDATE login SET Foto='$new_name' WHERE login='$login'");
              if ($AtFoto) {
              echo '
              <script type="text/JavaScript">alert("Foto Vinculada ao Perfil");
              location.href="Perfil.php"</script>';
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
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="EditaPerfil" class="modal fade">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
           <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><code>X</code></button>
           <h4 class="modal-title">Editando Cadastro</h4>
          </div>
          <div class="modal-body">
           <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
           <div class="col-xs-8 form-group">Nome Completo 
            <input class="form-control" type="text" name="nome" required="required" placeholder="<?php echo $NomeUserLogado; ?>">
           </div>
           <div class="col-xs-4 form-group">Ramal
            <input class="form-control" type="text" name="ramal" required="required" placeholder="<?php echo $ramal; ?>">
           </div>
           <div class="col-xs-4 form-group">Telefone
            <input class="form-control" type="text" name="fone" required="required" placeholder="<?php echo $telefone; ?>">
           </div>
           <div class="col-xs-8 form-group">E-Mail
            <input class="form-control" type="email" name="email" required="required" placeholder="<?php echo $mail; ?>">
           </div>

           <input name="enviar" type="submit" class="btn btn-success btn-block" id="enviar" value="Atualizar Dados"  />
          </form>
          <?php
           if(@$_POST["enviar"]){
            $NNome = $_POST["nome"];
            $NRamal = $_POST["ramal"];
            $NMail = $_POST["email"];
            $NFone = $_POST["fone"];
            //EXECUTANDO A QUERY
            $AtPerfil = $PDO->query("UPDATE login SET Nome='$NNome', Mail='$NMail', Ramal='$NRamal', Fone='$NFone' WHERE login='$login'");
             if($AtPerfil)
             {
              echo '
              <script type="text/JavaScript">alert("Perfil Atualizado com Sucesso");
              location.href="Perfil.php"</script>';
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
      <!-- INICIO DO MODAL DE TROCAR SENHA -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="NSenha" class="modal fade">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
           <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><code>X</code></button>
           <h4 class="modal-title">Trocar Senha</h4>
          </div>
          <div class="modal-body">
           <form name="EdCad" id="name" method="post" action="" enctype="multipart/form-data">
           <div class="col-xs-6 form-group">Senha Atual: 
            <input class="form-control" type="password" name="apsswd" required="required">
           </div>
           <div class="col-xs-6 form-group">Nova Senha:
            <input class="form-control" type="passwd" name="npasswd" required="required" >
           </div>
           <input name="Tsenha" type="submit" class="btn btn-success btn-block" id="Tsenha" value="Trocar Senha"  />
          </form>
          <?php
           if(@$_POST["Tsenha"]){
            $ASenha = $_POST["apsswd"];
            $NSenha = $_POST["npasswd"];
            $CryNSenha= md5($NSenha);
            $CrySenha = md5($ASenha);
              if ($CrySenha <> $AttSenha) {
              echo '<script type="text/javascript">alert("A senha digitada não corresponde com a Senha atual");</script>';
              echo '<script type="text/javascript">location.href="javascript: history.back(0);";</script>';
              }
              elseif ($CrySenha === $AttSenha) {
               $AtSenha = $PDO->query("UPDATE login SET senha='$CryNSenha' WHERE login='$login'");
             if($AtPerfil)
             {
             echo '<script type="text/javascript">alert("Não foi possível. Erro: 0x02");</script>';

             }
             else{
              echo '
              <script type="text/JavaScript">alert("Senha Atualizada com Sucesso");
              location.href="Perfil.php"</script>';
             }
              }
           }
          ?>
          </div>
        </div>
       </div>
      </div>
      <!-- FINAL DO MODAL DE TROCAR SENHA -->





                                  


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