function updateText() {
  var skillsText = document.getElementById('skillsText');
  var skills = ['HTML', 'CSS', 'JavaScript', 'PHP', 'MySQL'];
  var currentIndex = 0;

  function setText() {
    skillsText.textContent = skills[currentIndex];
  }

  setText();

  setInterval(function () {
    currentIndex = (currentIndex + 1) % skills.length;
    setText();
  }, 3000);
}

document.addEventListener('DOMContentLoaded', updateText);
