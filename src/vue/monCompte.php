<?php
include_once "vue/Vue.php";
class monCompte extends Vue
{

    function affiche()
    {

        include "header.html";
        include "menu.php";

        echo '<div class="covered-img">';

        echo ' <div class="container">';
        echo " <div class='form-group'>";

        echo " <div class='form-row'>";
        echo "<label class='col-md-3' for='nom'>Nom</label>";
        echo "<input id='nom' type='text' class='form-control' name='nom' value='" . $pers->getNom() . "'placeholder='Entrez votre nom' required </input>";

        echo " <div class='form-row'>";
        echo "<label for='prenom'>Prenom</label>";
        echo "<input id='prenom' type='text' class='form-control' name='prenom' value='" . $pers->getPrenom() . "'placeholder='Entrez votre prenom' required </input>";

        echo " <div class='form-row'>";
        echo "<label for='dateNaiss'>Date de naissance</label>";
        echo "<input id='datepicker' type='text' class='form-control' name='dateNaiss' value='" . $pers->getDatenaiss() . "'placeholder='Entrez votre date de naissance' </input>";

        echo " <div class='form-row'>";
        echo "<label for='telephone'>Telephone</label>";
        echo "<input id='telephone' type='text' class='form-control' name='telephone' value='" . $pers->getTelephone() . "'placeholder='Entrez votre numero de telephone' required </input>";

        echo " <div class='form-row'>";
        echo "<label for='email'>Email</label>";
        echo "<input id='email' type='text' class='form-control' name='email' value='" . $pers->getEmail() . "'placeholder='Entrez votre email' required </input>";

        echo " <div class='form-row'>";
        echo "<label for='login'>Login</label>";
        echo "<input id='login' type='text' class='form-control' name='login' value='" . $pers->getLogin() . "'placeholder='Entrez votre login' required </input>";

        echo " <div class='form-row'>";
        echo "<label for='mdp'>Mot de passe</label>";
        echo "<input id='mdp' type='text' class='form-control' name='mdp' value='" . $pers->getPwd() . "'placeholder='Entrez votre mot de passe' required </input>";

        echo " <div class='form-row'>";
        echo "<label for='mdp'>Confirmez votre mot de passe</label>";
        echo "<input id='mdp' type='text' class='form-control' name='mdp' value='" . $pers->getPwd() . "'placeholder='Confirmez votre mot de passe' required </input>";

        echo " <div class='form-row'>";
        echo "<label for='nom'>Prenom</label>";
        echo "<input id='prenom' type='text' class='form-control' name='prenom' value='" . $pers->getPrenom() . "'placeholder='Entrez votre prenom' required </input>";


        echo '<p class="lead"><p>Bienvenue ' . $_SESSION['nom'] . '!</p>';
        echo "<p class='font-italic'> Cette application web va permettre de nous familiariser avec :<p>";
        echo '<ul class=\'font-italic\'>';
        echo ' <li><a href="https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4678736-comment-fonctionne-une-architecture-mvc" target="_blank">l \'architecture MVC (Modèle Vue Controller)</a></li>';
        echo ' <li><a href="https://www.php.net/" target="_blank">PHP</a></li>';
        echo ' <li><a href="https://phpunit.readthedocs.io/en/9.5/" target="_blank">Les tests unitaires (PHPUNIT)</a></li>';
        echo ' <li><a href="https://www.php.net/manual/fr/book.pdo.php" target="_blank">PDO (PHP DATA OBJECT)</a></li>';
        echo ' <li><a href="https://www.pierre-giraud.com/bootstrap-apprendre-cours/" target="_blank">BootStrap</a></li>';
        echo ' <li><a href="https://jquery.com/" target="_blank">JQuery</a></li>';
        echo ' <li><a href="https://developer.mozilla.org/fr/docs/Web/Guide/AJAX" target="_blank">Ajax</a></li>';
        echo ' <li><a href="https://firebase.google.com/" target="_blank">L\' API Firebase</a></li>';
        echo '</ul>';

        echo '</div>';
        echo '</div>';

        include "footer.html";
    }
}