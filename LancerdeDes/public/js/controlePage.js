// "use strict"; // good practice - see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Strict_mode
//Dice : <a href="https://www.flaticon.com/free-icons/dice" title="dice icons">Dice icons created by Freepik - Flaticon</a>
//<a href="https://www.flaticon.com/free-icons/luck" title="luck icons">Luck icons created by Freepik - Flaticon</a>
//<a href="https://www.flaticon.com/free-icons/game" title="game icons">Game icons created by Freepik - Flaticon</a>

//Récuperation du score des joueurs
var scoreJoueur1 = parseInt(document.getElementById('scoreJ1').innerHTML);
var scoreJoueur2 = parseInt(document.getElementById('scoreJ2').innerHTML);

//Recuperation du resultat d'un lancer de dés'
var resultatDe1 = parseInt(document.getElementById('resultDe1').innerHTML);
var resultatDe2 = parseInt(document.getElementById('resultDe2').innerHTML);

// Gestion de l'apparation du 
if (scoreJoueur1 > 9 || scoreJoueur2 > 9) {
    document.querySelector('.bg-modal').style.display = 'flex';
} else {
    document.querySelector('.bg-modal').style.display = 'none';
}

//Gestion de l'apparition des dés 
//Gauche
if (resultatDe1 == 1) {
    document.getElementById('Gde1').style.display = 'flex';
} else {
    document.getElementById('Gde1').style.display = 'none';
}

if (resultatDe1 == 2) {
    document.getElementById('Gde2').style.display = 'flex';
} else {
    document.getElementById('Gde2').style.display = 'none';
}

if (resultatDe1 == 3) {
    document.getElementById('Gde3').style.display = 'flex';
} else {
    document.getElementById('Gde3').style.display = 'none';
}

if (resultatDe1 == 4) {
    document.getElementById('Gde4').style.display = 'flex';
} else {
    document.getElementById('Gde4').style.display = 'none';
}

if (resultatDe1 == 5) {
    document.getElementById('Gde5').style.display = 'flex';
} else {
    document.getElementById('Gde5').style.display = 'none';
}

if (resultatDe1 == 6) {
    document.getElementById('Gde6').style.display = 'flex';
} else {
    document.getElementById('Gde6').style.display = 'none';
}

//Droite
if (resultatDe2 == 1) {
    document.getElementById('Dde1').style.display = 'flex';
} else {
    document.getElementById('Dde1').style.display = 'none';
}

if (resultatDe2 == 2) {
    document.getElementById('Dde2').style.display = 'flex';
} else {
    document.getElementById('Dde2').style.display = 'none';
}

if (resultatDe2 == 3) {
    document.getElementById('Dde3').style.display = 'flex';
} else {
    document.getElementById('Dde3').style.display = 'none';
}

if (resultatDe2 == 4) {
    document.getElementById('Dde4').style.display = 'flex';
} else {
    document.getElementById('Dde4').style.display = 'none';
}

if (resultatDe2 == 5) {
    document.getElementById('Dde5').style.display = 'flex';
} else {
    document.getElementById('Dde5').style.display = 'none';
}

if (resultatDe2 == 6) {
    document.getElementById('Dde6').style.display = 'flex';
} else {
    document.getElementById('Dde6').style.display = 'none';
}