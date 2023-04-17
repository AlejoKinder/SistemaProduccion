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
require_once 'modelo/OrdenProduccion.php';
require_once 'modelo/Sector.php';

class OrdenProduccionControlador {
    private $model;
    
    public function __contruct(){
        $this->model = new OrdenProduccion();
    }
    
    public function indexOrdenProduccion(){
        require_once 'vista/ordenproduccion.php';
    }
    
    public function existencia(){
        if(isset($_REQUEST['id'])){
            $opa = new OrdenProduccion();
            //echo "entre aca gil: ".$_REQUEST['id'];
            //($sector !== null) ? $sector->nombre : '';
            //$orden = $this->model->getById($_REQUEST['id']);
            $orden = ($opa !== null) ? $opa->getById($_REQUEST['id']) : " ";
        }
        require_once 'vista/vistaOrdenProduccion.php';
    }
    
    public function crearOeditar(){
        $orden = new OrdenProduccion();
        $orden->setId($_REQUEST['id']);
        $orden->setPrioridad($_REQUEST['prioridad']);
        $orden->setOperacion($_REQUEST['operacion']);
        $orden->setFechaEntrega($_REQUEST['fecha']);
        $orden->setMaterial($_REQUEST['material']);
        $orden->setColor($_REQUEST['color']);
        $orden->setTipo($_REQUEST['tipo']);
        $orden->setMarca($_REQUEST['marca']);
        $orden->setTapaColor($_REQUEST['tapaColor']);
        $sector = new Sector(); //no creo que sea lo correcto que este controlador use cosas de Sector.       
        $orden->setSector($sector->getSectorConNombre($_REQUEST['sector']));
        
        if($_REQUEST['id'] > 0){            
            $orden->update();
        }else{
            $orden->create();
        }
        header("Location: index.php");
    }
    
    public function eliminar(){
        //echo "llegue aca: ".$_REQUEST['id'];
        $opa = new OrdenProduccion();
        //$this->model->delete($_REQUEST['id']);
        $opa->delete($_REQUEST['id']);
        
        header("Location: index.php");
    }
}
