document.addEventListener('DOMContentLoaded', (event) => {
  const passwordLengthRange = document.querySelector(".password-length-range");
  const generateButton = document.getElementById("generate_password");
  const copyButton = document.getElementById("copy-btn");

  const lowercaseCheckbox = document.getElementById("lowercase");
  const uppercaseCheckbox = document.getElementById("uppercase");
  const numbersCheckbox = document.getElementById("numbers");
  const symbolsCheckbox = document.getElementById("symbols");
  const passfield1 = document.getElementById("passfield1");

  function setPasswordStrength(passwordLength) {
    const passwordStrength = document.querySelector(".password_strength");

    const weakPasswordMaxLength = 9;
    const semiWeakPasswordMaxLength = 20;
    const goodPasswordMaxLength = 40;

    if (passwordLength <= weakPasswordMaxLength) {
      passwordStrength.style.backgroundColor = "#f44336";
      passwordStrength.style.width = "15%";
    } else if (passwordLength <= semiWeakPasswordMaxLength) {
      passwordStrength.style.backgroundColor = "#ff9800";
      passwordStrength.style.width = "45%";
    } else if (passwordLength <= goodPasswordMaxLength) {
      passwordStrength.style.backgroundColor = "#4caf50";
      passwordStrength.style.width = "75%";
    } else {
      passwordStrength.style.backgroundColor = "#388e3c";
      passwordStrength.style.width = "100%";
    }
  }

  function passwordLength(e) {
    let lengthDisplay = document.querySelector(".length-display");

    lengthDisplay.innerText = e.target.value;
    setPasswordStrength(e.target.value);

    generatePassword();

    return;
  }

  if (passwordLengthRange) {
    passwordLengthRange.addEventListener("input", passwordLength);
    passwordLengthRange.addEventListener("change", passwordLength);
  }

  function copyPassword() {
    const passfield = document.getElementById("passfield1");
    passfield.select();
    passfield.setSelectionRange(0, 99999);
    document.execCommand("copy");

    // Change the button text to "Copied To Clipboard"
    copyButton.textContent = 'Copied To Clipboard';
    
    // Optionally, reset the text back to "Copy Password" after a delay
    setTimeout(() => {
      copyButton.textContent = 'Copy Password';
    }, 2000); // Change text back after 2 seconds
  }

  if (copyButton) {
    copyButton.addEventListener("click", copyPassword);
  }

  function generatePassword() {
    let lowerletters = "";
    let upperletters = "";
    let numbers = "";
    let symbols = "";
    let generatedPassword = "";

    if (
      !lowercaseCheckbox.checked &&
      !uppercaseCheckbox.checked &&
      !numbersCheckbox.checked &&
      !symbolsCheckbox.checked
    ) {
      let feedbackElement = document.querySelector(".error-wrapper");
      feedbackElement.style.display = "block";
      feedbackElement.children[0].innerText = "No option selected";
      setTimeout(() => {
        feedbackElement.style.display = "";
      }, 3000);
      return;
    }

    if (lowercaseCheckbox.checked) {
      lowerletters = "abcdefghijklmnopqrstuvwxyz"
        .repeat(4)
        .split("")
        .sort(() => 0.5 - Math.random())
        .join("")
        .slice(0, passwordLengthRange.value);
      generatedPassword += lowerletters;
    }

    if (uppercaseCheckbox.checked) {
      upperletters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
        .repeat(4)
        .split("")
        .sort(() => 0.5 - Math.random())
        .join("")
        .slice(0, passwordLengthRange.value);
      generatedPassword += upperletters;
    }

    if (numbersCheckbox.checked) {
      numbers = "0123456789"
        .repeat(10)
        .split("")
        .sort(() => 0.5 - Math.random())
        .join("")
        .slice(0, passwordLengthRange.value);
      generatedPassword += numbers;
    }

    if (symbolsCheckbox.checked) {
      symbols = "~`!@#$%^&*()_-+={[}]|\\:;\"'<,>.?/"
        .repeat(4)
        .split("")
        .sort(() => 0.5 - Math.random())
        .join("")
        .slice(0, passwordLengthRange.value);
      generatedPassword += symbols;
    }

    generatedPassword = generatedPassword
      .split("")
      .sort(() => 0.5 - Math.random())
      .join("")
      .slice(0, passwordLengthRange.value);

    passfield1.value = generatedPassword;

    return;
  }

  if (generateButton) {
    generateButton.addEventListener("click", generatePassword);
  }
});
