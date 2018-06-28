const history = document.querySelector('.combat-history-container');
const historyOverlay = document.querySelector('.combat-history-overlay');

history.addEventListener('click', () => {
    historyOverlay.classList.toggle('slide-open');
});