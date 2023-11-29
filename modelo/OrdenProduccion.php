    <?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/licenseprivate $default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of OrdenProduccion
 * Prueba GitHub
 * @author Alejo
 */
require_once 'core/Crud.php';
require_once 'modelo/Sector.php';
require_once 'modelo/RenglonElaboracion.php';
require_once 'modelo/RenglonAjuste.php';
require_once 'modelo/RenglonEspecificaciones.php';
require_once 'modelo/RenglonEtiquetado.php';
require_once 'modelo/RenglonEnvasado.php';

class OrdenProduccion extends Crud{
    private $id;
    private $prioridad;
    private $operacion;
    private $fechaEntrega;
    private $material;
    private $color;
    private $tipo;
    private $marca;
    private $tapaColor;
    private $idSector;  //en realidad es un objeto Sector, pero  se tiene que llamar igual que en la base de datos.
    private $estado;
    
    //RENGLONES:
    private $listRenglonesElaboracion;
    private $listRenglonesControl;
    private $listRenglonesAjuste;
    private $listRenglonesEspecificacion;
    private $listRenglonesEtiquetado;
    private $listRenglonesEnvasado;
    private $listRenglonesControlFinal;
    
    const TABLE = 'ordenproduccion'; //esta constante contiene el nombre de la tabla a la cual pertenece
    private $pdo;
    
    public function __construct(){
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexion();
        $this->idSector = new Sector();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getPrioridad() {
        return $this->prioridad;
    }

    public function getOperacion() {
        return $this->operacion;
    }

    public function getFechaEntrega() {
        return $this->fechaEntrega;
    }

    public function getMaterial() {
        return $this->material;
    }

    public function getColor() {
        return $this->color;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getTapaColor() {
        return $this->tapaColor;
    }

    public function getSector() {
        return $this->idSector;
    }  

    public function setId($id): void {
        $this->id = $id;
    }

    public function setPrioridad($prioridad): void {
        $this->prioridad = $prioridad;
    }

    public function setOperacion($operacion): void {
        $this->operacion = $operacion;
    }

    public function setFechaEntrega($fechaEntrega): void {
        $this->fechaEntrega = $fechaEntrega;
    }

    public function setMaterial($material): void {
        $this->material = $material;
    }

    public function setColor($color): void {
        $this->color = $color;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setMarca($marca): void {
        $this->marca = $marca;
    }

    public function setTapaColor($tapaColor): void {
        $this->tapaColor = $tapaColor;
    }

    public function setSector($sector): void {
        $this->idSector = $sector;
    }
    
    public function getListRenglonesElaboracion() {
        return $this->listRenglonesElaboracion;
    }

    public function setListRenglonesElaboracion($listRenglonesElaboracion): void {
        $this->listRenglonesElaboracion = $listRenglonesElaboracion;
    }
        
    /*public function getRenglonesElaboracion($id){
        $renglon = new RenglonElaboracion();
        //echo $renglon->getTable()."Id: ".$id;
        $stm = $this->pdo->prepare("SELECT * FROM ".$renglon->getTable()." WHERE id_ordenproduccion=?");
        $stm->execute(array($id));
        $retorno = $stm->fetchAll(PDO::FETCH_OBJ);
        return ($retorno !== false) ? $retorno : null;
    }*/
    
    public function getRenglones($id, $tabla){
        try{
            $estado2 = 0;
            $stm = $this->pdo->prepare("SELECT * FROM ".$tabla." WHERE id_ordenproduccion=? AND estado=?");
            $stm->execute(array($id, $estado2));
            $retorno = $stm->fetchAll(PDO::FETCH_OBJ);
            return ($retorno !== false) ? $retorno : null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function getById($id) {        
         try{
            $aux = $id;
            $sec = new Sector();
            $stm = $this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE id = ?"); //ponemos signo de pregunta para no poner el dato.
            $stm->execute(array($id));
            $retorno = $stm->fetch(PDO::FETCH_OBJ);
            ($retorno !== false) ? $id = $retorno->idSector : null;
            ($retorno !== false) ? $retorno->idSector = $sec->getById($id) : null;
            /*$lista = $this->getRenglonesElaboracion($aux);
            $retorno->listRenglonesElaboracion = ($lista !== false) ? $lista : '';*/
            $renglones = array('listRenglonesElaboracion' => 'renglonelaboracion','listRenglonesControl' => 'rengloncontrol','listRenglonesAjuste' => 'renglonajuste', 'listRenglonesEspecificacion' => 'renglonespecificaciones', 'listRenglonesEtiquetado' => 'renglonetiquetado', 'listRenglonesEnvasado' => 'renglonenvasado', 'listRenglonesControlFinal' => 'rengloncontrolfinal');
            foreach($renglones as $renglon=>$tabla){
                $retorno->$renglon = $this->getRenglones($aux, $tabla);
            }
            return ($retorno !== false) ? $retorno : null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }                 
    }  
    
    public function calcularHorasOrden($ordenId){
        $horasTotales = 0;
        $auxRenglones;
        
        //echo "Llegue x1";
        $renglones = array('listRenglonesElaboracion' => 'renglonelaboracion','listRenglonesControl' => 'rengloncontrol','listRenglonesAjuste' => 'renglonajuste', 'listRenglonesEspecificacion' => 'renglonespecificaciones', 'listRenglonesEtiquetado' => 'renglonetiquetado', 'listRenglonesEnvasado' => 'renglonenvasado', 'listRenglonesControlFinal' => 'rengloncontrolfinal');
        foreach($renglones as $renglon=>$tabla){
            $auxRenglones = $this->getRenglones($ordenId, $tabla);
            foreach($auxRenglones as $valor){
                if ($valor->fecha_fin != "0000-00-00" && $valor->fin != "00:00:00") {
                    //echo "entre aca";
                    $horasTotales += $this->calcularHoras($valor->fecha_inicio, $valor->fecha_fin, $valor->inicio, $valor->fin);
                    //echo "cant: ".$horasTotales;
                }
            }
        }
        
        return $this->convertirDecimalAHorasMinutosSegundos($horasTotales);
    }
    
    function calcularHoras($fechaInicio, $fechaFin, $horaInicio, $horaFin) {
    $jornadaLaboral = include __DIR__ . '/../core/jornada_laboral.php';
    $horasTotales = 0;
    $fechaActual = strtotime($fechaInicio . ' ' . $horaInicio);
    $fechaFin = strtotime($fechaFin . ' ' . $horaFin);

    // Verificar si la fecha de inicio y la fecha de fin son iguales
    if (date('Y-m-d', $fechaActual) === date('Y-m-d', $fechaFin)) {
        $horaInicioJornada = strtotime(date('Y-m-d', $fechaActual) . ' ' . $jornadaLaboral[date('l', $fechaActual) . 'HoraInicio']);
        $horaFinJornada = strtotime(date('Y-m-d', $fechaActual) . ' ' . $jornadaLaboral[date('l', $fechaActual) . 'HoraFin']);

        $horaInicio = max($fechaActual, $horaInicioJornada);
        $horaFin = min($fechaFin, $horaFinJornada);

        if ($horaInicio <= $horaFin) {
            $horas = (floatval($horaFin) - floatval($horaInicio)) / 3600;
            $horasTotales += $horas;
        }
    } else {
        while ($fechaActual <= $fechaFin) {
            $diaSemana = date('l', $fechaActual); // Obtener el nombre del día de la semana en inglés

            if (isset($jornadaLaboral[$diaSemana . 'HoraInicio']) && isset($jornadaLaboral[$diaSemana . 'HoraFin'])) {
                $horaInicioJornada = strtotime(date('Y-m-d', $fechaActual) . ' ' . $jornadaLaboral[$diaSemana . 'HoraInicio']);
                $horaFinJornada = strtotime(date('Y-m-d', $fechaActual) . ' ' . $jornadaLaboral[$diaSemana . 'HoraFin']);

                // Verificar si es fin de semana (sábado o domingo) y omitir el cálculo
                if ($diaSemana === 'Saturday' || $diaSemana === 'Sunday') {
                    $fechaActual = strtotime('+1 day', $fechaActual);
                    continue;
                }
                
                if ((date('Y-m-d', $fechaActual) <= date('Y-m-d', $fechaFin)) && (date('Y-m-d', $fechaActual) !== $fechaInicio)){
                    $horaInicioJornada = strtotime(date('Y-m-d', $fechaActual) . ' ' . $jornadaLaboral[$diaSemana . 'HoraInicio']);
                    $horaFinJornada = strtotime(date('Y-m-d', $fechaActual) . ' ' . $jornadaLaboral[$diaSemana . 'HoraFin']);
                    $horas = (floatval($horaFinJornada) - floatval($horaInicioJornada)) / 3600;
                    $horas = max($horas, 0);
                    $horasTotales += $horas;
                    $fechaActual = strtotime('+1 day', $fechaActual);
                    continue;
                }

                $horaInicio = max($fechaActual, $horaInicioJornada);
                $horaFin = min($fechaFin, $horaFinJornada);

                if ($horaInicio <= $horaFin) {
                    $horas = (floatval($horaFin) - floatval($horaInicio)) / 3600;
                    $horas = max($horas, 0);
                    $horasTotales += $horas;
                }
            }

            $fechaActual = strtotime('+1 day', $fechaActual);
        }
    }

    return $horasTotales;
}


    
    /*function calcularHoras($fechaInicio, $fechaFin, $horaInicio, $horaFin) {
    $jornadaLaboral = include __DIR__ . '/../core/jornada_laboral.php';
    $horasTotales = 0;
    $fechaActual = strtotime($fechaInicio . ' ' . $horaInicio);
    $fechaFin = strtotime($fechaFin . ' ' . $horaFin);

    while ($fechaActual <= $fechaFin) {
        $diaSemana = date('l', $fechaActual); // Obtener el nombre del día de la semana en inglés

        if (isset($jornadaLaboral[$diaSemana . 'HoraInicio']) && isset($jornadaLaboral[$diaSemana . 'HoraFin'])) {
            $horaInicioJornada = strtotime(date('Y-m-d', $fechaActual) . ' ' . $jornadaLaboral[$diaSemana . 'HoraInicio']);
            $horaFinJornada = strtotime(date('Y-m-d', $fechaActual) . ' ' . $jornadaLaboral[$diaSemana . 'HoraFin']);

            // Verificar si es fin de semana (sábado o domingo) y omitir el cálculo
            if ($diaSemana === 'Saturday' || $diaSemana === 'Sunday') {
                $fechaActual = strtotime('+1 day', $fechaActual);
                continue;
            }

            $horaInicio = max($fechaActual, $horaInicioJornada);
            $horaFin = min($fechaFin, $horaFinJornada);

            if ($horaInicio <= $horaFin) {
                $horas = ($horaFin - $horaInicio) / 3600;
                $horas = max($horas, 0);
                $horasTotales += $horas;
            }
        }

        $fechaActual = strtotime('+1 day', $fechaActual);
    }

    // Ajuste adicional para incluir las horas de inicio y fin en días parciales
    $horaInicioDia = strtotime(date('Y-m-d', strtotime($fechaInicio)) . ' ' . $jornadaLaboral['MondayHoraInicio']);
    $horaFinDia = strtotime(date('Y-m-d', strtotime($fechaFin)) . ' ' . $jornadaLaboral['FridayHoraFin']);
    $horaInicio = max($fechaInicio, $horaInicioDia);
    $horaFin = min($fechaFin, $horaFinDia);

    if ($horaInicio <= $horaFin) {
        $horas = (floatval($horaFin) - floatval($horaInicio)) / 3600;
        $horas = max($horas, 0);
        $horasTotales += $horas;
    }

    return $horasTotales;
}*/









    
    /*function calcularHoras($fechaInicio, $fechaFin, $horaInicio, $horaFin) {
    $jornadaLaboral = include __DIR__ . '/../core/jornada_laboral.php';
    $horasTotales = 0;
    $fechaActual = strtotime($fechaInicio . ' ' . $horaInicio);
    $fechaFin = strtotime($fechaFin . ' ' . $horaFin);

    while ($fechaActual <= $fechaFin) {
        $diaSemana = date('l', $fechaActual); // Obtener el nombre del día de la semana en inglés

        if (isset($jornadaLaboral[$diaSemana . 'HoraInicio']) && isset($jornadaLaboral[$diaSemana . 'HoraFin'])) {
            $horaInicioJornada = strtotime(date('Y-m-d', $fechaActual) . ' ' . $jornadaLaboral[$diaSemana . 'HoraInicio']);
            $horaFinJornada = strtotime(date('Y-m-d', $fechaActual) . ' ' . $jornadaLaboral[$diaSemana . 'HoraFin']);

            $horaInicio = max($fechaActual, $horaInicioJornada);
            $horaFin = min($fechaFin, $horaFinJornada);

            if ($horaInicio <= $horaFin) {
                $horasTotales += ($horaFin - $horaInicio) / 3600;
            }
        }

        $fechaSiguiente = strtotime('+1 day', $fechaActual);

        if (date('Y-m-d', $fechaSiguiente) != date('Y-m-d', $fechaActual) && $fechaSiguiente < $fechaFin) {
            $horasTotales += ($horaFinJornada - $horaInicioJornada) / 3600;
        }

        $fechaActual = $fechaSiguiente;
    }

    return $horasTotales;
}*/





    
    /*function calcularHoras($fechaInicio, $fechaFin, $horaInicio, $horaFin) {
        $jornadaLaboral = include __DIR__ . '/../core/jornada_laboral.php';
        $horaInicioJornada = strtotime($jornadaLaboral['horaInicio']);
        $horaFinJornada = strtotime($jornadaLaboral['horaFin']);
        $fechaInicio = strtotime($fechaInicio . ' ' . $horaInicio);
        $fechaFin = strtotime($fechaFin . ' ' . $horaFin);
        $segundosTrabajados = $fechaFin - $fechaInicio;

        if ($segundosTrabajados <= 0) {
            return 0; // Si la fecha de inicio es igual o posterior a la fecha de fin, retorna 0 horas trabajadas
        }

        $horasTrabajadas = $segundosTrabajados / 3600; // Convierte los segundos a horas

        // Si la fecha de inicio es diferente a la fecha de fin, ajusta las horas trabajadas según la jornada laboral
        if (date('Y-m-d', $fechaInicio) != date('Y-m-d', $fechaFin)) {
            $horaFinDia = strtotime(date('Y-m-d', $fechaInicio) . ' ' . $jornadaLaboral['horaFin']);
            $segundosDia1 = $horaFinDia - $fechaInicio;
            $horasTrabajadasDia1 = $segundosDia1 / 3600;
            $horasTrabajadas -= $horasTrabajadasDia1;

            $horaInicioDia = strtotime(date('Y-m-d', $fechaFin) . ' ' . $jornadaLaboral['horaInicio']);
            $segundosDia2 = $fechaFin - $horaInicioDia;
            $horasTrabajadasDia2 = $segundosDia2 / 3600;
            $horasTrabajadas -= $horasTrabajadasDia2;
        }

        // Si las horas trabajadas son negativas, las ajusta a 0
        if ($horasTrabajadas < 0) {
            $horasTrabajadas = 0;
        }

        return $horasTrabajadas;
    }*/
    
    function convertirDecimalAHorasMinutosSegundos($numeroDecimal) {
        $horas = floor($numeroDecimal); // Obtener la parte entera (horas)
        $minutosDecimal = ($numeroDecimal - $horas) * 60; // Obtener la parte decimal y convertir a minutos
        $minutos = floor($minutosDecimal); // Obtener la parte entera de los minutos
        $segundos = round(($minutosDecimal - $minutos) * 60); // Obtener los segundos y redondear

        return sprintf("%02d:%02d:%02d", $horas, $minutos, $segundos); // Formatear la salida como HH:MM:SS
    }

        
    public function create() {        
        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (prioridad, idSector, operacion, fechaEntrega, material, color, tipo, marca, tapaColor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stm->execute(array($this->prioridad, $this->idSector->id, $this->operacion, $this->fechaEntrega, $this->material, $this->color, $this->tipo, $this->marca, $this->tapaColor));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function update() {
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET prioridad=?, idSector=?, operacion=?, fechaEntrega=?, material=?, color=?, tipo=?, marca=?, tapaColor=? WHERE id = ?");
            $stm->execute(array($this->prioridad, $this->idSector->id, $this->operacion, $this->fechaEntrega, $this->material, $this->color, $this->tipo, $this->marca, $this->tapaColor, $this->id));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
