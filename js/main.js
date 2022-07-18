// Afficher le is active
const inputator = document.querySelector('.inputator');
const dropper = document.querySelector('.dropdown');
console.log (dropper);

inputator.addEventListener('focusin', function(event) { 
  dropper.classList.add("is-active");
  });

  inputator.addEventListener('focusout', function(event) { 
    dropper.classList.remove("is-active");
    });