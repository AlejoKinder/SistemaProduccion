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
class Formula extends Crud{
    private $id;
    private $solido;
    private $cantidad;
    private $idMaterial;
    private $idDetalle;
    
    const TABLE = 'formula'; //esta constante contiene el nombre de la tabla a la cual pertenece
    private $pdo;
    
    public function __construct() {
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getSolido() {
        return $this->solido;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setSolido($solido): void {
        $this->solido = $solido;
    }
    
    public function setCantidad($cantidad): void {
        $this->cantidad = $cantidad;
    }

    public function getIdDetalle() {
        return $this->idDetalle;
    }

    public function setIdDetalle($idDetalle): void {
        $this->idDetalle = $idDetalle;
    }

    public function getIdMaterial() {
        return $this->idMaterial;
    }

    public function setIdMaterial($idMaterial): void {
        $this->idMaterial = $idMaterial;
    }
            
    public function getCantidad($idDetalle){
        try {         
        $stm = $this->pdo->prepare("SELECT SUM(cantidad) AS sumaCantidad FROM ".self::TABLE." WHERE idDetalle = ? AND estado = 0");
            $stm->execute(array($idDetalle));

            // Obtener el resultado de la función SUM
            $result = $stm->fetch(PDO::FETCH_ASSOC);

            // Devolver el valor de la suma (puede ser NULL si no hay filas coincidentes)
            return $result['sumaCantidad'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    
    
    //FALTA ESTADO???
    public function getFormulaByIdDetalle($idDetalle){
        try{         
            $stm = $this->pdo->prepare("SELECT form.cantidad, form.solido,  mat.id, mat.costo, mat.descripcion, mat.densidad, mat.indiceAcidez, mat.indiceIodo, mat.absorcionAceite, mat.puntoAblandamiento, mat.puntoFusion, mat.ligante FROM material AS mat INNER JOIN formula AS form ON mat.id = form.idMaterial WHERE form.idDetalle = ?");
            $stm->execute(array($idDetalle));
            return $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener resultados como array asociativo, porque son un conjunto de 2 tablas de donde extrae los resultados
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    
    //Inesesario?
    public function getMaterialesFormula($idDetalle){
        try{         
            $stm = $this->pdo->prepare("SELECT * FROM material AS mat INNER JOIN formula AS form ON mat.id = form.idMaterial WHERE form.idDetalle = 4;");
            $stm->execute(array($estado));
            return $stm->fetchAll(PDO::FETCH_OBJ); //devuelve una lista de objetos.
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    
    public function create() {
        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (idMaterial, idDetalle, solido, cantidad, estado) VALUES (?, ?, ?, ?, 0)");  //estado tiene valor 0 porque asi se marca las tuplas activas en la BD.
            $stm->execute(array($this->idMaterial, $this->idDetalle, $this->solido, $this->cantidad));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    //ARREGLAR OVVERRIDE DE FORMULAS
    public function update() {
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET nombre = ?, prefijo = ?, estado = ? WHERE id = ?");
            $stm->execute(array($this->nombre, $this->prefijo, $this->estado, $this->id));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
