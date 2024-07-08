document.addEventListener("DOMContentLoaded", function () {
  const counterEl = document.querySelector(".counter");
  const barEl = document.querySelector(".loading-bar-front");
  let idx = 0;

  function updateNum() {
    counterEl.textContent = `${idx}%`;
    barEl.style.width = `${idx}%`;
    idx++;
    if (idx <= 100) {
      setTimeout(updateNum, 20);
    }
  }

  updateNum();
});