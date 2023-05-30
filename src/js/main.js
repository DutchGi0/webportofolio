// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap';
import './updateText';
import './email';

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

document.addEventListener('DOMContentLoaded', function() {
  // Get all the section elements
  const sections = document.querySelectorAll('section');

  // Get the navbar links
  const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

  // Function to check if an element is in the viewport
  function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
    );
  }

  // Function to set the active state of the navbar link
  function setActiveNav() {
    sections.forEach(function(section, index) {
      if (isInViewport(section)) {
        navLinks.forEach(function(link) {
          link.classList.remove('active');
        });
        navLinks[index].classList.add('active');
      }
    });
  }

  // Set the active state initially
  setActiveNav();

  // Listen for scroll events and update the active state
  window.addEventListener('scroll', setActiveNav);
});
