var Checkbox = document.getElementById('delegue');

function delegue(){
    if (Checkbox.checked){
        document.getElementById("droits").hidden = false;
    }else{
        document.getElementById("droits").hidden = true;
    }
}

Checkbox.onclick = delegue;

function verif(){
    delegue();
    Etudiant();
}

window.onload = verif();