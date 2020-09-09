if (id !== "") {
  document
    .getElementById("btn-entrar")
    .setAttribute("href",  base + "users/logout");
  document.getElementById("btn-entrar").textContent = "Sair";
  document.getElementById("icons-social").className = "col-md-8";
}
