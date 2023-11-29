<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of OrdenProduccionControlador
 *
 * @author Alejo
 */
require_once __DIR__ . '/../modelo/Material.php';
require_once __DIR__ . '/../modelo/Familia.php';
require_once __DIR__ . '/../modelo/SubFamilia.php';

class MaterialesControlador {
    private $model;
    
    public function __contruct(){
        $this->model = new Material();
    }
    
    public function obtenerSubFamilias($familiaId){
        $busqueda = new SubFamilia();
        
        return $busqueda->getByFamiliaId($familiaId);
    }
    
    public function obtenerFamilias(){
        $busqueda = new Familia();
        
        return $busqueda->getAll();
    }
}
