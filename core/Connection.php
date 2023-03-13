<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Connection
 *
 * @author Alejo
 */
class Connection {
    private $driver = 'mysql';
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbName = 'sistemaproduccion';
    private $charset = 'utf8';
    
    protected function conexion(){
        try{
            //$pdo = new PDO("{$this->driver}:host={$this->host};dbName={$this->dbName};charset={$this->charset}",$this->user,$this->password);
            $pdo = new PDO("mysql:host=localhost;dbname=sistemaproduccion", 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //https://www.php.net/manual/es/pdo.setattribute.php
            return $pdo; //si la conexion se hizo bien, devolvera true la funcion.
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
