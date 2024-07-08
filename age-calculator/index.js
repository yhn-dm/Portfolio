document.addEventListener("DOMContentLoaded", function () {
  const btnEl = document.getElementById("btn");
  const birthdayEl = document.getElementById("birthday");
  const resultEl = document.getElementById("result");

  btnEl.addEventListener("click", function () {
      const birthdayValue = birthdayEl.value;
      if (!birthdayValue) {
          alert("Please enter your birthday");
      } else {
          const age = calculateAge(birthdayValue);
          resultEl.textContent = `Your age is ${age} ${age > 1 ? "years" : "year"} old`;
      }
  });

  function calculateAge(birthdayValue) {
      const currentDate = new Date();
      const birthdayDate = new Date(birthdayValue);
      let age = currentDate.getFullYear() - birthdayDate.getFullYear();
      const monthDiff = currentDate.getMonth() - birthdayDate.getMonth();
      
      if (monthDiff < 0 || (monthDiff === 0 && currentDate.getDate() < birthdayDate.getDate())) {
          age--;
      }

      return age;
  }
});