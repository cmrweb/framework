<?php

$projectName = preg_replace("/\//","",$_ENV['ROOT_PATH']);
$dbHOST = $_ENV['DB_HOST'];
$dbNAME = $_ENV['DB_NAME'];
$dbUSER = $_ENV['DB_USER'];
$dbPASS = $_ENV['DB_PASS'];
//réecrire .env

//create database if not exist

//init required tables

?>
<style>
    label{
        display:block
    }
</style>
<form action="" method="post">
    <label for="projectName">Nom du projet</label>
    <input type="text" id="projectName" value="<?=$projectName?>">
    <label for="projectName">Hote de la Base de données</label>
    <input type="text" id="projectName" value="<?=$dbHOST?>">
    <label for="projectName">Nom de la Base de données</label>
    <input type="text" id="projectName" value="<?=$dbNAME?>">
    <label for="projectName">Nom d'utilisateur de la Base de données'</label>
    <input type="text" id="projectName" value="<?=$dbUSER?>">
    <label for="projectName">Mot de passe de la Base de données</label>
    <input type="text" id="projectName" value="<?=$dbPASS?>">
</form>