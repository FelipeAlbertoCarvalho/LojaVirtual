<div class="album py-5 bg-light">
  <div class="container">

    <div class="row">
      <?php
      foreach ($dados['dados_produto'] as $produto) :
      ?>

      <div class="card col-md-4">

        <div class="card-body"> 
          
          <h5 class="card-title"> 
            <?php echo $produto['titulo']; ?> 
          </h5>
          <a href="#" id="modalImg" onclick="modalImg(<?php echo $produto['id']; ?>);" data-toggle="modal" data-target=".bd-example-modal-lg">
            <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $produto['url_img']; ?>" width="250">
          </a>

          <p class="card-text"> 
            <?php echo $produto["descricao"] ?> 
          </p>
          <a href="#" class="btn btn-primary" onclick="addCar(<?php echo $produto['id'] ?>)">
            Adicionar ao Carrinho
          </a>
          <small class="text-muted col-md-3"> 
            R$
            <?php echo $produto["preco"] ?>
          </small>

        </div>

      </div>

      <?php endforeach; ?>
    </div>
    
    <div class="modal fade bd-example-modal-lg mt-5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
      </div>
    </div>

  </div>
</div>