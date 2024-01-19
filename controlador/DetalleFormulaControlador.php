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
require_once 'modelo/DetalleFormula.php';
require_once 'modelo/Articulo.php';   //innesesario??

class DetalleFormulaControlador {
    private $model;
    
    public function __contruct(){
        $this->model = new DetalleFormula();
    }

    public function listadoDeUnArticulo(){
        $id = $_REQUEST['id'];
        
        $Articulo = new DetalleFormula();
        $detalles = $Articulo->getByIdArticulo($id);
        
        require_once 'vista/detalleformula.php';
    }
    
    public function existencia(){
        if(isset($_REQUEST['id'])){
            $opa = new DetalleFormula();
            $detalle = ($opa !== null) ? $opa->getById($_REQUEST['id']) : " ";
        }
        //FALTA HACER LA SUPER VISTA DE DETALLES :/
        //require_once 'vista/vistaOrdenProduccion.php';
    }
    
    public function crearOeditar(){
        $detalle = new DetalleFormula();
        $detalle->setId($_REQUEST['id']);
        $detalle->setIdArticulo($_REQUEST['idArticulo']);
        $detalle->setDetalle($_REQUEST['detalle']);      
        
        if($_REQUEST['id'] > 0){            
            $orden->update();
        }else{
            $orden->create();
        }
        header("Location: index.php");
    }
    
    public function formulario(){
        
        require_once 'vista/vista';
    }
    
    public function eliminar(){
        //echo "llegue aca: ".$_REQUEST['id'];
        $opa = new DetalleFormula();
        //$this->model->delete($_REQUEST['id']);
        $opa->delete($_REQUEST['id']);
        
        header("Location: index.php");
    }
}
