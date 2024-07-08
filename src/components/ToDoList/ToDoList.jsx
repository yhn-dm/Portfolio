//PROJECT 2

import React, { useState } from "react";

function ToDoList() {
  //Initialise un tableau de taches
  const [tasks, setTasks] = useState([]);
  //Initialise une barre de création de nouvelle tache
  const [newTask, setNewTask] = useState("");

  // l'évenement onChange déclanche donc la fonction handleInputChange :
  // handleInputChange utilise event.target.value pour obtenir la nouvelle valeur sélectionnée et la passe à setNewTask pour mettre à jour l'état
  function handleInputChange(event) {
    setNewTask(event.target.value);
  }

  /* 
Vérification de la validité de la tâche : 
Avant d'ajouter la tâche, elle vérifie si la chaîne de caractères newTask n'est pas vide après avoir supprimé les espaces blancs au début et à la fin avec .trim(). 
Cela garantit qu'une tâche ne sera ajoutée que si elle contient du texte significatif.

Ajout de la tâche : Si la condition précédente est vraie, la tâche est ajoutée à la liste des tâches actuelles (tasks) en utilisant la méthode setTasks. 
La nouvelle tâche est ajoutée à la fin de la liste grâce à l'utilisation de l'opérateur spread (...t) suivi de newTask, ce qui crée une copie de toutes les tâches existantes plus la nouvelle tâche.
*/
  function addTask() {
    if (newTask.trim() !== "") {
      setTasks((t) => [...t, newTask]);
      setNewTask("");
    }
  }

  /* 
La fonction deleteTask est utilisée pour supprimer une tâche spécifique de la liste des tâches. 
Elle prend un argument index qui représente l'indice de la tâche à supprimer dans la liste. Voici comment elle fonctionne :

Création d'une nouvelle liste sans la tâche à supprimer : 
Utilisant la méthode filter, elle crée une nouvelle liste de tâches où la tâche à l'indice donné est exclue. 
La méthode filter parcourt chaque élément de la liste originale et retourne un nouvel array contenant tous les éléments sauf celui dont l'indice correspond à celui passé en argument.

Mise à jour de l'état des tâches : 
Enfin, cette nouvelle liste de tâches (sans la tâche à supprimer) est utilisée pour mettre à jour l'état des tâches (setTasks) avec la nouvelle liste.
*/
  function deleteTask(index) {
    const updatedTasks = tasks.filter((_, i) => i !== index);
    setTasks(updatedTasks);
  }

  /*
La fonction moveTaskUp prend un indice (index) comme argument, qui représente la position actuelle d'une tâche dans le tableau tasks. 
Cette fonction déplace la tâche vers le haut dans la liste, c'est-à-dire qu'elle décale la tâche actuellement à cet indice d'un rang vers le haut. 
Pour cela, elle effectue les opérations suivantes :
Vérification de la validité de l'indice : Avant de procéder au déplacement, la fonction vérifie si l'indice est supérieur à 0. 
Cela assure que la tâche n'est pas déjà au premier rang de la liste, car un indice de 0 indiquerait déjà la première position.

Création d'une copie du tableau tasks : 
Pour éviter de modifier directement le tableau original, une copie du tableau tasks est créée. 
Cela permet de travailler sur une version temporaire du tableau.

Échange des éléments : 
Les éléments du tableau à l'indice actuel et à l'indice moins un sont échangés. 
Cela déplace la tâche actuelle d'un rang vers le haut dans la liste.

Mise à jour de l'état : 
La nouvelle configuration du tableau, avec la tâche déplacée vers le haut, est ensuite utilisée pour mettre à jour l'état des tâches via setTasks.
*/
  function moveTaskUp(index) {
    if (index > 0) {
      const updatedTasks = [...tasks];
      [updatedTasks[index], updatedTasks[index - 1]] = [
        updatedTasks[index - 1],
        updatedTasks[index],
      ];
      setTasks(updatedTasks);
    }
  }

  /*
De manière similaire, la fonction moveTaskDown permet de déplacer une tâche vers le bas dans la liste. 
Elle prend également un indice (index) comme argument, représentant la position actuelle de la tâche. Voici comment elle fonctionne :

Vérification de la validité de l'indice : Comme pour moveTaskUp, la fonction vérifie si l'indice est inférieur à la longueur totale du tableau moins un. 
Cela garantit que la tâche n'est pas déjà à la dernière position de la liste.

Création d'une copie du tableau tasks : 
Une copie du tableau tasks est créée pour travailler dessus sans modifier le tableau original.

Échange des éléments : Les éléments du tableau à l'indice actuel et à l'indice plus un sont échangés. 
Cela déplace la tâche actuelle d'un rang vers le bas dans la liste.

Mise à jour de l'état : 
La nouvelle configuration du tableau, avec la tâche déplacée vers le bas, est utilisée pour mettre à jour l'état des tâches via setTasks.
*/

  function moveTaskDown(index) {
    if (index < tasks.length - 1) {
      const updatedTasks = [...tasks];
      [updatedTasks[index], updatedTasks[index + 1]] = [
        updatedTasks[index + 1],
        updatedTasks[index],
      ];
      setTasks(updatedTasks);
    }
  }

  return (
    <div className="to-do-list">
      <h1>To-Do-List</h1>
      <div>
        <input
          type="text"
          placeholder="Enter a task..."
          value={newTask}
          onChange={handleInputChange}
        />
        <button className="add-button" onClick={addTask}>
          add
        </button>
      </div>

      <ol>
        {/* tasks.map() parcourt chaque élément du tableau tasks */}
        {tasks.map((task, index) => (
          <li ket={index}>
            <span className="text">{task}</span>
            <button className="delete-button" onClick={() => deleteTask(index)}>
              Delete
            </button>
            <button className="move-button" onClick={() => moveTaskUp(index)}>
              UP
            </button>
            <button className="move-button" onClick={() => moveTaskDown(index)}>
              DOWN
            </button>
          </li>
        ))}
      </ol>
    </div>
  );
}

export default ToDoList;
