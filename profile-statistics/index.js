document.addEventListener("DOMContentLoaded", function () {
  const countersEl = document.querySelectorAll(".counter");

  countersEl.forEach((counterEl) => {
    counterEl.innerText = "0";
    incrementCounter(counterEl);
  });

  function incrementCounter(counterEl) {
    let currentNum = +counterEl.innerText;
    const dataCeil = +counterEl.getAttribute("data-ceil");
    const increment = dataCeil / 15;

    function updateCounter() {
      currentNum += increment;

      if (currentNum < dataCeil) {
        counterEl.innerText = Math.ceil(currentNum);
        setTimeout(updateCounter, 50);
      } else {
        counterEl.innerText = dataCeil;
      }
    }

    updateCounter();
  }
});