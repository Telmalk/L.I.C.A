document.querySelector('.back-to-top').addEventListener('click', () => {
    window.scroll({
        top: 0,
        left: 0,
        behavior: 'smooth'
    });
});