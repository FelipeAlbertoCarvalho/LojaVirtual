<br>
<h2 class="text-center">Deleta Usuario</h2>
<br>
<div class="col-md-10 m-auto">
  <div class="row">
    <table class="table table-hover">
    <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Nível</th>
      <th>Operação</th>
    </tr>
    </thead>
    <tbody>

      <?php $i=1; foreach ($dados as $dado) : ?>
        
        <tr>
          <th scope="row"><?php echo $i ?></th>
          <td><?php echo $dado['nome']; ?></td>
          <td><?php echo $dado['email']; ?></td>
          <td><?php echo $dado['nascimento']; ?></td>
          <td><a class="btn btn-primary" href="<?php echo BASE_URL; ?>usuario/deletar/<?php echo $dado['id']; ?>">Deletar</a>
        </tr>  
        
        
        
      <?php $i++; endforeach; ?>

    </tbody>
  </div>
</div>