<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner text-center">

    <?php
    foreach ($dados as $key => $dados) :
      if($key == 0) {
    ?>
    <div class="carousel-item active">
      <h2> <?php echo $dados["titulo"] ?> </h2>
      <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $dados["url_img"] ?>" width="350">
      <h6> <?php echo $dados["descricao"] ?> </h6>
    </div>
    <?php 
      } else {
    ?>
    <div class="carousel-item">
      <h2> <?php echo $dados["titulo"] ?> </h2>
      <img src="<?php echo BASE_URL; ?>assets/img/<?php echo $dados["url_imagem"] ?>" width="350">
      <h6> <?php echo $dados["descricao"] ?> </h6>
    </div>
    <?php 
      }
    endforeach; 
    ?>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>