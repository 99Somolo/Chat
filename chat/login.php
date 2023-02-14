<?php
session_start();

if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}
?>

<?php include_once "./PHP/header.php"; ?>

<body>
  <div class="wrapper">
    <section class="form login">
      <header>Realtime chat</header>
      <form action="#" enctype="multipart/form-data" autocomplete="off">
        <div class="error-txt"></div>
        <div class="field input">
          <label for="email">Adresse email</label>
          <input type="text" name="email" id="email" placeholder="votre email" required />
        </div>
        <div class="field input">
          <label for="mdp">Mot de passe</label>
          <input type="password" name="mdp" id="mdp" placeholder="votre mot de passe" required />
          <i class="fa fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" value="Soumettre" />
        </div>
      </form>
      <div class="link">
        Pas encore un compte?<a href="./index.php">s'incrire maintenant</a>
      </div>
    </section>
  </div>

  <script src="./javascript/pass-show-hide.js"></script>
  <script src="./javascript/login.js"></script>
</body>

</html>