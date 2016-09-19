 <header class="header">
  <a href="#" class="logo"><img src="img/logo/logoWhite.png"/></a>
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
     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <i class="fa fa-user"></i>
       <span><?php echo $NomeUserLogado; ?><i class="caret"></i></span>
     </a>
     <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
      <li class="dropdown-header text-center">Conta</li>
       <li class="divider"></li>
       <li>
        <a href="user/perfil.php"><i class="fa fa-user fa-fw pull-right"></i>Perfil</a>
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