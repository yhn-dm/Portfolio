document.addEventListener("DOMContentLoaded", function () {
    const testimonials = [
        {
            name: "Cherise G",
            photoUrl:
                "https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=880&q=80",
            text: "This is simply unbelievable! I would be lost without Apple. The very best. Not able to tell you how happy I am with Apple.",
        },
        {
            name: "Rosetta Q",
            photoUrl:
                "https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=880&q=80",
            text: "I cannot thank Apple enough for their exceptional products and services. As a loyal customer, I have been blown away by the quality and reliability of their products. I recently had the pleasure of working with Rosetta Q from Apple and I must say, she went above and beyond to ensure my satisfaction. Her knowledge and expertise in the products truly impressed me.",
        },
        {
            name: "Constantine V",
            photoUrl:
                "https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=880&q=80",
            text: "I cannot thank Apple enough for their exceptional products and services. As a loyal customer, I have been blown away by the quality and reliability of their products. I recently had the pleasure of working with Constantine V from Apple and I must say, he truly went above and beyond to ensure my satisfaction.",
        },
    ];

    const imgEl = document.querySelector("img");
    const textEl = document.querySelector(".text");
    const usernameEl = document.querySelector(".username");

    let idx = 0;

    function updateTestimonial() {
        const { name, photoUrl, text } = testimonials[idx];
        imgEl.src = photoUrl;
        textEl.innerText = text;
        usernameEl.innerText = name;
        idx++;
        if (idx === testimonials.length) {
            idx = 0;
        }
        setTimeout(updateTestimonial, 10000);
    }

    updateTestimonial();
});