// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap';
import './updateText';

let prevScrollPos = window.pageYOffset;
const navbar = document.querySelector('.navbar');

// Check if the screen width is greater than 768px (desktop size)
if (window.innerWidth > 768) {
  window.addEventListener('scroll', () => {
    const currentScrollPos = window.pageYOffset;

    if (prevScrollPos > currentScrollPos) {
      // Scrolling up
      navbar.classList.remove('navbar-hidden');
    } else {
      // Scrolling down
      navbar.classList.add('navbar-hidden');
    }

    prevScrollPos = currentScrollPos;
  });
}
