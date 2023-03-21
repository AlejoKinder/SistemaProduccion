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

class RenglonControlFinal extends Crud{
    private $id;
    private $inicio;
    private $fin;
    private $fecha;
    private $presentacion;
    private $entregado;
    private $corregido;
    private $perdido;
    private $litrosOkg;
    private $id_empleado;
    
    const TABLE = 'rengloncontrolfinal'; //esta constante contiene el nombre de la tabla a la cual pertenece
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

    public function getPresentacion() {
        return $this->presentacion;
    }

    public function getEntregado() {
        return $this->entregado;
    }

    public function getCorregido() {
        return $this->corregido;
    }

    public function getPerdido() {
        return $this->perdido;
    }

    public function getLitrosOkg() {
        return $this->litrosOkg;
    }

    public function getId_empleado() {
        return $this->id_empleado;
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

    public function setPresentacion($presentacion): void {
        $this->presentacion = $presentacion;
    }

    public function setEntregado($entregado): void {
        $this->entregado = $entregado;
    }

    public function setCorregido($corregido): void {
        $this->corregido = $corregido;
    }

    public function setPerdido($perdido): void {
        $this->perdido = $perdido;
    }

    public function setLitrosOkg($litrosOkg): void {
        $this->litrosOkg = $litrosOkg;
    }

    public function setId_empleado($id_empleado): void {
        $this->id_empleado = $id_empleado;
    }
             
    public function create() {        
        
    }
    
    public function createConOrden($orden){
        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (inicio, fin, fecha, presentacion, entregado, corregido, perdido, litrosOkg, id_empleado, id_ordenproduccion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            //echo "id: ".$this->id_empleado->idemple;
            $stm->execute(array($this->inicio, $this->fin, $this->fecha,  $this->presentacion, $this->entregado, $this->corregido, $this->perdido, $this->litrosOkg, ($this->id_empleado !== null) ? $this->id_empleado->idemple : '', $orden));           
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function update() {
        
    }
    
    public function updateConOrden($orden){
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET inicio=?, fin=?, fecha=?, presentacion=?, entregado=?, corregido=?, perdido=?, litrosOkg=?, id_empleado=?, id_ordenproduccion=? WHERE id=?");
            //echo $orden;
            $stm->execute(array($this->inicio, $this->fin, $this->fecha,  $this->presentacion, $this->entregado, $this->corregido, $this->perdido, $this->litrosOkg, ($this->id_empleado !== null) ? $this->id_empleado->idemple : '', $orden, $this->id));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
