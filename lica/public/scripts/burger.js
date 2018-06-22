const burger = document.getElementById('burger');
const burger_open = document.getElementById('burger-open');
const burger_close = document.getElementById('burger-close');

burger_open.addEventListener('click', () => {
   burger.classList.toggle('active');
   burger.classList.toggle('inactive');
   burger_open.style.display = 'none';
});

burger_close.addEventListener('click', () => {
    burger.classList.toggle('active');
    burger.classList.toggle('inactive');
    burger_open.style.display = 'block';
});