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
require_once 'modelo/RenglonControl.php';
require_once 'modelo/Empleado.php';

class RenglonAjusteControlador {
    private $model;
    
    public function __contruct(){
        $this->model = new RenglonAjuste();
    }
    
    public function mostrar(){
        require_once 'vista/renglonajuste.php';
    }
    
    public function existencia(){
        if(isset($_REQUEST['id'])){
            //echo $_REQUEST['id'];
            $opa = new RenglonAjuste();
            $ren = $opa->getById($_REQUEST['id']);
        }
        require_once 'vista/vistaRenglonAjuste.php';
    }
    
    public function crearOeditar(){
        //echo 'estoy aca rey';
        $renglon = new RenglonAjuste();
        $renglon->setId($_REQUEST['id']);
        //echo $_REQUEST['id'];
        $renglon->setViscocidad_c($_REQUEST['viscocidad']);
        $renglon->setBrillo_c($_REQUEST['brillo']);
        $renglon->setCubritivo_c($_REQUEST['cubritivo']);
        $renglon->setSecado_c($_REQUEST['secado']);
        $renglon->setSolidos_c($_REQUEST['solidos']);
        $renglon->setColor_c($_REQUEST['color']);
        $renglon->setMolienda_c($_REQUEST['molienda']);
        $renglon->setTotal_c($_REQUEST['total']);
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
        $opa = new RenglonAjuste();
        //$this->model->delete($_REQUEST['id']);
        $opa->delete($_REQUEST['id']);
        
        //header("Location: vista/renglonelaboracion.php");
        $this->mostrar();
    }
}
