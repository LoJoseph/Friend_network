<?php
$DSN = 'mysql:host=localhost;dbname=network' 
$user= 'root';
$mdp = '';
$options = [
	PDO::ATTR_ERRMODE => PDO::ERMMODE_WARNING,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
];

$fnetwork = new PDO($DSN,$user,$mdp,$options);
?

