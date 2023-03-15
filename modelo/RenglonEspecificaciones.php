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

class RenglonEspecificaciones extends Crud{
    private $id;
    private $viscocidad;
    private $viscocidad_2;
    private $brillo;
    private $solidos;
    private $densidad;
    private $ablandamiento;
    private $acidez;
    private $id_empleado;
    
    const TABLE = 'renglonespecificaciones'; //esta constante contiene el nombre de la tabla a la cual pertenece
    private $pdo;
    
    public function __construct(){
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
        $this->id_empleado = new Empleado();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getViscocidad() {
        return $this->viscocidad;
    }

    public function getViscocidad_2() {
        return $this->viscocidad_2;
    }

    public function getBrillo() {
        return $this->brillo;
    }

    public function getSolidos() {
        return $this->solidos;
    }

    public function getDensidad() {
        return $this->densidad;
    }

    public function getAblandamiento() {
        return $this->ablandamiento;
    }

    public function getAcidez() {
        return $this->acidez;
    }

    public function getId_empleado() {
        return $this->id_empleado;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setViscocidad($viscocidad): void {
        $this->viscocidad = $viscocidad;
    }

    public function setViscocidad_2($viscocidad_2): void {
        $this->viscocidad_2 = $viscocidad_2;
    }

    public function setBrillo($brillo): void {
        $this->brillo = $brillo;
    }

    public function setSolidos($solidos): void {
        $this->solidos = $solidos;
    }

    public function setDensidad($densidad): void {
        $this->densidad = $densidad;
    }

    public function setAblandamiento($ablandamiento): void {
        $this->ablandamiento = $ablandamiento;
    }

    public function setAcidez($acidez): void {
        $this->acidez = $acidez;
    }

    public function setId_empleado($id_empleado): void {
        $this->id_empleado = $id_empleado;
    }
             
    public function create() {        
        
    }
    
    public function createConOrden($orden){
        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (viscocidad, viscocidad_2, brillo, solidos, densidad, ablandamiento, acidez, id_empleado, id_ordenproduccion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            //echo "id: ".$this->id_empleado->idemple;
            $stm->execute(array($this->viscocidad, $this->viscocidad_2, $this->brillo,  $this->solidos, $this->densidad, $this->ablandamiento, $this->acidez, ($this->id_empleado !== null) ? $this->id_empleado->idemple : '', $orden));           
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function update() {
       
    }
    
    public function updateConOrden($orden){
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET viscocidad=?,viscocidad_2=?,brillo=?,solidos=?,densidad=?,ablandamiento=?,acidez=?,id_empleado=?,id_ordenproduccion=? WHERE id=?");
            //echo $orden;
            $stm->execute(array($this->viscocidad, $this->viscocidad_2, $this->brillo,  $this->solidos, $this->densidad, $this->ablandamiento, $this->acidez, $this->id_empleado->idemple, $orden, $this->id));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
