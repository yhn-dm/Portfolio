document.addEventListener('DOMContentLoaded', function() {
    const bonnesReponses = {
        q1: 'b', 
        q2: 'b', 
        q3: 'c', 
        q4: 'b', 
        q5: 'c', 
    };

    document.querySelector('.btn button').addEventListener('click', function() {
        let score = 0;
        Object.keys(bonnesReponses).forEach(question => {
            const reponseDonnee = document.querySelector(`input[name="${question}"]:checked`).value;
            if (reponseDonnee === bonnesReponses[question]) {
                score++; 
            }
        });

        let resultatMessage = '';
        if (score == 5) {
            resultatMessage = `Ton score est de ${score} sur ${Object.keys(bonnesReponses).length}, Parfait !`;
        } else if (score >= 3) {
            resultatMessage = `Ton score est de ${score} sur ${Object.keys(bonnesReponses).length}, t'y es presque !`;
        } else if (score > 0) {
            resultatMessage = `Ton score est de ${score} sur ${Object.keys(bonnesReponses).length}, tu peux mieux faire !!`;
        } else {
            resultatMessage = `Ton score est de ${score} sur ${Object.keys(bonnesReponses).length}, essaie encore !`;
        }

        document.querySelector('.resultats').textContent = resultatMessage;
    });
});

/*/

const form = document.querySelector('.button'); // on cible l'élément HTML avec querySelector
let tableauResults = [];
form.addEventListener('submit', (e) => {
    e.preventDefault() //pas de rechargement de la page ou de redirec après soumission du formulaire
}
)

for(i = 1; i < 6; i++){
    tableauResults.push(document.querySelector('input[name="q${i}"]:checked').value)}

verifFunc(tableauResultats);
tableauResultats = [];
}
/*/