<div class="card text-center">
  <div class="card-header">
    <?php echo  $dados['qtde_pedidos']?> Pedidos Vendidos
  </div>
  <div class="card-body">
    <h5 class="card-title">R$ <?php echo  number_format($dados['soma_total'], 2); ?></h5>
    <p class="card-text"> Média de R$ <?php echo number_format(($dados['soma_total']/$dados['qtde_pedidos']), 2); ?> por pedido</p>
    <button type="button" class="btn btn-secondary" onClick="history.go(-1)" >
      Voltar
    </button> 
  </div>
  <div class="card-footer text-muted">
  <?php echo  date('d/m/Y'); ?>
  </div>
</div>