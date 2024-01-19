<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Material
 *
 * @author Alejo
 */
require_once __DIR__ . '/../core/Crud.php';

class Material extends Crud{
    private $id;
    private $costo;
    private $descripcion;
    private $densidad;
    private $indiceAcidez;
    private $indiceIodo;
    private $absorcionAceite;
    private $puntoAblandamiento;
    private $puntoFusion;
    private $idsubfamilia;
    private $ligante;
    
    const TABLE = 'material'; //esta constante contiene el nombre de la tabla a la cual pertenece
    private $pdo;
    
    public function __construct() {
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getDensidad() {
        return $this->densidad;
    }

    public function getIndiceAcidez() {
        return $this->indiceAcidez;
    }

    public function getIndiceIodo() {
        return $this->indiceIodo;
    }

    public function getAbsorcionAceite() {
        return $this->absorcionAceite;
    }

    public function getPuntoAblandamiento() {
        return $this->puntoAblandamiento;
    }

    public function getPuntoFusion() {
        return $this->puntoFusion;
    }

    public function getIdsubfamilia() {
        return $this->idsubfamilia;
    }

    public function getLigante() {
        return $this->ligante;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setCosto($costo): void {
        $this->costo = $costo;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setDensidad($densidad): void {
        $this->densidad = $densidad;
    }

    public function setIndiceAcidez($indiceAcidez): void {
        $this->indiceAcidez = $indiceAcidez;
    }

    public function setIndiceIodo($indiceIodo): void {
        $this->indiceIodo = $indiceIodo;
    }

    public function setAbsorcionAceite($absorcionAceite): void {
        $this->absorcionAceite = $absorcionAceite;
    }

    public function setPuntoAblandamiento($puntoAblandamiento): void {
        $this->puntoAblandamiento = $puntoAblandamiento;
    }

    public function setPuntoFusion($puntoFusion): void {
        $this->puntoFusion = $puntoFusion;
    }

    public function setIdsubfamilia($idsubfamilia): void {
        $this->idsubfamilia = $idsubfamilia;
    }

    public function setLigante($ligante): void {
        $this->ligante = $ligante;
    }
        
    public function getMaterialesFormula($idDetalle){   //FIJARSE ESTADO DEESPUES.
        try{         
            $stm = $this->pdo->prepare("SELECT * FROM ".self::TABLE." AS mat INNER JOIN formula AS form ON mat.id = form.idMaterial WHERE form.idDetalle = ?");
            $stm->execute(array($idDetalle));
            return $stm->fetchAll(PDO::FETCH_OBJ); //devuelve una lista de objetos.
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function getBySubFamilia($idSubFamilia){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE idsubfamilia=? AND estado=0");
            $stm->execute(array($idSubFamilia));
            return $stm->fetchAll(PDO::FETCH_OBJ); //devuelve una lista de objetos.
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function create() {
        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE ." (costo, descripcion, densidad, indiceAcidez, indiceIodo, absorcionAceite, puntoAblandamiento, puntoFusion, idsubfamilia, ligante, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)");
            $stm->execute(array(
                $this->costo,
                $this->descripcion,
                $this->densidad,
                $this->indiceAcidez,
                $this->indiceIodo,
                $this->absorcionAceite,
                $this->puntoAblandamiento,
                $this->puntoFusion,
                $this->idsubfamilia,
                $this->ligante
            ));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function update() {
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLE ." SET costo = ?, descripcion = ?, densidad = ?, indiceAcidez = ?, indiceIodo = ?, absorcionAceite = ?, puntoAblandamiento = ?, puntoFusion = ?, idsubfamilia = ?, estado = ?, ligante = ? WHERE id = ?");
            $stm->execute(array(
                $this->costo,
                $this->descripcion,
                $this->densidad,
                $this->indiceAcidez,
                $this->indiceIodo,
                $this->absorcionAceite,
                $this->puntoAblandamiento,
                $this->puntoFusion,
                $this->idsubfamilia,
                $this->estado,
                $this->ligante,
                $this->id
            ));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
