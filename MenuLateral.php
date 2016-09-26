<?php
$Prefixo = "http://localhost:8888/Henry-Estoque/";
?>
  <div class="pull-left info">
   <p>Olá, <?php echo $NomeUserLogado; ?></p>
  </div>
 </div>
 <ul class="sidebar-menu">
  <li>
   <a href="<?php echo $Prefixo; ?>dashboard.php">
    <i class="fa fa-home"></i> <span>Página Inicial</span>
   </a>
  </li>
  <li>
   <a href="<?php echo $Prefixo; ?>Categoria.php">
     <i class="fa fa-list-ol"></i> <span>Categoria</span>
    </a>
  </li>
  <li>
   <a href="<?php echo $Prefixo; ?>Fornecedor/dashboard.php">
    <i class="fa fa-briefcase"></i> <span>Fornecedores</span>
   </a>
  </li>
  <li>
   <a href="<?php echo $Prefixo; ?>transporte.php">
    <i class="fa fa-truck"></i> <span>Transportadoras</span>
   </a>
  </li>
  <li class="treeview">
   <a href="<?php echo $Prefixo; ?>Itens/dashboard.php">
   <i class="ion ion-clipboard"></i>
     <span>Lista de Itens</span>
     <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
   <li>
   <a href="<?php echo $Prefixo; ?>Itens/IProd.php">
    <i class="ion ion-fork-repo"></i>
      Peças para Produto
    </a>
   </li>
   <li>
   <a href="<?php echo $Prefixo; ?>Itens/Geral.php">
    <i class="ion ion-android-list"></i>
      Lista Geral
    </a>
   </li>
   <li>
   <a href="<?php echo $Prefixo; ?>Itens/Arvore.php">
    <i class="fa fa-industry"></i>
      Árvore de Produto
    </a>
   </li>
  </ul>
 </li>
</ul>
</section>