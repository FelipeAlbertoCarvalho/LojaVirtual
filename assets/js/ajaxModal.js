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
