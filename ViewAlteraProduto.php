<br>
<h2 class="text-center">Alterar Produto</h2>
<br>
<div class="col-md-10 m-auto">
  <div class="row">
    <table class="table table-hover">
    <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Imagem</th>
      <th>Titulo</th>
      <th>Preço</th>
      <th>Quantidade</th>
      <th>Operação</th>
    </tr>
    </thead>
    <tbody>

      <?php $i=1; foreach ($dados as $dado) : ?>
        
        <tr>
          <th  class="align-middle" scope="row"><?php echo $i ?></th>
          <td  class="align-middle"><img src="<?php echo BASE_URL; ?>assets/img/<?php echo $dado['url_img']; ?>" width="75" height="50"></td>
          <td  class="align-middle"><?php echo $dado['titulo']; ?></td>
          <td  class="align-middle"><?php echo $dado['preco']; ?></td>
          <td  class="align-middle"><?php echo $dado['qtde']; ?></td>
          <td  class="align-middle"><a class="btn btn-primary" href="<?php echo BASE_URL; ?>produto/alterar/<?php echo $dado['id']; ?>">Alterar</a>
        </tr>  
        
      <?php $i++; endforeach; ?>

    </tbody>
  </div>
</div>