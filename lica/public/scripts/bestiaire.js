const selection = document.querySelector('.bestiaire-selection-scrolldown-title');
const scrolldown = document.querySelector('.bestiaire-selection-scrolldown-menu');
const sure = document.querySelectorAll('.bestiaire-aliens-card-button');
const adopt = document.querySelector('.bestiaire-aliens-card-adopter');
const aliens_details = document.querySelector('.bestiaire-aliens-modal');
const validate = document.querySelector('.bestiaire-aliens-card-adopter-overlay');
const exit_button = document.querySelector('.bestiaire-aliens-modal-content-cross');



selection.addEventListener('click', () => {
    scrolldown.classList.toggle('is-open');
});

for (let i = 0; i < sure.length; i++) {
    sure[i].addEventListener('click', () => {
        aliens_details.style.display = 'block';
    });
}

adopt.addEventListener('click', () => {
    validate.classList.toggle('is-open');
});

exit_button.addEventListener('click', () => {
    aliens_details.style.display = 'none';
});