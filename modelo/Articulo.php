<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Articulo
 *
 * @author Alejo
 */
require_once 'core/Crud.php';

class Articulo extends Crud{
    private $idArticulo;
    private $descripcion;
    private $formulas;
    
    const TABLE = 'articulo'; //esta constante contiene el nombre de la tabla a la cual pertenece
    private $pdo;
    
    public function __construct() {
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
    }

    public function getIdArticulo() {
        return $this->idArticulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPdo() {
        return $this->pdo;
    }

    public function setIdArticulo($idArticulo): void {
        $this->idArticulo = $idArticulo;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setPdo($pdo): void {
        $this->pdo = $pdo;
    }
    
    public function getById($id){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE idArticulo=?");
            $stm->execute(array($id));
            $result = $stm->fetch(PDO::FETCH_OBJ);
            return ($result !== false) ? $result : null;
        } catch (PDOException $e) {         
            echo $e->getMessage();
        }             
    }
    
    public function getByDescripcion($desc){
       try {
           $stm = $this->pdo->prepare("SELECT idArticulo, descripcion FROM ".self::TABLE." WHERE descripcion LIKE ?");
           $stm->execute(array('%' . $desc . '%'));
           $results = $stm->fetchAll(PDO::FETCH_OBJ);
           return ($results !== false) ? $results : null;
       } catch (PDOException $e) {
           echo $e->getMessage();
       }
   }



        
    public function create() {
        
    }

    public function update() {
        
    }

}
