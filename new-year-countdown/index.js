document.addEventListener("DOMContentLoaded", function () {
  const dayEl = document.getElementById("day");
  const hourEl = document.getElementById("hour");
  const minuteEl = document.getElementById("minute");
  const secondEl = document.getElementById("second");

  const newYearTime = new Date("Jan 1, 2024 00:00:00").getTime();

  function updateCountdown() {
    const now = new Date().getTime();
    const gap = newYearTime - now;

    const second = 1000;
    const minute = second * 60;
    const hour = minute * 60;
    const day = hour * 24;

    const d = Math.floor(gap / day);
    const h = Math.floor((gap % day) / hour);
    const m = Math.floor((gap % hour) / minute);
    const s = Math.floor((gap % minute) / second);

    dayEl.innerText = d.toString().padStart(2, "0");
    hourEl.innerText = h.toString().padStart(2, "0");
    minuteEl.innerText = m.toString().padStart(2, "0");
    secondEl.innerText = s.toString().padStart(2, "0");

    setTimeout(updateCountdown, 1000);
  }

  updateCountdown();
});