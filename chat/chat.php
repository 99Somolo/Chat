<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
include_once "./PHP/header.php";
?>

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
        include_once "./PHP/config.php";
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");

        if (mysqli_num_rows($sql) > 0) {

          $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <a href="./users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="./fichier_telecharger/<?= $row['image'] ?>" alt="" />
        <div class="details">
          <span><?= $row['nom'] . " " . $row['prenom'] ?></span>
          <p><?= $row['status'] ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" value="<?= $_SESSION['unique_id'] ?>" name="outgoing_id" hidden>
        <input type="text" value="<?= $user_id ?>" name="incoming_id" hidden>
        <input type="text" name="message" class="input-field" placeholder="Ecrire un message ici..." />
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="./javascript/chat.js"></script>
</body>

</html>