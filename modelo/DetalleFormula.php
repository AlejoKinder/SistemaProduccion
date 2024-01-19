<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of DetalleFormula
 *
 * @author Alejo
 */
require_once 'core/Crud.php';

class DetalleFormula extends Crud{
    private $id;
    private $idArticulo;
    private $detalle;    
    
    const TABLE = 'detalleformula'; //esta constante contiene el nombre de la tabla a la cual pertenece
    private $pdo;
    
    public function __construct(){
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
        //faltaria conseguir uno solo poner el objeto articulo en idArticulo.
    }
    
    public function getId() {
        return $this->id;
    }

    public function getIdArticulo() {
        return $this->idArticulo;
    }

    public function getDetalle() {
        return $this->detalle;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setIdArticulo($idArticulo): void {
        $this->idArticulo = $idArticulo;
    }

    public function setDetalle($detalle): void {
        $this->detalle = $detalle;
    }
    
    public function getByIdArticulo($id){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE idArticulo=? AND estado=0");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ); //devuelve una lista de objetos.
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
        
    public function create() {
        try{
            $stm = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (idArticulo, detalle, estado) VALUES (?, ?, ?, ?)");
            $stm->execute(array(
                $this->idArticulo,
                $this->detalle,
                $this->estado
            ));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function update() {
        try{
            $stm = $this->pdo->prepare("UPDATE " . self::TABLE . " SET idArticulo = ?, detalle = ?, estado = ? WHERE id = ?");
            $stm->execute(array(
                $this->idArticulo,
                $this->detalle,
                $this->estado,
                $this->id
            ));

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
