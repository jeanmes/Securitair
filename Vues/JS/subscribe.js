//confirmation envoie du formulaire
function formSubmit() {
  confirm("Voulez-ous vous inscrire ?"); //lors de la soumission du formulaire la fonction formSubmit est appellée;
}

// vérification de l'email
function checkMail() {
  var emailField = document.getElementById("email");
  var errorMessageElement = document.getElementById("error-message");
  if (validateEmail(emailField.value) === false) {
    emailField.style.color = "red";
    emailField.focus();
    errorMessageElement.textContent = "Le mail n'est pas valide";
    errorMessageElement.style.color = "red";
  } else emailField.style.color = "green";
}

function validateEmail(email) {
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}
