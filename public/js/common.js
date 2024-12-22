//fade-in
document.addEventListener('DOMContentLoaded', function () {
    var elements = document.querySelectorAll('.fade-in');

    function checkVisibility() {
        elements.forEach(function (element) {
            var rect = element.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                element.classList.add('visible');
            } else {
                element.classList.remove('visible');
            }
        });
    }

    window.addEventListener('scroll', checkVisibility);
    checkVisibility(); // Initial check
});


//slide up
document.addEventListener('DOMContentLoaded', function () {
    var elements = document.querySelectorAll('.slide-up');

    function checkVisibility() {
        elements.forEach(function (element) {
            var rect = element.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                element.classList.add('visible');
            } 
        });
    }

    window.addEventListener('scroll', checkVisibility);
    checkVisibility(); // Initial check
});