<br>
<h2 class="text-center">Visualizar Pedidos</h2>
<br>
<div class="col-md-10 m-auto">
  <div class="row">
    <table class="table table-hover">
      <thead class="thead-dark">
      <tr>
        <th class="align-middle">#</th>
        <th class="align-middle">Número do Pedido</th>
        <th class="align-middle">Produto</th>
        <th class="align-middle">Id do Cliente</th>
        <th class="align-middle">Data do Pedido Efetuada</th>
        <th class="align-middle">Status</th>
        <th class="align-middle">Quantidade</th>
        <th class="align-middle">Valor (R$)</th>
      </tr>
      </thead>
      <tbody>

        <?php $i=1; foreach ($dados as $dado) : ?>
          
          <tr>
            <th class="align-middle"scope="row"><?php echo $i ?></th>
            <td class="align-middle"><?php echo $dado['id_pedido']; ?></td>
            <td class="align-middle"> <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $dado['url_img'] ?>" width="75"></td>
            <td class="align-middle"><?php echo $dado['id_cliente']; ?></td>
            <td class="align-middle"><?php echo $dado['data_pedido']; ?></td>
            <td class="align-middle"><?php echo $dado['status_pedido']; ?></td>
            <td class="align-middle"><?php echo $dado['quantidade']; ?></td>
            <td class="align-middle"><?php echo  number_format($dado['preco'], 2); ?></td>
          </tr>  
          
        <?php $i++; endforeach; ?>

      </tbody>
    </table>
    <p> Endereço da Entrega : <?php echo $dados[0]['rua'] . ' ' . $dados[0]['numero'] . ' , ' . $dados[0]['bairro'] . ' - ' . $dados[0]['cidade'] . ' CEP : ' . $dados[0]['cep'] ?></p>
  </div>
</div>