<form method="POST" action="<?php echo BASE_URL; ?>Cadastro/cadastrar">
  
  <input type="hidden" name="nivel" value="2"> 

  <div class="row">
    <div class="col-md-6 m-auto">

      <legend>Dados do Cliente</legend><br>
      
      <div class="form-group">
        <label for="nomePresidente">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control">
      </div>
      <div class="form-group">
        <label for="email">Email (Para Efetuar Login):</label>
        <input type="text" name="email" id="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="senha">Senha (Para Efetuar Login):</label>
        <input type="password" name="senha" id="senha" class="form-control">
      </div>
      <div class="form-group">
        <label for="nascimento">Data de Nascimento:</label>
        <input type="date" name="nascimento" id="nascimento" class="form-control">
      </div>
      
      <div class="form-group">
        <input type="submit" class="form-control btn-success">
      </div>
    
    </div>
  </div>
</form>