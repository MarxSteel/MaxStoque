<!DOCTYPE html>
<html >
 <head>
 <meta charset="UTF-8">
 <title>H Estoque</title>    
 <link rel="stylesheet" href="login/css/reset.css">
 <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="login/css/style.css">
  </head>
  <body>
<div class="container">
  <div class="info"><br />
  </div>
</div>
<div class="form">
    <?php
     if (isset($_GET["erro"])) {
      echo '<div class="alert alert-danger alert-dismissible">';
      echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
      echo '<h4><i class="icon fa fa-ban"></i> Erro!</h4>';
      echo 'Não foi possível acessar. <br />Erro: ' . $_GET["erro"]; 
      echo '</div>';
     }
    ?>
  <img src="img/logo/logoBlack.png" width="230" /><br />
  <form class="register-form">
    <input type="text" placeholder="name"/>
    <input type="password" placeholder="password"/>
    <input type="text" placeholder="email address"/>
    <button>create</button>
    <p class="message"> <a href="#">Tela de Login</a></p>
  </form>
  <form action="logar.php" name="login" method="post" enctype="multipart/form-data">
    <div class="form-group has-feedback">
     <input type="text" name="login" class="form-control" placeholder="Usuário">
     <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
     <input type="password" name="senha" class="form-control" placeholder="Senha">
     <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
     <div class="col-xs-12">
      <button type="submit" class="btn btn-facebook btn-block btn-flat">Entrar</button>
     </div>
    </div>
    <p class="message">Esqueceu a senha? <a href="#">Redefinir senha</a></p>
  </form>
</div>
<video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
  <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4"/>
</video>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="login/js/index.js"></script>

    
    
    
  </body>
</html>
