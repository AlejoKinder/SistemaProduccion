<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/licenseprivate $default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of OrdenProduccion
 *
 * @author Alejo
 */
require_once 'core/Crud.php';
require_once 'modelo/Sector.php';
require_once 'modelo/RenglonElaboracion.php';
require_once 'modelo/RenglonAjuste.php';

class OrdenProduccion extends Crud{
    private $id;
    private $prioridad;
    private $operacion;
    private $fechaEntrega;
    private $material;
    private $color;
    private $tipo;
    private $marca;
    private $tapaColor;
    private $idSector;  //en realidad es un objeto Sector, pero  se tiene que llamar igual que en la base de datos.
    
    //RENGLONES:
    private $listRenglonesElaboracion;
    private $listRenglonesControl;
    private $listRenglonesAjuste;
    
    const TABLE = 'ordenproduccion'; //esta constante contiene el nombre de la tabla a la cual pertenece
    private $pdo;
    
    public function __construct(){
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
        $this->idSector = new Sector();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getPrioridad() {
        return $this->prioridad;
    }

    public function getOperacion() {
        return $this->operacion;
    }

    public function getFechaEntrega() {
        return $this->fechaEntrega;
    }

    public function getMaterial() {
        return $this->material;
    }

    public function getColor() {
        return $this->color;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getTapaColor() {
        return $this->tapaColor;
    }

    public function getSector() {
        return $this->idSector;
    }  

    public function setId($id): void {
        $this->id = $id;
    }

    public function setPrioridad($prioridad): void {
        $this->prioridad = $prioridad;
    }

    public function setOperacion($operacion): void {
        $this->operacion = $operacion;
    }

    public function setFechaEntrega($fechaEntrega): void {
        $this->fechaEntrega = $fechaEntrega;
    }

    public function setMaterial($material): void {
        $this->material = $material;
    }

    public function setColor($color): void {
        $this->color = $color;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setMarca($marca): void {
        $this->marca = $marca;
    }

    public function setTapaColor($tapaColor): void {
        $this->tapaColor = $tapaColor;
    }

    public function setSector($sector): void {
        $this->idSector = $sector;
    }
    
    public function getListRenglonesElaboracion() {
        return $this->listRenglonesElaboracion;
    }

    public function setListRenglonesElaboracion($listRenglonesElaboracion): void {
        $this->listRenglonesElaboracion = $listRenglonesElaboracion;
    }
        
    /*public function getRenglonesElaboracion($id){
        $renglon = new RenglonElaboracion();
        //echo $renglon->getTable()."Id: ".$id;
        $stm = $this->pdo->prepare("SELECT * FROM ".$renglon->getTable()." WHERE id_ordenproduccion=?");
        $stm->execute(array($id));
        $retorno = $stm->fetchAll(PDO::FETCH_OBJ);
        return ($retorno !== false) ? $retorno : null;
    }*/
    
    public function getRenglones($id, $tabla){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM ".$tabla." WHERE id_ordenproduccion=?");
            $stm->execute(array($id));
            $retorno = $stm->fetchAll(PDO::FETCH_OBJ);
            return ($retorno !== false) ? $retorno : null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function getById($id) {        
         try{
            $aux = $id;
            $sec = new Sector();
            $stm = $this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE id = ?"); //ponemos signo de pregunta para no poner el dato.
            $stm->execute(array($id));
            $retorno = $stm->fetch(PDO::FETCH_OBJ);
            ($retorno !== false) ? $id = $retorno->idSector : null;
            ($retorno !== false) ? $retorno->idSector = $sec->getById($id) : null;
            /*$lista = $this->getRenglonesElaboracion($aux);
            $retorno->listRenglonesElaboracion = ($lista !== false) ? $lista : '';*/
            $renglones = array('listRenglonesElaboracion' => 'renglonelaboracion','listRenglonesControl' => 'rengloncontrol','listRenglonesAjuste' => 'renglonajuste');
            foreach($renglones as $renglon=>$tabla){
                //Recorro todas las tablas de renglones y le asigno a sus respectivas listas.
                $retorno->$renglon = $this->getRenglones($aux, $tabla);
            }
            //$retorno->listRenglonesElaboracion = $this->getRenglones($aux, 'renglonelaboracion');
            //$retorno->listRenglonesControl = $this->getRenglones($aux, 'rengloncontrol');
            return ($retorno !== false) ? $retorno : null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }                 
    }
        
    public function create() {        
        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (prioridad, idSector, operacion, fechaEntrega, material, color, tipo, marca, tapaColor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stm->execute(array($this->prioridad, $this->idSector->id, $this->operacion, $this->fechaEntrega, $this->material, $this->color, $this->tipo, $this->marca, $this->tapaColor));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function update() {
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET prioridad=?, idSector=?, operacion=?, fechaEntrega=?, material=?, color=?, tipo=?, marca=?, tapaColor=? WHERE id = ?");
            $stm->execute(array($this->prioridad, $this->idSector->id, $this->operacion, $this->fechaEntrega, $this->material, $this->color, $this->tipo, $this->marca, $this->tapaColor, $this->id));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
