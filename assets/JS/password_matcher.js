const passwordField = document.querySelector("input[name=user_password]");
const confirmationField = document.querySelector(
  "input[name=confirm-password]"
);

let password = "";
let confirmation = "";

passwordField.addEventListener("input", () => {
  password = passwordField.value;
});

confirmationField.addEventListener("input", (e) => {
  confirmation = confirmationField.value;
  const errorDiv = document.querySelector(
    `input[name=${confirmationField.name}] + div`
  );

  if (password !== confirmation) {
    errorDiv.classList.remove("match");
    errorDiv.textContent = "Passwords should match";
    confirmationField.setCustomValidity("Passwords should match");
  } else {
    errorDiv.textContent = "Passwords match!";
    confirmationField.setCustomValidity("");
    errorDiv.classList.add("match");
  }
});
