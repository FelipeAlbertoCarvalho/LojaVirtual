window.onload = function() {
  var btnProx = document.getElementById("btn-prox");
  var btnAnt = document.getElementById("btn-anterior");
  var num = 0;
  var slide = (document.getElementById("slide").src = images[0]);
  var t = setInterval(next, 5000);

  function next() {
    slide = document.getElementById("slide");
    num++;
    if (num >= images.length) num = 0;
    slide.src = images[num];
    t = clearInterval();
  }

  function prev() {
    slide = document.getElementById("slide");
    num--;
    if (num < 0) num = images.length - 1;
    slide.src = images[num];
    t = clearInterval();
  }

  btnAnt.addEventListener("click", prev);
  btnProx.addEventListener("click", next);
};
