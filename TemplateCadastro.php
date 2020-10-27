<?php include 'includes/cabecalhoHTML.php'; ?>
<!-- Começo do cabeçalho -->
<header>
  <!--nav upper-->
  <nav class="navbar bg-dark">
    <div class="ml-auto">
      <div class="row">
        <div id="icons-social" class="col-md-7">
          <a href=""><i class="fab fa-facebook-square"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-whatsapp"></i></a>
        </div>
        <div class="col-md-4">
          <a href="#" id="btn-entrar">Entrar</a>
          <script>
            var id = "<?php echo $datas['nivel'] ?>";
            var base = "<?php echo BASE_URL; ?>";
          </script>
        </div>
      </div>
    </div>
  </nav>
  <!--Fim nav upper-->

  <!--popup form login-->
  <div class="popup-login" id="popupLogin">
      <button class="btn-fechar" id="btn-fechar"><i class="fas fa-times"></i></button>
      <form action="<?php echo BASE_URL; ?>Usuario" method="post">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control form-control-sm" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="senha">Senha:</label>
          <input type="password" class="form-control form-control-sm" name="senha" id="senha">
        </div>
        <input class="btn-entrar" type="submit" name="logar">
      </form>
    </div>
    <!--Fim popup login-->

 <!--nav main-->
 <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Agência K10</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>cadastro">Cadastrar</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--Fim nav main-->
</header>
<!-- Fim do Cabeçalho -->

<!-- conteúdo principal chamar a view, os dados e a view que vai ser usado 
é o qeu foi passado para no parametro da funcao chamarTemplateView -->

<?php require_once $viewNome.'.php';?>

<?php include 'includes/scripts.php';?>