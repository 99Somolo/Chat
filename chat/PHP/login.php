<?php
session_start();
include_once "./config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$mdp = mysqli_real_escape_string($conn, $_POST['mdp']);

if (!empty($email) && !empty($mdp)) {

    // vérifier l'email et mot de passe s'il correspond aux données de la base de données
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND mdp = '{$mdp}'");
    if (
        mysqli_num_rows($sql) > 0
    ) {

        $status = "en ligne";
        $row = mysqli_fetch_assoc($sql);
        $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");

        if ($sql2) {
            $_SESSION['unique_id'] = $row['unique_id']; // stocké l'unique_id dans la session 
            echo 'Succès';
        }
    } else {
        echo "L'email ou le mot de passe est incorrect";
    }
} else {
    echo "Tous les champs sont requis";
}
