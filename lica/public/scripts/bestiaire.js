const selection = document.querySelector('.bestiaire-selection-scrolldown-title');
const scrolldown = document.querySelector('.bestiaire-selection-scrolldown-menu');
const sure = document.querySelectorAll('.bestiaire-aliens-card-adopter');



selection.addEventListener('click', () => {
    scrolldown.classList.toggle('is-open')
});

for (let i = 0; i < sure.length; i++) {
    sure[i].addEventListener('click', function() {
        this.nextElementSibling.classList.toggle('is-open');
    });
}
