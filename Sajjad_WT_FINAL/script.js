function validateForm() {
  return (
    validateNgoName() &&
    validateRegNumber() &&
    validateNgoType() &&
    validateEmail() &&
    validateAddress() &&
    validateAreaOfOperation() &&
    validateOpYears() &&
    validatePassword() &&
    validateConfirmPassword() &&
    validateTerms()
  );
}

function validateNgoName() {
  let ngoName = document.getElementById("ngo_name").value;
  document.getElementById("ngo_name_error").innerHTML = "";
  if (ngoName === "" || ngoName.length < 3) {
    document.getElementById("ngo_name_error").innerHTML = "NGO Name is required and must be at least 3 characters.";
    return false;
  }
  return true;
}

function validateRegNumber() {
  let regNumber = document.getElementById("reg_number").value;
  document.getElementById("reg_number_error").innerHTML = "";
  if (regNumber === "") {
    document.getElementById("reg_number_error").innerHTML = "Registration Number is required.";
    return false;
  }
  return true;
}

function validateNgoType() {
  let ngoType = document.getElementById("ngo_type").value;
  document.getElementById("ngo_type_error").innerHTML = "";
  if (ngoType === "") {
    document.getElementById("ngo_type_error").innerHTML = "Please select NGO Type.";
    return false;
  }
  return true;
}

function validateEmail() {
  let email = document.getElementById("email").value;
  document.getElementById("email_error").innerHTML = "";
  if (email === "") {
    document.getElementById("email_error").innerHTML = "Email is required.";
    return false;
  } else if (!validateEmailFormat(email)) {
    document.getElementById("email_error").innerHTML = "Enter a valid email address.";
    return false;
  }
  return true;
}

function validateEmailFormat(email) {
  let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

function validateAddress() {
  let address = document.getElementById("address").value;
  document.getElementById("address_error").innerHTML = "";
  if (address === "") {
    document.getElementById("address_error").innerHTML = "Physical Address is required.";
    return false;
  }
  return true;
}

function validateAreaOfOperation() {
  let local = document.getElementById("local").checked;
  let national = document.getElementById("national").checked;
  document.getElementById("area_operation_error").innerHTML = "";
  if (!local && !national) {
    document.getElementById("area_operation_error").innerHTML = "Select at least one area of operation.";
    return false;
  }
  return true;
}

function validateOpYears() {
  let opYears = document.getElementById("op_years").value;
  document.getElementById("op_years_error").innerHTML = "";
  if (opYears === "") {
    document.getElementById("op_years_error").innerHTML = "Enter number of operational years.";
    return false;
  } else if (opYears <= 0 || opYears > 50) {
    document.getElementById("op_years_error").innerHTML = "Years must be between 1 and 50.";
    return false;
  }
  return true;
}

function validatePassword() {
  let password = document.getElementById("password").value;
  document.getElementById("password_error").innerHTML = "";
  if (password.length < 8) {
    document.getElementById("password_error").innerHTML = "Password must be at least 8 characters.";
    return false;
  }
  return true;
}

function validateConfirmPassword() {
  let password = document.getElementById("password").value;
  let confirmPassword = document.getElementById("confirm_password").value;
  document.getElementById("confirm_password_error").innerHTML = "";
  if (confirmPassword !== password) {
    document.getElementById("confirm_password_error").innerHTML = "Passwords do not match.";
    return false;
  }
  return true;
}

function validateTerms() {
  let termsChecked = document.getElementById("terms").checked;
  document.getElementById("terms_error").innerHTML = "";
  if (!termsChecked) {
    document.getElementById("terms_error").innerHTML = "You must agree to the Terms and Conditions.";
    return false;
  }
  return true;
}


