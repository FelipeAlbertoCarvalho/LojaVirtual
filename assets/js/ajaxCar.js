// const BASE_URL = "http://localhost/LojaVirtual/";

function addCar(id) {
  $.ajax({
    type: "GET",
    url: BASE_URL + "usuario/?addCar=" + id,
    success: function () {
      window.location = BASE_URL + "usuario";
    },
  });
}
