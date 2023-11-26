<?php
abstract class Config
{
    protected $pdo;
    function __construct()
    {
        try {
        $this->pdo = new PDO('mysql:host=localhost;dbname=facturation', 'root', '');
            /*le mode de gestion des erreurs de PDO sur le mode "exception". Cela signifie que PDO lancera des exceptions en cas d'erreurs, ce qui permettra de capturer et de gérer ces erreurs de manière appropriée.*/
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            throw new Exception("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    function __destruct()
    {
        $this->pdo = null;
    }
}
