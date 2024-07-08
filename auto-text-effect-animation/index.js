document.addEventListener("DOMContentLoaded", function () {
    const containerEl = document.querySelector(".container");

    const careers = ["YouTuber", "Web Developer", "Freelancer", "Instructor"];
    let careerIndex = 0;
    let characterIndex = 0;

    function updateText() {
        characterIndex++;
        containerEl.innerHTML = `
            <h1>I am ${careers[careerIndex].charAt(0) === "I" ? "an" : "a"} ${careers[careerIndex].slice(0, characterIndex)}</h1>
        `;

        if (characterIndex === careers[careerIndex].length) {
            careerIndex++;
            characterIndex = 0;
        }

        if (careerIndex === careers.length) {
            careerIndex = 0;
        }

        setTimeout(updateText, 100);
    }

    updateText();
});