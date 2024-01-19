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
    
    public function indexMateriales(){
        $creacion = true;
        
        require_once 'vista/vistaFormula.php';
    }
    
    public function indexForm(){
        
        require_once 'vista/vistaMaterial.php';
    }
    
    public function crearMaterial(){
        $mat = new Material();
        
        $mat->setCosto($_REQUEST['costo']);
        $mat->setDescripcion($_REQUEST['descripcion']);  
        $mat->setDensidad($_REQUEST['densidad']);  
        $mat->setIndiceAcidez($_REQUEST['indiceAcidez']);  
        $mat->setIndiceIodo($_REQUEST['indiceIodo']);  
        $mat->setAbsorcionAceite($_REQUEST['absorcionAceite']);  
        $mat->setPuntoAblandamiento($_REQUEST['puntoAblandamiento']);  
        $mat->setPuntoFusion($_REQUEST['puntoFusion']);  
        if(isset($_REQUEST['ligante'])){
            $mat->setLigante(1);
        }else{
            $mat->setLigante(0);
        }
        //$mat->setLigante($_REQUEST['ligante']);
        $mat->setIdsubfamilia($_REQUEST['idsubfamilia']);
        
        $mat->create();
        /*if($_REQUEST['id'] > 0){            
            $mat->update();
        }else{
            $mat->create();
        }*/
        
        //armamos el enlace para volver a la vista de la formula.       
        $controlador = "materiales";
        $accion = "filtrarMaterialesPorSubFamilia";
        $idSubFamilia = $_REQUEST['idsubfamilia'];
        $idDetalle = $_REQUEST['idDetalle'];
        $url = "index.php?controller=". urlencode($controlador)."&action=".urlencode($accion)."&idSubFamilia=".urlencode($idSubFamilia)."&idDetalle=".urlencode($idDetalle);

        header("Location: $url");
    }
    
    public function retornarMatPorIdDetalle($idDetalle){
        $busqueda = new Material();
        
        return $busqueda->getMaterialesFormula($idDetalle);
    }
    
    public function filtrarMaterialesPorSubFamilia(){
        $busqueda = new Material();
        $idSubFamilia = $_REQUEST['idSubFamilia'];
        
        $materiales = $busqueda->getBySubFamilia($idSubFamilia);
        //echo $_REQUEST['idDetalle'];
        
        require_once 'vista/materialesfiltrado.php';
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
