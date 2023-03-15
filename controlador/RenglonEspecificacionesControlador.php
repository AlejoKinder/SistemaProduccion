<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of RenglonElaboracionControlador
 * Prueba GitHub
 * @author Alejo
 */
require_once 'modelo/RenglonEspecificaciones.php';
require_once 'modelo/Empleado.php';

class RenglonEspecificacionesControlador {
    private $model;
    
    public function __contruct(){
        $this->model = new RenglonEspecificaciones();
    }
    
    public function mostrar(){
        require_once 'vista/renglonespecificacion.php';
    }
    
    public function existencia(){
        if(isset($_REQUEST['id'])){
            //echo $_REQUEST['id'];
            $opa = new RenglonEspecificaciones();
            $ren = $opa->getById($_REQUEST['id']);
        }
        require_once 'vista/vistaRenglonEspecificaciones.php';
    }
    
    public function crearOeditar(){
        //echo 'estoy aca rey';
        $renglon = new RenglonEspecificaciones();
        $renglon->setId($_REQUEST['id']);
        //echo $_REQUEST['id'];
        $renglon->setViscocidad($_REQUEST['viscocidad']);
        $renglon->setViscocidad_2($_REQUEST['viscocidad_2']);
        $renglon->setBrillo($_REQUEST['brillo']);
        $renglon->setSolidos($_REQUEST['solidos']);
        $renglon->setDensidad($_REQUEST['densidad']);
        $renglon->setAblandamiento($_REQUEST['ablandamiento']);
        $renglon->setAcidez($_REQUEST['acidez']);
        $empleado = new Empleado();
        $renglon->setId_empleado($empleado->getById($_REQUEST['idEmpleado']));
        //echo $_REQUEST['idEmpleado'];  //COMPROBACION.
        //echo $renglon->setId_empleado()->nombre;
        //echo $_REQUEST['idOrden'];
        
        /*$orden = new OrdenProduccion();
        $orden = $orden->setById($_REQUEST['idOrden']);
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
        $opa = new RenglonEspecificaciones();
        //$this->model->delete($_REQUEST['id']);
        $opa->delete($_REQUEST['id']);
        
        //header("Location: vista/renglonelaboracion.php");
        $this->mostrar();
    }
}
