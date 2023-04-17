<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Crud
 *
 * @author Alejo
 */
require_once 'Connection.php';

abstract class Crud extends Connection{
    private $table;
    private $pdo;
    
    public function __construct($table) {
        $this->table = $table;
        $this->pdo = parent::conexion();
    }
    
    /*public function getAll(){
        try{
            $estado = 0;
            $stm = $this->pdo->prepare("SELECT * FROM ".$this->table." WHERE estado=?");
            $stm->execute(array($estado));
            return $stm->fetchAll(PDO::FETCH_OBJ); //devuelve una lista de objetos.
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }*/
    
    public function getAll(){
    try{
        $this->pdo->query('SET SESSION query_cache_type = OFF'); // Desactivar la caché de consultas
        $estado = 0;
        $stm = $this->pdo->prepare("SELECT * FROM ".$this->table." WHERE estado=?");
        $stm->execute(array($estado));
        return $stm->fetchAll(PDO::FETCH_OBJ); //devuelve una lista de objetos.
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}




    
    /*public function getById($id){
        try{
            var_dump($id);
            $stm = $this->pdo->prepare("SELECT * FROM ".$this->table." WHERE id=?"); //ponemos signo de pregunta para no poner el dato.
            $stm->execute(array($id));
            var_dump($stm->fetch(PDO::FETCH_OBJ));
            return $stm->fetch(PDO::FETCH_OBJ); //devuelve una lista de objetos.
        } catch (PDOException $e) {
            echo $e->getMessage();
        }             
    }*/
    
    public function getById($id){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM ".$this->table." WHERE id=? AND estado=0");
            $stm->execute(array($id));
            $result = $stm->fetch(PDO::FETCH_OBJ);
            return ($result !== false) ? $result : null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }             
    }
    
    public function delete($id){
        try{
            //$stm = $this->pdo->prepare("DELETE FROM $this->table WHERE id = ?"); //ponemos signo de pregunta para no poner el dato.
            $stm = $this->pdo->prepare("UPDATE ".$this->table." SET estado = 1 WHERE id=?");
            $stm->execute(array($id));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }             
    }
    
    abstract function update();
    abstract function create();
}
