<br>
<h2 class="text-center">Visualizar Produtos que Mais Vendem</h2>
<br>
<div class="col-md-10 m-auto">
  <div class="row">
    <table class="table table-hover">
    <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Titulo do Produto</th>
      <th>Quantidade de Produtos Vendidos</th>
      <th>Valor (R$)</th>
    </tr>
    </thead>
    <tbody>

      <?php $i=1; foreach ($dados as $dado) : ?>
        
        <tr>
          <th scope="row"><?php echo $i ?></th>
          <td><?php echo $dado['titulo']; ?></td>
          <td ><?php echo $dado['contador_produto']; ?></td>
          <td><?php echo  number_format($dado['soma'], 2); ?></td>
        </tr>  
        
        
      <?php $i++; endforeach; ?>

    </tbody>
    </table>
    <button type="button" class="btn btn-secondary" onClick="history.go(-1)" >
      Voltar
    </button> 
  </div>
</div>