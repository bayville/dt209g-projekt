// addEventListener("DOMContentLoaded", () => {
//   const menuButton = document.querySelector('.header__menu-button');
//   const nav = document.querySelector('.nav');
  
//   // Mobile menu functionality
//   menuButton.addEventListener('click', () => {
//     console.log("click");
//     menuButton.classList.toggle('is-active');
//     nav.classList.toggle('is-open');
//     document.body.classList.toggle('menu-open');
//   });
  
//   // Close menu when clicking outside
//   document.addEventListener('click', (e) => {
  
//     if (nav.classList.contains('is-open') && 
//         !nav.contains(e.target) && 
//         !menuButton.contains(e.target)) {
//         menuButton.classList.remove('is-active');
//         nav.classList.remove('is-open');
//         document.body.classList.remove('menu-open');
//     }
//   });
// });


