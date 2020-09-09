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

<!--nav main-->
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Loja Virtual</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>Cadastro">Cadastrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>produtos">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>sobre">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>contatos">Carrinho de Compra</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--Fim nav main-->
</header>

  <?php require_once $viewNome.'.php';?>

  <?php include 'includes/scripts.php';?>