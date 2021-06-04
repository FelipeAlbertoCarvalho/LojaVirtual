<br>
<h2 class="text-center">Alterar Pedido</h2>
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
      <th>Alterar</th>
    </tr>
    </thead>
    <script>
    var i = 1;
    </script>
    <tbody>
      <form method="POST" action="<?php echo BASE_URL; ?>pedido/updateStatus">
        <tr>
          <th scope="row">1</th>
          <td><?php echo $dados['id']; ?></td>
          <td><?php echo $dados['id_cliente']; ?></td>
          <td><?php $date = date_create($dados['data_pedido']); echo date_format($date,"d/m/Y"); ?></td>
          <td> 
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="status">
              <option selected><?php echo $dados['status_pedido']; ?></option>
              <option value="Em Aberto - Pagamento não Efetuado">Em Aberto - Pagamento não Efetuado</option>
              <option value="Pagamento Efetuado">Pagamento Efetuado</option>
              <option value="Enviado">Enviado</option>
              <option value="Cancelado">Cancelado</option>
              <option value="Entregue">Entregue</option>
            </select>
          </td>
          <td><?php echo number_format($dados['valor'], 2,',','.'); ?></td>
          <td><button type="submit" class="btn btn-success" >Salvar</button></td>
        </tr>  
        <input type="hidden" name='id' value="<?php echo $dados['id']; ?>">
      </form>
      <!--
        <td><a class="btn btn-success" href="<?php //echo BASE_URL; ?>pedido/salvar/<?php //echo $dado['id']; ?>">Salvar</a></td> -->
        
      </tbody>
    </table>
    
    <button type="button" class="btn btn-secondary" onClick="history.go(-1)">Voltar</button>
  </div>
</div>