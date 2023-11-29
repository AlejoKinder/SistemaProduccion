<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of RenglonElaboracionControlador
 *
 * @author Alejo
 */
require_once 'modelo/RenglonEtiquetado.php';
require_once 'modelo/Empleado.php';

class RenglonEtiquetadoControlador {
    private $model;
    
    public function __contruct(){
        $this->model = new RenglonEtiquetado();
    }
    
    public function mostrar(){
        require_once 'vista/renglonetiquetado.php';
    }
    
    public function existencia(){
        if(isset($_REQUEST['id'])){
            //echo $_REQUEST['id'];
            $opa = new RenglonEtiquetado();
            $ren = $opa->getById($_REQUEST['id']);
        }
        require_once 'vista/vistaRenglonEtiquetado.php';
    }
    
    public function finalizarRenglon(){
        $ren = new RenglonEtiquetado();
        $ren = $ren->getById($_REQUEST['id']); //buscamos el renglon para finalizarlo.       
        
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $ren->fin = date("H:i:s"); //establecemos la hora de fin.
        $ren->fecha_fin = date('Y-m-d');
        
        require_once 'vista/vistaRenglonEtiquetado.php'; //volvemos a la vista.
    }
    
    public function crearOeditar(){
        //echo 'estoy aca rey';
        $renglon = new RenglonEtiquetado();
        $renglon->setId($_REQUEST['id']);
        //echo $_REQUEST['id'];
        $renglon->setInicio($_REQUEST['inicio']);
        $renglon->setFin($_REQUEST['fin']);
        $renglon->setFecha_inicio($_REQUEST['fechaIni']);
        $renglon->setFecha_fin($_REQUEST['fechaFin']);
        $empleado = new Empleado();
        $renglon->setId_empleado($empleado->getById($_REQUEST['idEmpleado']));
        //echo $_REQUEST['idEmpleado'];  //COMPROBACION.
        //echo $renglon->getId_empleado()->nombre;
        //echo $_REQUEST['idOrden'];
        
        /*$orden = new OrdenProduccion();
        $orden = $orden->getById($_REQUEST['idOrden']);
        $renglon->setId_ordenproduccion($orden);*/
        
        if($_REQUEST['id'] > 0){            
            $renglon->updateConOrden($_REQUEST['idOrden']);
        }else{
            $renglon->createConOrden($_REQUEST['idOrden']);
        }
        $this->mostrar();
        //header('location: index.php');
    }
    
    public function eliminar(){
        //echo "llegue aca: ".$_REQUEST['id'];
        $opa = new RenglonEtiquetado();
        //$this->model->delete($_REQUEST['id']);
        $opa->delete($_REQUEST['id']);
        
        //header("Location: vista/renglonelaboracion.php");
        $this->mostrar();
    }
}
