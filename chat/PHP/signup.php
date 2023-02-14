<?php
session_start();
include_once "./config.php";

$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$mdp = mysqli_real_escape_string($conn, $_POST['mdp']);

if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($mdp)) {

    // vérification de l'email s'il est valide ou non
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        // vérifier si l'email existe déjà dans la base des données ou non
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");

        if (mysqli_num_rows($sql) > 0) { // si l'email existe déjà
            echo "L'email " . $email . " existe déjà.";
        } else {

            // vérification si le fichier est télécharger ou pas
            if (isset($_FILES['image'])) {

                $img_nom = $_FILES['image']['name']; // avoir le nom de l'image
                $img_tmp = $_FILES['image']['tmp_name']; // avoir le nom du fichier temporaire de l'image

                // avoir l'extension de l'image
                $img_explode = explode('.', $img_nom);
                $img_ext = end($img_explode); // avoir le dernier caractère que la fonction explode a divisé à partir du point(.).
                $extensions = ["jpg", "png", "jpeg", "jfif"]; // stocké l'extension existant d'une image dans un tableau
                if (in_array($img_ext, $extensions) === true) {
                    $temps = time(); // nous avons besoins de ceci pour l'image a un unique nom créer avec le temps obtenu par le fonction time().

                    //
                    $fichier_cible = "../fichier_telecharger/";
                    $img_nouv_nom = $temps . $img_nom;

                    if (move_uploaded_file($img_tmp, $fichier_cible . $img_nouv_nom)) {

                        $status = "en ligne"; // lorsqu'un utilisateur est connecté son status est en ligne
                        $random_id = rand(time(), 100000000); // crétion d'un random id pour utilisateur

                        // insertion des données de l'utilisateur dans la table users
                        $sql2 = mysqli_query($conn, "INSERT INTO users(unique_id, nom, prenom, email, mdp, image, status) 
                        VALUES ({$random_id}, '{$nom}', '{$prenom}', '{$email}', '{$mdp}', '{$img_nouv_nom}', '{$status}')");

                        if ($sql2) { // si les données sont inserées

                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

                            if (mysqli_num_rows($sql3) > 0) {

                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id']; // stocké l'unique_id dans la session 
                                echo 'Succès';
                            }
                        } else {
                            echo "Quelque chose va  mal!";
                        }
                    }
                } else {
                    echo "Selectionner une image png, jpeg, jpg, jfif, s'il vous plaît.";
                }
            }
        }
    } else {
        echo "L'email " . $email . " est non valide.";
    }
} else {
    echo "Tous les champs sont requis. ";
}
