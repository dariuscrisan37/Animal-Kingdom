var numeanimal = document.querySelector('#nume-animal').innerHTML;
var length = numeanimal.length;
for ( i = 0; i < length; i++ ) {
    var span = document.createElement('span');
    span.className = 'coloredText '+(i + 1);
    span.innerHTML = numeanimal[i];
    document.getElementById("nume-animal").appendChild(span);

}
