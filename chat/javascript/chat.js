const form = document.querySelector(".typing-area");
inputField = form.querySelector(".input-field");
sendBtn = form.querySelector("button");
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
  e.preventDefault();
};

sendBtn.onclick = () => {
  let xhr = new XMLHttpRequest(); // création d'object XML
  xhr.open("POST", "PHP/insert-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputField.value = ""; // vide le champ message lorsque les données sont  enregistrées dans la base de données
        scrollBottom();
      }
    }
  };

  // envoyer les données à partir d'ajax jusqu'à PHP
  let formData = new FormData(form); // création d'un nouveau object formData
  xhr.send(formData); //envoyer le form data au PHP
};

chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
};
chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "PHP/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;

        if (!chatBox.classList.contains("active")) {
          // si le chatBox n'a pas un classe active alors scroll automatique
          scrollBottom();
        }
      }
    }
  };

  // envoyer les données à partir d'ajax jusqu'à PHP
  let formData = new FormData(form); // création d'un nouveau object formData
  xhr.send(formData); //envoyer le form data au PHP
}, 500);

function scrollBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
