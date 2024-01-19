<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Familia
 *
 * @author Alejo
 */
class Familia extends Crud{
    private $id;
    private $nombre;
    private $prefijo;
    private $subFamilias;
    
    const TABLE = 'familia'; //esta constante contiene el nombre de la tabla a la cual pertenece
    private $pdo;
    
    public function __construct() {
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
    }
    
    public function create() {
        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE ." (nombre, prefijo, estado) VALUES (?, ?, ?, 0)");  //estado tiene valor 0 porque asi se marca las tuplas activas en la BD.
            $stm->execute(array($this->nombre, $this->prefijo));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function update() {
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET nombre = ?, prefijo = ?, estado = ? WHERE id = ?");
            $stm->execute(array($this->nombre, $this->prefijo, $this->estado, $this->id));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
