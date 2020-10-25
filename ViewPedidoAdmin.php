<br>
<h2 class="text-center">Visualizar Pedidos</h2>
<br>
<div class="col-md-10 m-auto">
  <div class="row">
    <table class="table table-hover">
    <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Número do Pedido</th>
      <th>Id do Cliente</th>
      <th>Data do Pedido Efetuada</th>
      <th>Status</th>
      <th>Valor (R$)</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    </thead>
    <tbody>
  <script>
    var i = 1;
  </script>
      <?php $i=1; foreach ($dados as $dado) : ?>
        
        <tr>
          <th scope="row"><?php echo $i ?></th>
          <td><?php echo $dado['id']; ?></td>
          <td><?php echo $dado['id_cliente']; ?></td>
          <td><?php echo $dado['data_pedido']; ?></td>
          <td><?php echo $dado['status_pedido']; ?></td>
          <td><?php echo  number_format($dado['valor'], 2); ?></td>
          <td><button class="btn btn-info" onclick="alterarStatus(this)"> Alterar </button></td>
          <td><a class="btn btn-danger" href="<?php echo BASE_URL; ?>pedido/deleta/<?php echo $dado['id']; ?>">Excluir</a></td>
          <td><a class="btn btn-success" href="<?php echo BASE_URL; ?>pedido/salvarStatus/<?php echo $dado['id']; ?>">Salvar</a></td>
          <input type="hidden" name="<?php echo $dado['id']; ?>">
        </tr>  
        
        
        
      <?php $i++; endforeach; ?>

    </tbody>
  </div>
</div>