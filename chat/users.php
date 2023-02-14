<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
include_once "./PHP/header.php";
?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <?php
        include_once "./PHP/config.php";
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

        if (mysqli_num_rows($sql) > 0) {

          $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <div class="content">
          <img src="./fichier_telecharger/<?= $row['image'] ?>" alt="" />
          <div class="details">
            <span><?= $row['nom'] . " " . $row['prenom'] ?></span>
            <p><?= $row['status'] ?></p>
          </div>
        </div>
        <a class="logout" href="./PHP/logout.php?logout_id=<?= $row['unique_id'] ?>">Deconnexion</a>
      </header>
      <div class="search">
        <span class="text">Selectioner un utilisateur pour parler</span>
        <input type="text" placeholder="Entrer le nom à rechercher... " />
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>
  <script src="./javascript/users.js"></script>
</body>

</html>