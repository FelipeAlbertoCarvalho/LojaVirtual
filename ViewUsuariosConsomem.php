<br>
<h2 class="text-center">Clientes que Mais Compraram</h2>
<br>
<div class="col-md-10 m-auto">
  <div class="row">
    <table class="table table-hover">
    <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Id do Cliente</th>
      <th>Nome do Cliente</th>
      <th>Quantidade de Pedidos Feitos</th>
      <th>Soma dos Pedidos</th>
      <th>Ver Pedidos</th>
    </tr>
    </thead>
    <tbody>

      <?php $i=1; foreach ($dados as $dado) : ?>
        
        <tr>
          <th scope="row"><?php echo $i ?></th>
          <td><?php echo $dado['id_cliente']; ?></td>
          <td><?php echo $dado['nome']; ?></td>
          <td><?php echo $dado['qtde_pedido']; ?></td>
          <td><?php echo  number_format($dado['soma_pedido'], 2); ?></td>
          <td><a class="btn btn-info" href="<?php echo BASE_URL; ?>pedido/?id=<?php echo $dado['id_cliente'] ?>">Ver Pedidos</a>
        </tr>  
        
        
        
      <?php $i++; endforeach; ?>

    </tbody>
    </table>
    <button type="button" class="btn btn-secondary" onClick="history.go(-1)" >
      Voltar
    </button> 
  </div>
</div>