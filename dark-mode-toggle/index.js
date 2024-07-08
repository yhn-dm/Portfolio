document.addEventListener("DOMContentLoaded", function () {
  const inputEl = document.querySelector(".input");
  const bodyEl = document.querySelector("body");

  inputEl.checked = JSON.parse(localStorage.getItem("mode"));

  updateBody();

  function updateBody() {
      if (inputEl.checked) {
          bodyEl.style.background = "black";
          bodyEl.style.color = "white";  // Ajouté pour garantir que le texte soit visible en mode sombre
      } else {
          bodyEl.style.background = "white";
          bodyEl.style.color = "black";  // Ajouté pour garantir que le texte soit visible en mode clair
      }
  }

  inputEl.addEventListener("input", () => {
      updateBody();
      updateLocalStorage();
  });

  function updateLocalStorage() {
      localStorage.setItem("mode", JSON.stringify(inputEl.checked));
  }
});