const form = document.querySelector("form");
const formInputs = document.querySelectorAll(
  "input[type=password], input[type=text], input[type=email]"
);

formInputs.forEach((input) => {
  input.addEventListener("input", () => {
    const errorDiv = document.querySelector(`input[name=${input.name}] + div`);
    if (input.checkValidity()) {
      errorDiv.textContent = "";
    } else {
      errorDiv.textContent = input.validationMessage;
    }
  });
});
