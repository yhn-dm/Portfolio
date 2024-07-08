document.addEventListener("DOMContentLoaded", function () {
  const btnEl = document.getElementById("calculate");
  const billInput = document.getElementById("bill");
  const tipInput = document.getElementById("tip");
  const totalSpan = document.getElementById("total");

  function calculateTotal() {
    const billValue = parseFloat(billInput.value);
    const tipValue = parseFloat(tipInput.value);

    if (isNaN(billValue) || isNaN(tipValue)) {
      totalSpan.innerText = "Please enter valid numbers";
      return;
    }

    const totalValue = billValue * (1 + tipValue / 100);
    totalSpan.innerText = totalValue.toFixed(2);
  }

  btnEl.addEventListener("click", calculateTotal);
});