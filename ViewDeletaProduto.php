<div class="text-danger" id="msg-icon-close">
  <?php if (count($dadosSec) > 0): ?>
    <i class="fas fa-times" id="icon-close" style="cursor: pointer;"></i>
    <p><?php echo $dadosSec["errors"]; ?></p>  
  <?php endif; ?>
</div>
<br/>
<h2 class="text-center">Deletar Produto</h2>
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
          <td><a class="btn btn-primary" href="<?php echo BASE_URL; ?>produto/deletar/<?php echo $dado['id']; ?>">Deletar</a>
        </tr>  
        
        
        
      <?php $i++; endforeach; ?>

    </tbody>
  </div>
</div>