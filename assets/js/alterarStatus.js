function alterarStatus(elemento){
  if(i>=5){i=0;}
  const tableRow = (elemento.parentNode).parentNode;
  const arrayOpcoes = ['Em Aberto - Pagamento não Efetuado',
                       'Pagamento Efetuado',
                       'Enviado',
                       'Cancelado',
                       'Entregue'];
  tableRow.children[4].innerHTML = arrayOpcoes[i];
  i++;

}