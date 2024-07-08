document.addEventListener("DOMContentLoaded", function () {
  const searchBarContainerEl = document.querySelector(".search-bar-container");
  const magnifierEl = document.querySelector(".magnifier");

  magnifierEl.addEventListener("click", function () {
      searchBarContainerEl.classList.toggle("active");
  });
});