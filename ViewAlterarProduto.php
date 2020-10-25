<form method="POST" action="<?php echo BASE_URL; ?>Produto/alterar" enctype="multipart/form-data">
  
  <input type="hidden" name="nivel" value="2"> 
  <input type="hidden" name="id" value="<?php echo $dados['id']?>"> 

  <div class="row">
    <div class="col-md-6 m-auto">

      <legend>Dados do Produto</legend><br>
      <div class="form-group">
        <label for="titulo_produto">Titulo</label>
        <input type="text" value="<?php echo $dados['titulo']?>" id="titulo_produto" name="titulo_produto" class="form-control">
      </div>
      <div class="form-group">
        <label for="descricao_produto">Descrição</label>
        <textarea class="form-control" name="descricao_produto" id="descricao_produto" rows="3"><?php echo $dados['descricao']?></textarea>
      </div>
      <div class="form-group">
        <label for="especificacao_produto">Preço</label>
        <input type="number" min='0' name="preco_produto" id="preco_produto" step=".01" class="form-control">
      </div>
      <div class="form-group">
        <label for="especificacao_produto">Quantidade</label>
        <input type="number" value="<?php echo $dados['qtde']?>" min='0' name="qtde_produto" id="qtde_produto" class="form-control">
      </div>
      <div class="form-group">
        <label for="especificacao_produto">Desconto</label>
        <input type="number" min='0' name="desconto_produto" id="desconto_produto" step=".01" class="form-control">
      </div>
      <div class="form-group">
        <label for="categoria_produto">Categoria do Produto vindo do banco de dados?</label>
        <select name="categoria_produto" id="categoria_produto">
          <option value=""></option>
          <option value="limpeza">Limpeza</option>
          <option value="acessorios">Acessórios</option>
          <option value="opel">Opel</option>
          <option value="audi">Audi</option>
        </select>
      </div>
      <div class="form-group">
       <input type="file" id="url_img_produto" name="url_img_produto" class="form-control">
      </div>

      <div class="form-group">
        <input type="submit" class="form-control btn-success">
      </div>
    
    </div>
  </div>
</form>