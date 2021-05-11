<?php
#$user = "root";
#$pass = "";
try {
    $pdo = new PDO('mysql:host=localhost; dbname=safe_money_bdd', 'root', '');
} catch (PDOException $error) {
    echo "No hubo conexión" . $error->getMessage();
}
