<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichier telechargable</title>
</head>

<body>

    <table>
        <form action="./telecharger.php" method="post" enctype="multipart/form-data">
            <tr>
                <td><label for="fichier">Fihier à télécharger</label></td>
                <td><input type="file" name="fichier" id="fichier"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Soumettre"></td>
            </tr>
        </form>
    </table>

</body>

</html>