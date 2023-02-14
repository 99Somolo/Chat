<?php

if (isset($_FILES['fichier'])) {

    $fichier_nom = $_FILES['fichier']['name']; // avoir le nom du fichier
    $fichier_tmp = $_FILES['fichier']['tmp_name']; // avoir le nom du fichier temporaire du fichier

    $fichier_cible = "source/";

    if (move_uploaded_file($fichier_tmp, $fichier_cible . $fichier_nom)) {
        echo "fichier téléchargé";
    } else {
        echo "il y a un erreur";
    }
}


























die();
// avoir l'extension de l'image
$img_explode = explode('.', $img_nom);
$img_ext = end($img_explode); // avoir le dernier caractère que la fonction explode a divisé à partir du point(.).
$extensions = ["jpg", "png", "jpeg", "jfif"]; // stocké l'extension existant d'une image dans un tableau
if (in_array($img_ext, $extensions) === true) {
    $temps = time(); // nous avons besoins de ceci pour l'image a un unique nom créer avec le temps obtenu par le fonction time().

    //
    $fichier_cible = "../fichier_telecharger/";
    $img_nouv_nom = $temps . $img_nom;

    if (move_uploaded_file($fichier_tmp, $fichier_cible . $img_nouv_nom)) {

        $status = "en ligne"; // lorsqu'un utilisateur est connecté son status est en ligne
        $random_id = rand(time(), 100000000); // crétion d'un random id pour utilisateur
    }
}
