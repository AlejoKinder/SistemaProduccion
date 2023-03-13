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

class RenglonAjuste extends Crud{
    private $id;
    private $viscocidad_c;
    private $brillo_c;
    private $cubritivo_c;
    private $secado_c;
    private $solidos_c;
    private $color_c;
    private $molienda_c;
    private $total_c;
    private $id_empleado;   
    
    const TABLE = 'renglonajuste'; //esta constante contiene el nombre de la tabla a la cual pertenece
    private $pdo;
    
    public function __construct(){
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
        $this->id_empleado = new Empleado();
    }
    public function getId() {
        return $this->id;
    }

    public function getViscocidad_c() {
        return $this->viscocidad_c;
    }

    public function getBrillo_c() {
        return $this->brillo_c;
    }

    public function getCubritivo_c() {
        return $this->cubritivo_c;
    }

    public function getSecado_c() {
        return $this->secado_c;
    }

    public function getSolidos_c() {
        return $this->solidos_c;
    }

    public function getColor_c() {
        return $this->color_c;
    }

    public function getMolienda_c() {
        return $this->molienda_c;
    }

    public function getTotal_c() {
        return $this->total_c;
    }

    public function getId_empleado() {
        return $this->id_empleado;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setViscocidad_c($viscocidad_c): void {
        $this->viscocidad_c = $viscocidad_c;
    }

    public function setBrillo_c($brillo_c): void {
        $this->brillo_c = $brillo_c;
    }

    public function setCubritivo_c($cubritivo_c): void {
        $this->cubritivo_c = $cubritivo_c;
    }

    public function setSecado_c($secado_c): void {
        $this->secado_c = $secado_c;
    }

    public function setSolidos_c($solidos_c): void {
        $this->solidos_c = $solidos_c;
    }

    public function setColor_c($color_c): void {
        $this->color_c = $color_c;
    }

    public function setMolienda_c($molienda_c): void {
        $this->molienda_c = $molienda_c;
    }

    public function setTotal_c($total_c): void {
        $this->total_c = $total_c;
    }

    public function setId_empleado($id_empleado): void {
        $this->id_empleado = $id_empleado;
    }

    public function createConOrden($orden){
        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (viscocidad_c, brillo_c, cubritivo_c, secado_c, solidos_c, color_c, molienda_c, total_c, id_empleado, id_ordenproduccion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            //echo "id: ".$this->id_empleado->idemple;
            $stm->execute(array($this->viscocidad_c, $this->brillo_c, $this->cubritivo_c, $this->secado_c, $this->solidos_c, $this->color_c, $this->molienda_c, $this->total_c, ($this->id_empleado !== null) ? $this->id_empleado->idemple : '', $orden));           
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function updateConOrden($orden){
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET viscocidad_c=?,brillo_c=?,cubritivo_c=?,secado_c=?,solidos_c=?,color_c=?,molienda_c=?,total_c=?,id_empleado=?,id_ordenproduccion=? WHERE id=?");
            //echo $orden;
            $stm->execute(array($this->viscocidad_c, $this->brillo_c, $this->cubritivo_c, $this->secado_c, $this->solidos_c, $this->color_c, $this->molienda_c, $this->total_c, ($this->id_empleado !== null) ? $this->id_empleado->idemple : '', $orden, $this->id));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function create() {
        
    }

    public function update() {
        
    }

}
