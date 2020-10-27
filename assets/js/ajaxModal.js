const BASE_URL = "http://localhost/LojaVirtual/";

function modalImg(id) {
  $.ajax({
    type: "GET",
    url: BASE_URL + "produto/detalhes/" + id,
    success: function (modal) {
      $(".modal-content").html(modal);
    },
  });
}

function maisGastam() {
  console.log("ta vindo");
  $.ajax({
    type: "GET",
    url: BASE_URL + "relatorio/usuariosMaisConsomem",
    success: function (pageConsomem) {
      $(".conteudo").html(pageConsomem);
    },
  });
}

function usuarios(id) {
  $.ajax({
    type: "GET",
    url: BASE_URL + "produto/detalhes/" + id,
    success: function (modal) {
      $(".modal-content").html(modal);
    },
  });
}

function usuarios(id) {
  $.ajax({
    type: "GET",
    url: BASE_URL + "produto/detalhes/" + id,
    success: function (modal) {
      $(".modal-content").html(modal);
    },
  });
}
