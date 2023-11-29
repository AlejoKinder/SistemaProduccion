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
require_once 'modelo/Articulo.php';

class ArticuloControlador {
    private $model;
    
    public function __contruct(){
        $this->model = new Articulo();
    }
    
    public function indexOrdenArticulo(){
        echo "llegue aca";
        require_once 'vista/vistaSeleccionArticulo.php';
    }
    
    public function buscarArticuloDesc(){
        $desc = $_REQUEST['busqueda'];
        //echo $desc;
        
        $articulos = new Articulo();
        $busqueda = new Articulo();
        //echo var_dump($busqueda);
        $busqueda = $articulos->getByDescripcion($desc);
        //echo var_dump($busqueda);
        //echo "holanda";
        
        require_once 'vista/vistaSeleccionListadoArticulo.php';
    }       
}
