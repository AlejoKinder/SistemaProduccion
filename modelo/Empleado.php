<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of empleado
 *
 * @author Alejo
 */
class Empleado extends Crud{
    private $idemple;
    private $nombre;
    
    const TABLE = 'empleado'; //esta constante contiene el nombre de la tabla a la cual pertenece
    private $pdo;
    
    public function __construct() {
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
    }
    
    public function getById($id){ //en la tabla el id se llama idemple, por eso tenemos que usar esta funcion y no la de Crud.
        try{
            $stm = $this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE idemple=?");
            $stm->execute(array($id));
            $result = $stm->fetch(PDO::FETCH_OBJ);
            return ($result !== false) ? $result : null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }             
    }
    
    public function create() {
        
    }

    public function update() {
        
    }
}
