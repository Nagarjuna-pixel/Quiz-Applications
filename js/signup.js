// Function to validate user input and display errors in red
function validateInput() {
    const username = document.getElementById("username").value;
    const mobileNo = document.getElementById("mobileno").value;
    const age = document.getElementById("age").value;
    const email = document.getElementById("email-address").value;
    const password = document.getElementById("password").value;
  
    const errorMessages = [];
  
    // Regular expressions for validation
    const usernamePattern = /^[a-zA-Z0-9_]{3,20}$/;
    const mobilenoPattern = /^\d{10}$/;
    const agePattern = /^(0?[1-9]|[1-9][0-9])$/;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
  
    if (!username.match(usernamePattern)) {
      errorMessages.push("Invalid username. It should be 3-20 characters long and can only contain letters, numbers, and underscores.");
      document.getElementById("username").style.borderColor = "red";
    } else {
      document.getElementById("username").style.borderColor = "";
    }
  
    if (!mobileNo.match(mobileNoPattern)) {
      errorMessages.push("Invalid mobile number. It should be 10 digits.");
      document.getElementById("mobileNo").style.borderColor = "red";
    } else {
      document.getElementById("mobileNo").style.borderColor = "";
    }
  
    if (!age.match(agePattern)) {
      errorMessages.push("Invalid age. Age should be a positive integer.");
      document.getElementById("age").style.borderColor = "red";
    } else {
      document.getElementById("age").style.borderColor = "";
    }
  
    if (!email.match(emailPattern)) {
      errorMessages.push("Invalid email address.");
      document.getElementById("email").style.borderColor = "red";
    } else {
      document.getElementById("email").style.borderColor = "";
    }
  
    if (!password.match(passwordPattern)) {
      errorMessages.push("Invalid password. It should contain at least 1 uppercase letter, 1 lowercase letter, 1 digit, 1 special character, and be at least 8 characters long.");
      document.getElementById("password").style.borderColor = "red";
    } else {
      document.getElementById("password").style.borderColor = "";
    }
  
    // Display error messages in red
    const errorElement = document.getElementById("error-messages");
    errorElement.innerHTML = "";
    errorMessages.forEach((message) => {
      const errorMessage = document.createElement("div");
      errorMessage.style.color = "red";
      errorMessage.textContent = message;
      errorElement.appendChild(errorMessage);
    });
  
    if (errorMessages.length > 0) {
      return false;
    }
  
    // If all validations pass, you can proceed with saving the data to the database or taking other actions
    // Replace this part with your database logic
  
    return true;
  }
  