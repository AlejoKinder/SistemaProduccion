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
require_once 'modelo/Formula.php';
require_once 'controlador/MaterialesControlador.php';

class FormulaControlador {
    private $model;
    
    public function __contruct(){
        $this->model = new Material();
    }
    
    public function indexFormula(){
        $contMat = new MaterialesControlador();
        $busqueda = new Formula();
        
        $materiales = $contMat->retornarMatPorIdDetalle($_REQUEST['idDetalle']);
        $resultados = $busqueda->getFormulaByIdDetalle($_REQUEST['idDetalle']);
        $cantidad = $busqueda->getCantidad($_REQUEST['idDetalle']);
        
        require_once 'vista/vistaFormula.php';
        require_once 'vista/formula.php';
    }
    
    public function crearOeditar(){
        $form = new Formula();
        $form->setSolido($_REQUEST['solido']);
        $form->setCantidad($_REQUEST['cantidad']);
        $form->setIdDetalle($_REQUEST['idDetalle']);
        $form->setIdMaterial($_REQUEST['idMaterial']);
        
        echo "idDetalle:".$_REQUEST['idDetalle']."/////";
        
        $form->create();
        
        //armamos el enlace para volver a la vista de la formula.       
        $controlador = "formula";
        $accion = "indexFormula";
        $idDetalle = $_REQUEST['idDetalle'];
        $url = "index.php?controller=". urlencode($controlador)."&action=".urlencode($accion)."&idDetalle=".urlencode($idDetalle);

        header("Location: $url");
    }
    
    public function formulario(){
        echo $_REQUEST['idMaterial'];
        echo $_REQUEST['idDetalle'];
        
        require_once 'vista/vistaFormulaRelacion.php';
    }
    
    //innecesario??.
    public function crearRelacion(){
        $form = new Formula();
    }
}
