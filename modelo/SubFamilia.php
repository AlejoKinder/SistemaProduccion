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
class SubFamilia extends Crud{
    private $id;
    private $nombre;
    private $prefijo;
    private $materiales;
    
    const TABLE = 'subfamilia'; //esta constante contiene el nombre de la tabla a la cual pertenece
    private $pdo;
    
    public function __construct() {
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
    }
    
    public function getByFamiliaId($idFamilia){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE idfamilia=? AND estado=0");
            $stm->execute(array($idFamilia));
            return $stm->fetchAll(PDO::FETCH_OBJ); //devuelve una lista de objetos.
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function create() {
        try{
            $stm = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (nombre, prefijo, idfamilia, estado) VALUES (?, ?, ?, ?, ?)");
            $stm->execute(array(
                $this->nombre,
                $this->prefijo,
                $this->idfamilia,
                $this->estado
            ));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function update() {
        try{
            $stm = $this->pdo->prepare("UPDATE " . self::TABLE . " SET nombre = ?, prefijo = ?, idfamilia = ?, estado = ? WHERE id = ?");
            $stm->execute(array(
                $this->nombre,
                $this->prefijo,
                $this->idfamilia,
                $this->estado,
                $this->id
            ));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
