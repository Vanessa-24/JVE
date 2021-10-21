function validateFirstname() {
  var name = document.forms["contact-form"]["first-name"].value;
  var name_regex = /^[A-Za-z\s]+$/;
  var check = name_regex.test(name);
  if (!check) {
    document.getElementById("errorName").innerHTML =
      "For name, please only enter alphabets!";
  } else {
    document.getElementById("errorName").innerHTML = "";
  }
  console.log(check);
}
function validateLastname() {
  var name = document.forms["contact-form"]["last-name"].value;
  var name_regex = /^[A-Za-z\s]+$/;
  var check = name_regex.test(name);
  if (!check) {
    document.getElementById("errorLastname").innerHTML =
      "For name, please only enter alphabets!";
  } else {
    document.getElementById("errorLastname").innerHTML = "";
  }
  console.log(check);
}
function validateEmail() {
  var email = document.forms["contact-form"]["email"].value;
  var email_regex = /^[\w\.-]+@[\w]+(\.[\w]+){0,2}\.([a-z]){2,3}$/;
  var check = email_regex.test(email);
  if (!check) {
    document.getElementById("errorEmail").innerHTML =
      "Email format is wrong, please try again";
  } else {
    document.getElementById("errorEmail").innerHTML = "";
  }
  console.log(check);
}
function checkForm() {
  if (
    document.getElementById("errorName").innerHTML != "" ||
    document.getElementById("errorLastname").innerHTML != "" ||
    document.getElementById("errorEmail").innerHTML != ""
  ) {
    alert("There is an error in one of the form fields!");
    event.preventDefault();
  }
}
