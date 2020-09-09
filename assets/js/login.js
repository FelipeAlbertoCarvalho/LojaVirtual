var btnEntrar = document
  .getElementById("btn-entrar")
  .addEventListener("click", () => {
    document.getElementById("popupLogin").classList.add("mostrarPopupLogin");
  });

var btnFechar = document
  .getElementById("btn-fechar")
  .addEventListener("click", () => {
    document.getElementById("popupLogin").classList.remove("mostrarPopupLogin");
  });
