const form = document.querySelector(".login form");
continueBtn = form.querySelector(".button input");
errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  // ajax
  let xhr = new XMLHttpRequest(); // création d'object XML
  xhr.open("POST", "PHP/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "Succès") {
          location.href = "users.php";
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };
  // envoyer les données à partir d'ajax jusqu'à PHP
  let formData = new FormData(form); // création d'un nouveau object formData

  xhr.send(formData); //envoyer le form data au PHP
};
