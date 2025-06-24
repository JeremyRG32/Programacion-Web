const audiobutton = document.getElementById('audiobutton');
const punchline = document.getElementById('punchline');
const punchbutton = document.getElementById('punchbutton');

punchbutton.onclick = function() {
    punchline.style.display = "block";
}

audiobutton.onclick = function() {
    document.getElementById('pokeaudio').play();
};
