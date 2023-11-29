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
require_once 'modelo/Material.php';
require_once 'modelo/Familia.php';
require_once 'modelo/SubFamilia.php';
require_once 'modelo/DetalleFormula.php';

class FormulaControlador {
    private $model;
    
    public function __contruct(){
        $this->model = new Material();
    }
    
    public function indexFormula(){
        require_once 'vista/vistaFormula.php';
    }
}
