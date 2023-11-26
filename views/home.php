<?php
session_start(); // Démarrer la session sur la page du tableau de bord

echo "Connexion réussie pour l'utilisateur : " . $_SESSION['name'] ;
?>