const greetSpan = document.querySelector(".greet");

const dateObject = new Date();

const hours = dateObject.getHours();

if (hours >= 5 && hours < 12) {
  greetSpan.textContent = "Good morning, ";
} else if (hours >= 12 && hours < 17) {
  greetSpan.textContent = "Good afternoon, ";
} else {
  greetSpan.textContent = "Good evening, ";
}
