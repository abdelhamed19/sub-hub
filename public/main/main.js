function scrollToSection(id) {
    const element = document.getElementById(id);
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth'
        });
    }
}

function redirectToBeforeAuth() {
    const button = document.querySelector('.cta-button');
    const url = button.getAttribute('data-before-auth-url');
    window.location.href = url;
}
