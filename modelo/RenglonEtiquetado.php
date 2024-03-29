<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of RenglonElaboracion
 *
 * @author Alejo
 */
require_once 'core/Crud.php';
require_once 'modelo/Empleado.php';
require_once 'modelo/OrdenProduccion.php';

class RenglonEtiquetado extends Crud{
    private $id;
    private $inicio;
    private $fin;
    private $fecha_inicio;
    private $fecha_fin;
    private $id_empleado;
    
    const TABLE = 'renglonetiquetado'; //esta constante contiene el nombre de la tabla a la cual pertenece
    private $pdo;
    
    public function __construct(){
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
        $this->id_empleado = new Empleado();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getInicio() {
        return $this->inicio;
    }

    public function getFin() {
        return $this->fin;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getId_empleado() {
        return $this->id_empleado;
    }
    
    public function getTable(){
        return self::TABLE;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setInicio($inicio): void {
        $this->inicio = $inicio;
    }

    public function setFin($fin): void {
        $this->fin = $fin;
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function setId_empleado($id_empleado): void {
        $this->id_empleado = $id_empleado;
    }
    
    public function getFecha_inicio() {
        return $this->fecha_inicio;
    }

    public function getFecha_fin() {
        return $this->fecha_fin;
    }

    public function setFecha_inicio($fecha_inicio): void {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function setFecha_fin($fecha_fin): void {
        $this->fecha_fin = $fecha_fin;
    }

    public function create() {        
        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (inicio, fin, fecha, id_empleado, id_ordenproduccion) VALUES (?, ?, ?, ?, ?)");
            //echo "id: ".$this->id_empleado->idemple;
            $stm->execute(array($this->inicio, $this->fin, $this->fecha, ($this->id_empleado !== null) ? $this->id_empleado->idemple : '', $this->id_ordenproduccion->id));           
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function createConOrden($orden){
        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (inicio, fin, fecha_inicio, fecha_fin, id_empleado, id_ordenproduccion) VALUES (?, ?, ?, ?, ?, ?)");
            //echo "id: ".$this->id_empleado->idemple;
            $stm->execute(array($this->inicio, $this->fin, $this->fecha_inicio, $this->fecha_fin, ($this->id_empleado !== null) ? $this->id_empleado->idemple : '', $orden));           
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function update() {
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET (inicio=?, fin=?, fecha=?, id_empleado=?, id_ordenproduccion=? WHERE id=?");
            $stm->execute(array($this->inicio, $this->fin, $this->fecha, $this->id_empleado->getById($this->id_empleado->id), $orden->id, $this->id));
            //echo $this->id_empleado->getById($this->id_empleado->id);  //COMPROBACION
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function updateConOrden($orden){
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET inicio=?, fin=?, fecha_inicio=?, fecha_fin=?, id_empleado=?, id_ordenproduccion=? WHERE id=?");
            //echo $orden;
            $stm->execute(array($this->inicio, $this->fin, $this->fecha_inicio, $this->fecha_fin, $this->id_empleado->idemple, $orden, $this->id));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
