//PROJECT 1

import React, { useState } from "react";

function ColorPicker() {
  //Déclaration de l'état et du modificateur : const [color, setColor] = useState("#FFFFFF") déclare l'état color et la fonction setColor pour le mettre à jour.
  //useState est utilisé ici pour l'initialisation de l'état.
  const [color, setColor] = useState("#FFFFFF");

  // l'évenement onChange déclanche donc la fonction handleColorChange :
  // handleColorChange utilise event.target.value pour obtenir la nouvelle valeur sélectionnée et la passe à setColor pour mettre à jour l'état
  // event.target est une référence à l'objet auquel l'event à été attributé.
  /*
    event.target.value : Pour les éléments de formulaire comme les champs de texte (<input type="text">), les cases à cocher (<input type="checkbox">), les boutons radio (<input type="radio">), 
    et le sélecteur de couleur (<input type="color">), la propriété value de event.target contient la valeur actuelle de l'élément. 
    Par exemple, pour un champ de texte, event.target.value donnerait la chaîne de caractères actuellement saisie dans le champ. 
    Pour un sélecteur de couleur, event.target.value donnerait la représentation hexadécimale de la couleur sélectionnée.
    */
  function handleColorChange(event) {
    setColor(event.target.value);
  }

  return (
    <div className="color-picker-container">
      <h1>Color Picker</h1>
      <div className="color-display" style={{ backgroundColor: color }}>
        {" "}
        {/*container de color*/}
        <p>Selected Color : {color}</p>
      </div>
      <label>Select a Color :</label>
      <input type="color" value={color} onChange={handleColorChange}></input>
      {/*onChange est le déclancheur de handleColorChange car la fonction est entre bracket*/}
    </div>
  );
}

export default ColorPicker;
