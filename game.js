
div_numeanimal = document.getElementById("nume-animal");
div_used = document.getElementById('used');
div_litere = document.getElementById("litere");
//viata cu care incepe jocul
var numStrikes = 6;
var numeanimal = document.querySelector('#nume-animal').innerHTML;

document.querySelector('#nume-animal').innerHTML = '';
var length = numeanimal.length;

div_numeanimal.innerHTML= '';
for (var i = 0; i < length; i++) {
    var box = document.createElement('div');
    box.id = 'letter_' + i;

    if(numeanimal[i]==' ') box.className += 'emptyBox';
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

    var win;
    var current = '';
    var correct = false;
    for(var i=0; i<numeanimal.length; i++){
        if(numeanimal[i] == letter){
            document.getElementById('letter_' + i).innerHTML = letter;
            correct = true;
        }

        if(document.getElementById('letter_' + i).innerHTML == '') current += ' ';
        else current += document.getElementById('letter_' +i).innerHTML;
    }
    if(current == numeanimal){
        alert('Ai castigat');
        win = true;
    }
    if(correct){
        document.getElementById('sndCorrect').currentTime = 0;
        document.getElementById('sndCorrect').play();
        lit.style.backgroundColor = "olivedrab";
        lit.style.color = "Yellow ";
    }else{
        document.getElementById('sndBad').currentTime = 0;
        document.getElementById('sndBad').play();

        // Daca litera apasata nu exista, ar tb sa scada din viata.
        numStrikes--;
        if(numStrikes == 0){
            // cand ramane fara viata;
            alert('Ai pierdut. Raspunsul corect a fost: ' + numeanimal);
            document.getElementById('sndLose').currentTime = 0;
            document.getElementById('sndLose').play();
        }
    }
    if(win){
        document.getElementById('sndWin').currentTime = 0;
        document.getElementById('sndWin').play();
    }
}
// selectLitera(selected);
