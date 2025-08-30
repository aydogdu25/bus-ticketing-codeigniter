function sehirKontrol() {
    var nereden = document.getElementById("nereden");
    var nereye = document.getElementById("nereye");
  

    var secilenNereden = nereden.options[nereden.selectedIndex].value;
    

    for (var i = 0; i < nereye.options.length; i++) {

        if (nereye.options[i].value === secilenNereden) {
            nereye.options[i].style.display = "none";
        } else {
            nereye.options[i].style.display = "block"; 
        }
    }
}