<?php

$erreurs = [];
$donnees = $_POST;
$message_success = "";
$message_erreur = "";

if (empty($_POST)) {
    $message_erreur = "Erreur vous essayez d'accéder directement a la page de traitement sans passer par le formulaire";
} else {
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        $erreurs['email'] = "Le champ adresse mail est obligatoire.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erreurs['email'] = "Le champ adresse mail est incorrect.";
    }

    if (!isset($_POST['mot-de-passe']) || empty($_POST['mot-de-passe'])) {
        $erreurs['mot-de-passe'] = "Le champ mot de passe est obligatoire.";
    } elseif (strlen($_POST['mot-de-passe']) < 8) {
        $erreurs['mot-de-passe'] = "Le champ mot de passe est incorrect.";
    }
}

if (!empty($erreurs)) {
    $message_erreur = "Oups!!! un ou plusieur(s) champ(s) sont incorrect(s)";
} else {
    if ($_POST['email'] == 'contact@cfp.bj' && $_POST['mot-de-passe'] == 'cfp$2023') {
        $message_success = "Bravoooo! Authentification effectué avec succès.";
    } else {
        $message_erreur = "Oups! Authentification échoué. Adresse mail ou mot de passe incorrect.";
    }
}

header("location:index.php?message_erreur=" . $message_erreur . "&message_success=" . $message_success . "&erreurs=" . json_encode($erreurs) . "&donnees=" . json_encode($donnees));
