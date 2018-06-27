const selection = document.querySelector('.bestiaire-selection-scrolldown-title');
const scrolldown = document.querySelector('.bestiaire-selection-scrolldown-menu');

selection.addEventListener('click', () => {
    scrolldown.classList.toggle('is-open')
});
