var radioBtn = document.querySelectorAll('.radioBtn');

function Etudiant(){
    if (radioBtn[0].checked){
        document.getElementById("CasePromotion").hidden = false;
        document.getElementById("Promotion").required = true;
    }else{
        document.getElementById("CasePromotion").hidden = true;
        document.getElementById("Promotion").required= false;
    }
}

for (var i = 0 ; i<radioBtn.length ; i++){
    radioBtn[i].onclick = Etudiant;
}