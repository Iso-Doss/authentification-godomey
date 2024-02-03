<?php

$erreurs = [];
$donnees = [];

if (isset($_GET['erreurs']) && !empty($_GET['erreurs'])) {
    $erreurs = json_decode($_GET['erreurs'], true);
}

if (isset($_GET['donnees']) && !empty($_GET['donnees'])) {
    $donnees = json_decode($_GET['donnees'], true);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Connexion</title>
</head>

<body>

    <div class="container">

        <div class="row justify-content-center mt-4">

            <div class="col-md-6 col-pull-3">

                <h1 class="h1">
                    Formulaire de connexion
                </h1>

                <?php
                if (isset($_GET['message_erreur']) && !empty($_GET['message_erreur'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['message_erreur']; ?>
                    </div>
                <?php
                }

                if (isset($_GET['message_success']) && !empty($_GET['message_success'])) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_GET['message_success']; ?>
                    </div>
                <?php
                }
                ?>

                <form method="post" action="traitement.php" novalidate>

                    <div class="form-group mb-4">
                        <label for="email">
                            Adresse mail :
                        </label>
                        <input type="email" name="email" id="email" class="form-control <?= (isset($erreurs['email']) && !empty($erreurs['email'])) ? "is-invalid" : "" ?>" value="<?= (isset($donnees['email']) && !empty($donnees['email'])) ? $donnees['email'] : "" ?>" placeholder="Veuillez entrer votre adresse mail" required>
                        <?php
                        if (isset($erreurs['email']) && !empty($erreurs['email'])) {
                            echo "<p class='text-danger'>" . $erreurs['email'] . "</p>";
                        }
                        ?>
                    </div>

                    <div class="form-group mb-4">
                        <label for="mot-de-passe">
                            Mot de passe :
                        </label>
                        <input type="password" name="mot-de-passe" id="mot-de-passe" class="form-control <?= (isset($erreurs['mot-de-passe']) && !empty($erreurs['mot-de-passe'])) ? "is-invalid" : "" ?>" value="<?= (isset($donnees['mot-de-passe']) && !empty($donnees['mot-de-passe'])) ? $donnees['mot-de-passe'] : "" ?>" placeholder="Veuillez entrer votre mot de passe" required>
                        <?php
                        if (isset($erreurs['mot-de-passe']) && !empty($erreurs['mot-de-passe'])) {
                            echo "<p class='text-danger'>" . $erreurs['mot-de-passe'] . "</p>";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <input type="reset" class="btn bt btn-danger" value="Annuler">
                        <input type="submit" class="btn bt btn-primary" value="Connexion">
                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>