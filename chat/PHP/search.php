<?php
session_start();

include_once "./config.php";

$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

$outgoing_id = $_SESSION['unique_id'];

$output = '';

$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (nom LIKE '%{$searchTerm}%' OR prenom LIKE '%{$searchTerm}%')");

if (mysqli_num_rows($sql) > 0) {

    include "./data.php";
} else {
    $output .= "Aucun utilisateur trouvé en relation avec votre recherche";
}

echo $output;
