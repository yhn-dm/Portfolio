/*  
Prénom : 2 lettre minimum et sans chiffre, message d'erreur si vide ou condition non respecté
Nom : 2 lettre minimum et sans chiffre, message d'erreur si vide ou condition non respecté
Email : condition non vide, ___@___.__ = débute avec au moins 1 lettre/chiffre, @, continue avec au moins 1 lettre/chiffre, un point et continue avec au moins 1 lettre/chiffre, 
message d'erreur si email invalide
Mot de passe : censurée, conditions non vide, 1 maj, 1min, 1chiffre, 1symbole, message en cas de vide, message en cas de condition non respecté


*/

document.addEventListener('DOMContentLoaded', () => {
    const btnSubmit = document.getElementById('submit');
    btnSubmit.addEventListener('click', (event) => {
        event.preventDefault();  // Prevents form submission

        const nameInput = document.getElementById('nameInput');
        const nameError = document.getElementById('nameError');
        const lastnameInput = document.getElementById('lastnameInput');
        const lastnameError = document.getElementById('lastnameError');
        const emailInput = document.getElementById('emailInput');
        const emailError = document.getElementById('emailError');
        const passwordInput = document.getElementById('passwordInput');
        const passwordError = document.getElementById('passwordError');
        const submitAccepted = document.getElementById('submitAccepted');
        submitAccepted.textContent = '';
        
        let nameisValid = false;
        let lastnameisValid = false;
        let emailisValid = false;
        let passwordisValid = false;

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex for email validation
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.#^_])[A-Za-z\d@$!%*?&.#^_]{8,}$/; // Regex for password validation


        // Validate Name
        if (nameInput.value === '') {
            displayMessage(nameError, 'Name cannot be empty.', 'red');
        } else {
            nameError.textContent = '';
            nameisValid = true;
        }

        // Validate Last Name
        if (lastnameInput.value === '') {
            displayMessage(lastnameError, 'Last name cannot be empty.', 'red');
        } else {
            lastnameError.textContent = '';
            lastnameisValid = true;
        }
        
        // Validate Email
        if (emailInput.value === '') {
            displayMessage(emailError, 'Email cannot be empty.', 'red');
        } else if (!emailRegex.test(emailInput.value)) {
            displayMessage(emailError, 'Enter a valid email, please.', 'red');
        } else {
            emailError.textContent = '';
            emailisValid = true;
        }

        // Validate Password
        if (passwordInput.value === '') {
            displayMessage(passwordError, 'Password cannot be empty.', 'red');
        } else if (passwordInput.value.length < 8) {
            displayMessage(passwordError, 'Your Password must be at least 8 characters', 'red');
        } else if (passwordInput.value.length > 15) {
            displayMessage(passwordError, 'Your Password must not exceed 15 characters', 'red');
        } else if (!passwordRegex.test(passwordInput.value)) {
            displayMessage(passwordError, 'Your Password must at least contain 1 lowercase character, 1 uppercase character, 1 number, and 1 symbol', 'red');
            console.log("Regex test result:", passwordRegex.test(passwordInput.value));
        } else {
            passwordError.textContent = '';
            passwordisValid = true;
        }

        // Check if all fields are valid
        if (nameisValid && lastnameisValid && emailisValid && passwordisValid) {
            nameInput.value = '';
            lastnameInput.value = '';
            emailInput.value = '';
            passwordInput.value = '';
            
            submitAccepted.textContent = 'Form valid and submitted!';
            submitAccepted.style.color = 'green';  // Optional: set text color
        }
    });

    function displayMessage(container, message, color) {
        container.textContent = message;
        container.style.color = color;
    }
});

