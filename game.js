var numeanimal = document.querySelector('#nume-animal').innerHTML;
    document.querySelector('#nume-animal').innerHTML = '';
var length = numeanimal.length;
for (var i = 0; i < length; i++) {
    var span = document.createElement('span');
    span.className = 'coloredText ' + (i + 1);
    span.innerHTML = numeanimal[i];
    document.getElementById("nume-animal").appendChild(span);

}

//alphabetul declarat in variabila
var alfabet = 'ABCDEFGHIJKLMNOPQRSTUVXYZ';

//butoanele create in javascript
function letters(){
    div_used = document.getElementById('used');
    div_litere = document.getElementById("litere");
    for(var i=0; i<alfabet.length; i++){
        var lit = document.createElement('div');
        lit.innerHTML = alfabet[i];
        lit.className = "litere";
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
}
// selectLitera(selected);