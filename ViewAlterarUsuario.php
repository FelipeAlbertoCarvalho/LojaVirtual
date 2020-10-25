<form method="POST" action="<?php echo BASE_URL; ?>usuario/alterar">
  
  <input type="hidden" name="nivel" value="2"> 
  <input type="hidden" name="id" value="<?php echo $dados['id']?>"> 

  <div class="row">
    <div class="col-md-6 m-auto">

      <legend>Dados do 
          <?php 
            if($dados['nivel'] == 1){ 
              echo 'Administrador ' . $dados['nome'];
            } else {
              echo 'Usuário ' . $dados['nome'];
            }
          ?>
      </legend><br>
      <div class="form-group">
        <label for="nomePresidente">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $dados['nome'] ?>">
      </div>
      <div class="form-group">
        <label for="email">Email (Para Efetuar Login):</label>
        <input type="text" name="email" id="email" class="form-control" value="<?php echo $dados['email'] ?>">
      </div>
      <div class="form-group">
        <label for="senha">Senha (Para Efetuar Login):</label>
        <input type="password" name="senha" id="senha" class="form-control">
      </div>
      <div class="form-group">
        <label for="nascimento">Data de Nascimento:</label>
        <input type="date" name="nascimento" id="nascimento" class="form-control" value="<?php echo $dados['nascimento'] ?>">
      </div>
      
      <div class="form-group">
        <input type="submit" class="form-control btn-success">
      </div>
    
    </div>
  </div>
</form>