<br>
<h2 class="text-center">Alterar Usuario</h2>
<br>
<div class="col-md-10 m-auto">
  <div class="row">
    <table class="table table-hover">
    <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Nascimento</th>
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
          <td><?php 
                if(($dado['nivel']) == 1){
                  echo "Administrador"; 
                } else { 
                  echo "Usuário";
                } 
              ?>
          </td>
          <td><a class="btn btn-primary" href="<?php echo BASE_URL; ?>usuario/alterar/<?php echo $dado['id']; ?>">Alterar</a></td>
        </tr>  
        
        
        
      <?php $i++; endforeach; ?>

    </tbody>
  </div>
</div>