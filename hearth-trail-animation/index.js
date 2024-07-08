document.addEventListener("DOMContentLoaded", function () {
  const bodyEl = document.querySelector("body");

  bodyEl.addEventListener("mousemove", (event) => {
    const xPos = event.offsetX;
    const yPos = event.offsetY;
    const spanEl = document.createElement("span");
    spanEl.style.left = xPos + "px";
    spanEl.style.top = yPos + "px";
    const size = Math.random() * 100;
    spanEl.style.width = size + "px";
    spanEl.style.height = size + "px";
    spanEl.style.position = "absolute";
    spanEl.style.backgroundColor = "red";  // Supposons que les coeurs sont rouges
    spanEl.style.borderRadius = "50%";  // Pour rendre les éléments circulaires
    spanEl.style.opacity = 0.7;  // Pour ajouter un peu de transparence
    spanEl.style.pointerEvents = "none";  // Pour éviter que les éléments interceptent les événements de la souris

    bodyEl.appendChild(spanEl);
    setTimeout(() => {
      spanEl.remove();
    }, 3000);
  });
});