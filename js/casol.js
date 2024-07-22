const slides = document.querySelectorAll('.slide');
const controls = document.querySelectorAll('.slide-control');

let currentSlide = 0;

function showSlide(n) {
  slides[currentSlide].classList.remove('active');
  controls[currentSlide].classList.remove('active');
  currentSlide = (n + slides.length) % slides.length;
  slides[currentSlide].classList.add('active');
  controls[currentSlide].classList.add('active');
}

controls.forEach((control, i) => {
  control.addEventListener('click', () => showSlide(i));
});