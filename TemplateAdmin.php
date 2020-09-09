<?php include 'includes/cabecalhoHTML.php'; ?>
<!-- Começo do cabeçalho -->
<header>
  <nav class="navbar bg-dark">
    <div class="ml-auto">
      <div class="row">
        <div id="icons-social" class="col-md-8">
          <a href=""><i class="fab fa-facebook-square"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-whatsapp"></i></a>
        </div>
        <div class="col-md-4">
          <a href="<?php echo BASE_URL; ?>usuario/logout">Sair</a>
        </div>
      </div>
    </div>
  </nav>

  <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="<?php echo BASE_URL; ?>users">Loja Virtual</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav m-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>usuario">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
              Produtos
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo BASE_URL; ?>produto/adicionar">Adicionar</a>
              <a class="dropdown-item" href="<?php echo BASE_URL; ?>produto/alterar">Alterar</a>
              <a class="dropdown-item" href="<?php echo BASE_URL; ?>produto/deletar">Deletar</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
              Usuários
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo BASE_URL; ?>usuario/adicionar">Adicionar</a>
              <a class="dropdown-item" href="<?php echo BASE_URL; ?>usuario/editar">Alterar</a>
              <a class="dropdown-item" href="<?php echo BASE_URL; ?>usuario/deletar">Deletar</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>pedido">Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>relatorio">Relátorio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL; ?>contatos">Contatos</a>
          </li>
        </ul>
      </div>
    </nav>
    
</header>
<!-- Fim do Cabeçalho -->

<?php require_once $viewNome.'.php';?>

<?php include 'includes/scripts.php';?>