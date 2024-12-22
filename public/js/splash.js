/* splash screen code start */
window.addEventListener('DOMContentLoaded', () => {
    // Check if splash screen has already been shown
    if (!sessionStorage.getItem('splashShown')) {
        let splash = document.querySelector('.splash');
        let logo = document.querySelector('.logo-header');
        let logoSpan = document.querySelectorAll('.logo');
        
        setTimeout(() => {
            logoSpan.forEach((span, idx) => {
                setTimeout(() => {
                    span.classList.add('active');
                }, (idx + 1) * 400);
            });
            
            setTimeout(() => {
                logoSpan.forEach((span, idx) => {
                    setTimeout(() => {
                        span.classList.remove('active');
                        span.classList.add('fade');
                    }, (idx + 1) * 50);
                });
            }, 3000);
            
            setTimeout(() => {
                splash.style.top = '-100vh';
            }, 3500);

            // Set splash screen flag so it won't show again in this session
            sessionStorage.setItem('splashShown', true);
        });
    } else {
        // Immediately hide the splash screen if it has already been shown
        document.querySelector('.splash').style.display = 'none';
    }
});
/* splash screen code end */
