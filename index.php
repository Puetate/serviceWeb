<?php

include 'conexion.php';

$pdo = new Conexion();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET ['CEDULA'])) {
        $sql = $pdo->prepare('SELECT * FROM USUARIOS WHERE CEDULA=:CEDULA');
        $sql->bindValue(':CEDULA', $_GET['CEDULA']);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header('HTTP/1.1 200 OK');
        echo json_encode($sql->fetchAll());
        exit;
    } else {
        $sql = $pdo->prepare('SELECT * FROM USUARIOS');
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header('HTTP/1.1 200 OK');
        echo json_encode($sql->fetchAll());
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "INSERT INTO usuarios (CEDULA, NOMBRE, APELLIDO)  VALUES (:CEDULA, :NOMBRE, :APELLIDO)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':CEDULA', $_POST['CEDULA']);
    $stmt->bindValue(':NOMBRE', $_POST['NOMBRE']);
    $stmt->bindValue(':APELLIDO', $_POST['APELLIDO']);
    $stmt->execute();
    $idPost = $pdo->lastInsertId();

    if ($idPost) {
        header("HTTP/1.1 200 Ok");
        echo json_encode($idPost);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $sql = "UPDATE usuarios SET NOMBRE=:NOMBRE, APELLIDO=:APELLIDO 
            WHERE CEDULA=:CEDULA";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':NOMBRE', $_GET['NOMBRE']);
    $stmt->bindValue(':APELLIDO', $_GET['APELLIDO']);
    $stmt->bindValue(':CEDULA', $_GET['CEDULA']);
    $stmt->execute();
    header("HTTP/1.1 200 Ok");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $sql = "DELETE FROM usuarios WHERE CEDULA=:CEDULA";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':CEDULA', $_GET['CEDULA']);
    $stmt->execute();
    header("HTTP/1.1 200 Ok");
    exit;
}
header("HTTP/1.1 400 Bad Request");
?>