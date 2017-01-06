<?php 
session_start();
include_once 'inc/connexion_bd.inc.php';

echo '<p>hello ' . $_SESSION['pseudo'] .'! Vous êtes online!!</p>';