<?php
session_start();

if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}
?>
<?php include_once "./PHP/header.php"; ?>

<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Realtime chat</header>
      <form action="#" enctype="multipart/form-data" autocomplete="off">
        <div class="error-txt"></div>
        <div class="name-details">
          <div class="field input">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="votre nom" required />
          </div>
          <div class="field input">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="votre prénom" required />
          </div>
        </div>
        <div class="field input">
          <label for="email">Adresse email</label>
          <input type="text" name="email" id="email" placeholder="votre email" required />
        </div>
        <div class="field input">
          <label for="mdp">Mot de passe</label>
          <input type="password" name="mdp" id="mdp" placeholder="votre mot de passe" required />
          <i class="fa fa-eye"></i>
        </div>
        <div class="field image">
          <label for="image">Selectionner une image</label>
          <input type="file" name="image" id="image" required />
        </div>
        <div class="field button">
          <input type="submit" value="Soumettre" />
        </div>
      </form>
      <div class="link">
        déjà un compte?<a href="./login.php">se connecter maintenant</a>
      </div>
    </section>
  </div>

  <script src="./javascript/pass-show-hide.js"></script>
  <script src="./javascript/signup.js"></script>
</body>

</html>