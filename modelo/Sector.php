<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Sector
 *
 * @author Alejo
 */
require_once 'core/Crud.php';
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/

class Sector extends Crud{
    private $id;
    private $nombre;
    
    const TABLE = 'sector';
    private $pdo;
    
    public function __construct() {
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        if (!isset($this->nombre)) {
            throw new Exception("El nombre no está definido");
        }
        return $this->nombre;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }
    
    public function getSectorConNombre($nombree){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE nombre=?");
            $stm->execute(array($nombree));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
 
    public function create() {
        
    }

    public function update() {
        
    }

}
