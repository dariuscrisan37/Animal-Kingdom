
div_numeanimal = document.getElementById("nume-animal");
div_used = document.getElementById('used');
div_litere = document.getElementById("litere");
var numeanimal = document.querySelector('#nume-animal').innerHTML;

document.querySelector('#nume-animal').innerHTML = '';
var length = numeanimal.length;

for (var i = 0; i < length; i++) {
    var box = document.createElement('div');
    box.id = 'letter_' + i;

    if(numeanimal[i]==' ') div_numeanimal.innerHTML += '&nbsp;&nbsp;&nbsp;&nbsp;';
    else box.className += 'box letter';

    // box.innerHTML = numeanimal[i];

    div_numeanimal.appendChild(box);

}
//alphabetul declarat in variabila
var alfabet = 'ABCDEFGHIJKLMNOPQRSTUVXYZ';

//butoanele create in javascript
function letters(){
    for(var i=0; i<alfabet.length; i++){
        var lit = document.createElement('div');
        lit.innerHTML = alfabet[i];
        lit.className = "btnlitere";
        lit.onclick = function(){selectLitera(this);};
        div_litere.appendChild(lit);
    }
}
letters();

//butoanele dupa click(au fost utilizate/folosite)
function selectLitera(selected){
    // selected.style.display = 'none';
    selected.style.visibility = 'hidden';
    var lit = document.createElement('div');
    lit.innerHTML = selected.innerHTML;
    lit.className = 'litUsed';
    div_used.appendChild(lit);


    var letter = selected.innerHTML;
    for(var i=0; i<numeanimal.length; i++){
        if (numeanimal[i] == letter) document.getElementById('letter_' + i).innerHTML = letter;
    }
}
// selectLitera(selected);
