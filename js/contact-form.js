function validateFirstname(name) {
  var name = document.forms[name]["first-name"].value;
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
function validateLastname(name) {
  var name = document.forms[name]["last-name"].value;
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
function validateEmail(name) {
  var email = document.forms[name]["email"].value;
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

function validatePhoneNum(name){
  var phoneNum = document.forms[name]["your-number"].value;
  var phoneNum_regex = /^\d{8}$/;
  var check = phoneNum_regex.test(phoneNum);
  if (!check) {
    document.getElementById("errorPhone").innerHTML =
      "Phone number should contains 8 digits, please try again";
  } else {
    document.getElementById("errorPhone").innerHTML = "";
  }
}

function validateCardNum(name){
  var cardNum = document.forms[name]["your-card-no"].value;
  var cvv = document.forms[name]["your-cvv"].value;
  var cvv_regex = /^\d{3}$/;
  var cardNum_regex = /^\d+$/;
  if (! (cardNum_regex.test(cardNum) && cvv_regex.test(cvv)) ) {
    document.getElementById("errorCard").innerHTML =
      "Card number format is wrong, please try again";
  } else {
    document.getElementById("errorCard").innerHTML = "";
  }
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

function checkCheckoutForm() {
  if (
    document.getElementById("errorName").innerHTML != "" ||
    document.getElementById("errorLastname").innerHTML != "" ||
    document.getElementById("errorEmail").innerHTML != "" ||
    document.getElementById("errorCard").innerHTML != "" ||
    document.getElementById("errorPhone").innerHTML != "" 
  ) {
    alert("There is an error in one of the form fields!");
    event.preventDefault();
  }
}
