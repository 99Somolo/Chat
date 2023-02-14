<?php

// $host = "localhost";
// $dbname = "chat";
// $user = "root";
// $mdp = "";

// try {
//     $conn = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $mdp);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $exc) {
//     echo "erreur " . $exc->getMessage();
// }

$conn = mysqli_connect("localhost", "root", "", "chat");
if (!$conn) {
    echo "Connexion base des données " . mysqli_connect_error();
}
