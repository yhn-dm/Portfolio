/*
let btnClear = document.querySelector('button');
btnClear.addEventListener('click', () => {
    let email = document.getElementById('email'); 
    let isEmpty = email.value === '';   

    if (!isEmpty && email.value.includes('@')) {
        email.value = '';
    } else {
        console.log("Enter a validate email please");
        preventDefault();
    }
})

*/
document.addEventListener('DOMContentLoaded', () => {
    let btnSubmit = document.getElementById('submit');
    btnSubmit.addEventListener('click', (event) => {
        event.preventDefault();  
        let email = document.getElementById('email');
        let messageContainer = document.getElementById('message-container');


        messageContainer.textContent = '';
        let isEmpty = email.value === '';

        
        if (!isEmpty && email.value.includes('@')) {

            let successMessage = document.createElement('div');
            successMessage.textContent = 'Email valid and form submitted!';
            successMessage.style.color = 'green';  
            messageContainer.appendChild(successMessage);
            email.value = '';
        } else {

            let errorMessage = document.createElement('div');
            errorMessage.textContent = 'Enter a valid email, please.';
            errorMessage.style.color = 'red';  
            messageContainer.appendChild(errorMessage);
        }
    });
});