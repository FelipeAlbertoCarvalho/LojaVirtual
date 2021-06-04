
function somarPrecoProduto(elemento){
  //teho que mudar no carrinho
  const tableRow = (elemento.parentNode).parentNode;
  console.log(tableRow);
  var preco = tableRow.children[3].innerHTML; //pega o preco
  var qtde = tableRow.children[4].children[0].value;  //pega o valor
  console.log(qtde);
  preco = Number.parseFloat(preco);
  qtde = Number.parseFloat(qtde);

  var total = preco * qtde ;
  total = total.toFixed(2);

  var totalRow = tableRow.children[5].innerHTML = total;
  
  somaTotalPedido();
}

function diminuirPrecoProduto(elemento){
  
}

function calcularPrecoProduto(elemento){
  const tableRow = (elemento.parentNode).parentNode;
  console.log(tableRow);
  var preco = tableRow.children[3].innerHTML;
  var qtde = elemento.value;

  preco = Number.parseFloat(preco);
  qtde = Number.parseFloat(qtde);

  var total = preco * qtde ;
  total = total.toFixed(2);

  var totalRow = tableRow.children[6].innerHTML = total;
  
  somaTotalPedido();
  
  return total;

}

function somaTotalPedido(){
  const array_precos = document.getElementsByName("preco_acumulado");
  var soma = 0;

  array_precos.forEach(element => {
    soma = soma + Number.parseFloat(element.innerHTML);
    console.log(element.innerHTML);
  });
  soma = soma.toFixed(2);

  document.getElementById("totalPedido").innerHTML = soma;

}

