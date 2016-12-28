<?php
// connexion à la bdd
$DSN = 'mysql:host=localhost;dbname=ournetwork';
$user =  'root';
$mdp = '';
$options = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
];

$ournetwork = NEW PDO($DSN,$user,$mdp,$options);
?>


