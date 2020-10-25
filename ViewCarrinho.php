<br><br>
<h2 class="text-center"> <i class="fas fa-shopping-cart"></i> Carrinho de Compra <i class="fas fa-shopping-cart"></i> </h2> 
<br>
<div class="col-md-10 m-auto">
  <div class="row">

    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
          <th class="align-middle">#</th>
          <th class="align-middle">Imagem</th>
          <th class="align-middle">Titulo</th>
          <th class="align-middle">Preço Unitário (R$)</th>
          <th class="align-middle">Quantidade</th>
          <th class="align-middle">Preço (R$)</th>
          <th class="align-middle">Adicionar</th>
          <th class="align-middle">Remover</th>
        </tr>
        </thead>
        <tbody>
          <?php $i=1; 
            $totalPedido = 0;
            if($dados != null ){
              foreach ($dados as $dado) : 
              $somaTotalProduto = number_format(($dado['preco'] * $dado['qtde_produto_carrinho']), 2, '.', '');   
              
              $totalPedido = $totalPedido + $somaTotalProduto;
              $totalPedido = number_format($totalPedido, 2, '.', '');
          ?> 
            
            <tr>
              <th  class="align-middle" scope="row"><?php echo $i ?></th>
              <td  class="align-middle"><img src="<?php echo BASE_URL; ?>assets/img/<?php echo $dado['url_img']; ?>" width="75" height="50"></td>
              <td  class="align-middle"><?php echo $dado['titulo']; ?></td>
              <td  class="align-middle"><?php echo $dado['preco']; ?></td>
              <td  class="align-middle"> 
                <input class="form-control" name="qtde_comprando<?php echo $i; ?>" id="qtde_comprado<?php echo $i; ?>" type="number" value="<?php echo $dado['qtde_produto_carrinho']; ?>" min="0" max="<?php echo $dado['qtde']; ?>">
              </td>
              <td  class="align-middle text-center" name="preco_acumulado"><?php echo $somaTotalProduto;?> </td>
              <td> 
                <input type="button" class="btn btn-success" onclick="somarPrecoProduto(this)" value="ADD">
              </td>
              <td> 
                <input type="button" class="btn btn-danger" onclick="diminuirPrecoProduto(this)" value="DEL"> 
              </td>
            </tr>  
            
          <?php $i++; endforeach; $_SESSION['total_pedido'] = $totalPedido; } ?>
            <tr class="table-dark"> 
              <th  class="align-middle" scope="row"></th>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td  class="align-middle"> <h5 class="text-center"> TOTAL (R$) </h5> </td>
              <td  class="align-middle text-center"><h5 id="totalPedido"><?php echo $totalPedido;?></h5></td>
            </tr>

        </tbody>
      </table>
      
  </div>
</div>


<br>
<h2 class="text-center">Adicionar Endereço de Entrega</h2>
<br>

<form method="POST" action="<?php echo BASE_URL; ?>pedido/criarPedido">
  
<div class="row">
    <div class="col-md-6 m-auto">

      <div class="form-group">
        <label>Cep:</label>
        <input class="form-control" name="cep" type="text" id="cep" value="" size="10" maxlength="9"
              onblur="pesquisacep(this.value);" />
      </div>
      <div class="form-group">
        <label>Rua:</label>
        <input class="form-control" name="rua" type="text" id="rua" size="60" />
      </div>
      <div class="form-group">
        <label>Complemento:</label>
        <input class="form-control" name="complemento" type="text" id="complemento" size="60" />
      </div>
      <div class="form-group">
        <label>Numero:</label>
        <input class="form-control" name="numero"  type="text" id="numero" size="60" />
      </div>
      <div class="form-group">
        <label>Bairro:</label>
        <input class="form-control" name="bairro" type="text" id="bairro" size="40" />
      </div>
      <div class="form-group">
        <label>Cidade:</label>
        <input class="form-control" name="cidade" type="text" id="cidade" size="40" />
      </div>
      <div class="form-group">
        <label>Estado:</label>
        <input class="form-control" name="uf" type="text" id="uf" size="2" />
      </div>
      <button id="btn_enviar" disabled class="btn btn-primary" type="submit"> Adicionar Endereço </button>

    </div>
  </div>
</form>


