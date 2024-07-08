document.querySelectorAll('.toggle-btn').forEach(button => {
    button.addEventListener('click', function () {
        var targetId = this.getAttribute('data-target');
        var para = document.getElementById(targetId);
        var img = this.querySelector('.icon');
        if (para.style.display === 'none' || para.style.display === '') {
            para.style.display = 'block';
            img.src = './assets/images/icon-minus.svg';
        } else {
            para.style.display = 'none';
            img.src = './assets/images/icon-plus.svg';
        }
    });
});