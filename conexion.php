<?php


class Conexion extends PDO{
    private $hostBd = 'localhost';
    private $nombreBd = 'controlactivos';
    private $usuarioBd = 'root';
    private $passwordBd = '';

    public function __construct()
    {
        try{
            parent::__construct('mysql:host=' . $this->hostBd . ';dbname=' . $this->
                    nombreBd . ';charset=utf8', $this->usuarioBd, $this->passwordBd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				
				} catch(PDOException $e){
				echo 'Error: ' . $e->getMessage();
				exit;
        }
    }


    }


?>