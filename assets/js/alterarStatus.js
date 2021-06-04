function alterarStatus(elemento) {
  
  if (i >= 5) {
    i = 0;
  }
  const tableRow = elemento.parentNode.parentNode;
  const arrayOpcoes = [
    "Em Aberto - Pagamento não Efetuado",
    "Pagamento Efetuado",
    "Enviado",
    "Cancelado",
    "Entregue",
  ];
  console.log(tableRow.children[4].children[0].value);
  i++;
  console.log(tableRow.children[4].text());
}

function salvarStatus(elemento) {
  const tableRow = elemento.parentNode.parentNode;
  console.log(tableRow.children[4].text());
}

