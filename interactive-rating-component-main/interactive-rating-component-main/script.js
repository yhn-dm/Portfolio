document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll('.button');
    const submitBtn = document.querySelector('.summit-btn');
    const firstContainer = document.querySelector('.firstcontainer');
    const secondContainer = document.querySelector('.secondcontainer');
    const selectedRate = document.querySelector('.selected-rate');

    let rating = 0; 

    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            rating = this.textContent;
            buttons.forEach(btn => btn.style.backgroundColor = 'hsl(216, 12%, 54%, 0.1)'); 
            this.style.backgroundColor = 'hsl(25, 97%, 53%)'; 
        });
    });

    submitBtn.addEventListener('click', function() {
        if (rating !== 0) {
            selectedRate.innerHTML = `You selected ${rating} on 5`; 
            firstContainer.style.display = 'none'; 
            secondContainer.style.display = 'flex'; 
        } 
    });
});

