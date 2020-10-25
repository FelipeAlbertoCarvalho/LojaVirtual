<br>
<form method="POST" action="<?php echo BASE_URL; ?>produto/adicionar" enctype="multipart/form-data">

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
        <textarea class="form-control" name="descricao_produto" id="descricao_produto" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="especificacao_produto">Preço</label>
        <input type="number" min='0' name="preco_produto" id="preco_produto" step=".01" class="form-control">
      </div>
      <div class="form-group">
        <label for="especificacao_produto">Quantidade</label>
        <input type="number" min='0' name="qtde_produto" id="qtde_produto" class="form-control">
      </div>
      <div class="form-group">
        <label for="especificacao_produto">Desconto</label>
        <input type="number" min='0' name="desconto_produto" id="desconto_produto" step=".01" class="form-control">
      </div>
      <div class="form-group">
        <label for="categoria_produto">Categoria do Produto vindo do banco de dados?</label>
        <select name="categoria_produto" id="categoria_produto">
          <option value=""></option>
          <option value="celular">Celular</option>
          <option value="movel">Moveis</option>
          <option value="bicicleta">Bicicleta</option>
          <option value="notebook">Notebook</option>
          <option value="eletrodomestico">Eletrodomestico</option>
          <option value="roupa">Roupa</option>
          <option value="calçado">Calçado</option>
        </select>
      </div>
      <div class="form-group">
        <input type="file" id="url_img_produto" multiple name="url_img_produto[]" class="form-control">
      </div>

      <div class="form-group">
        <input type="submit" class="form-control btn-success">
      </div>

    </div>
  </div>
</form>