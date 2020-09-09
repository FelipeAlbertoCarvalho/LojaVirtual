<form method="POST" action="<?php echo BASE_URL; ?>Cadastro/cadastrar">
  
  <input type="hidden" name="nivel" value="2"> 

  <div class="row">
    <div class="col-md-6 m-auto">

      <legend>Dados do Produto</legend><br>

      <div class="form-group">
        <label for="titulo_produto">Titulo</label>
        <input type="text" id="titulo_produto" name="titulo_produto" class="form-control">
      </div>
      <div class="form-group">
        <label for="descricao_produto">Descrição</label>
        <input type="text" name="descricao_produto" id="descricao_produto" class="form-control">
      </div>
      <div class="form-group">
        <label for="especificacao_produto">Especificação do Produto</label>
        <input type="text" name="especificacao_produto" id="especificacao_produto" class="form-control">
      </div>
      <div class="form-group">
        <label for="categoria_produto">Categoria do Produto</label>
        <input type="text" name="categoria_produto" id="categoria_produto" class="form-control">
      </div>
      
      <div class="form-group">
        <input type="submit" class="form-control btn-success">
      </div>
    
    </div>
  </div>
</form>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="file" id="banner" name="arquivo" class="form-control">
  </div>
  <div class="form-group">
    <input type="submit" class="form-control btn btn-success">
  </div>
</form>