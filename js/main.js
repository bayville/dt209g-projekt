const hamburger = document.getElementById('hamburger');
const menu = document.getElementById('navbar__nav');
const closeButton = document.getElementById('close-menu');

// Öppna menyn
hamburger.addEventListener('click', () => {
  menu.classList.add('navbar__nav--open');
});

// Stäng menyn
closeButton.addEventListener('click', () => {
  menu.classList.remove('navbar__nav--open');
});
