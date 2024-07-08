document.addEventListener("DOMContentLoaded", function() {

    const shareButton = document.querySelector('.share-button');

    const floatingCont = document.getElementById('floatingcont');


    shareButton.addEventListener('click', function() {

        if (floatingCont.style.display === 'none' || floatingCont.style.display === '') {
            floatingCont.style.display = 'block';
        } else {
            floatingCont.style.display = 'none';
        }
    });
});