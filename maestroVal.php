<?php

include 'conexion.php';

$pdo = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET ['ID_VAL'])) {
        $sql = $pdo->prepare('SELECT * FROM maestro_validaciones WHERE ID_VAL=:ID_VAL ');
        $sql->bindValue(':ID_VAL', $_GET['ID_VAL']);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header('HTTP/1.1 200 OK');
        echo json_encode($sql->fetchAll());
        exit;
    } else {
        $sql = $pdo->prepare('SELECT * FROM maestro_validaciones');
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header('HTTP/1.1 200 OK');
        echo json_encode($sql->fetchAll());
        exit;
    }
}

?>