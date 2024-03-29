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
require_once 'modelo/RenglonElaboracion.php';
require_once 'modelo/Empleado.php';

class RenglonElaboracionControlador {
    private $model;
    
    public function __contruct(){
        $this->model = new RenglonElaboracion();
    }
    
    public function mostrar(){
        require_once 'vista/renglonelaboracion.php';
    }
    
    public function existencia(){
        if(isset($_REQUEST['id'])){
            //echo $_REQUEST['id'];
            $opa = new RenglonElaboracion();
            $ren = $opa->getById($_REQUEST['id']);
        }
        require_once 'vista/vistaRenglonElaboracion.php';
    }
    
    public function finalizarRenglon(){
        $ren = new RenglonElaboracion();
        $ren = $ren->getById($_REQUEST['id']); //buscamos el renglon para finalizarlo.       
        
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $ren->fin = date("H:i:s"); //establecemos la hora de fin.
        $ren->fecha_fin = date('Y-m-d');
        
        require_once 'vista/vistaRenglonElaboracion.php'; //volvemos a la vista.
    }
    
    public function crearOeditar(){
        //echo 'estoy aca rey';
        $renglon = new RenglonElaboracion();
        $renglon->setId($_REQUEST['id']);
        //echo $_REQUEST['id'];
        $renglon->setInicio($_REQUEST['inicio']);
        $renglon->setFin($_REQUEST['fin']);
        $renglon->setFecha_inicio($_REQUEST['fecha_ini']);
        $renglon->setFecha_fin($_REQUEST['fecha_fin']);
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
        $opa = new RenglonElaboracion();
        //$this->model->delete($_REQUEST['id']);
        $opa->delete($_REQUEST['id']);
        
        //header("Location: vista/renglonelaboracion.php");
        $this->mostrar();
    }
}
