document.addEventListener("DOMContentLoaded", function () {
    var container =
        document.querySelector('.popup-container');
    var popupButtons =
        document.querySelectorAll('.open-popup');
    var body = document.querySelector('body');
    for (let i = 0; i < popupButtons.length; i++) {
        popupButtons[i].addEventListener('click', function () {
            container.style.display = 'flex';
            body.style.overflow = 'hidden';
        });
    }
    container.addEventListener('click', function (event) {
        if (event.target == container) {
            container.style.display = 'none';
            body.style.overflow = 'visible';
        }
    });
});