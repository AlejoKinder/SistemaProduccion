<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de Ordenes de produccion</title>
    </head>
    <body>
        <a href="index.php"><-Volver</a>
        <?php 
            if(isset($orden)){
                $datosOrden = array('id'=>$orden->id, 'prioridad'=>$orden->prioridad, 'operacion'=>$orden->operacion, 'fechaEntrega'=>$orden->fechaEntrega, 'material'=>$orden->id, 'color'=>$orden->color, 'tipo'=>$orden->tipo, 'marca'=>$orden->marca, 'tapaColor'=>$orden->tapaColor, 'sector'=>$orden->idSector->nombre);
            }else{
                $datosOrden = array('id'=>"", 'prioridad'=>"", 'operacion'=>"", 'fechaEntrega'=>"", 'material'=>"", 'color'=>"", 'tipo'=>"", 'marca'=>"", 'tapaColor'=>"", 'sector'=>"");
            }
        ?>
        <h1>Registro Orden De Produccion</h1>
        <br>
        <form method="post" action="index.php?controller=ordenProduccion&action=crearOeditar">
            <input type="hidden" name="id" value=<?php echo $datosOrden['id'] ?>>
            <table>
                <tr>
                    <td>Prioridad: </td>
                    <td>
                        <input <?php echo $datosOrden['prioridad']=='urgente'? 'checked': '' ?> type="radio" name="prioridad" value="urgente">Urgente
                        <input <?php echo $datosOrden['prioridad']=='normal'? 'checked': '' ?> type="radio" name="prioridad" value="normal">Normal
                    </td>
                </tr>
                <tr>
                    <td>Sector: </td>
                    <td>
                        <select name="sector">
                            <?php
                                require_once 'modelo/Sector.php';
                                $sector = new Sector();
                                $sectores = $sector->getAll();

                                //var_dump($sectores);
                                //$sectores = array('M. Prima', 'Latex', 'Sintetico', 'Diluyente', 'Molienda', 'Resina');
                                foreach ($sectores as $valor):
                                var_dump($valor);
                            ?>
                            <option <?php echo $datosOrden['sector']==$valor->nombre?'Selected':'' ?> value="<?php echo $valor->nombre; ?>"><?php echo $valor->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Operacion: </td>
                    <td>
                        <select name="operacion">
                            <?php
                                //Lo ideal seria despues sacar de la BD.
                                $operaciones = array('Elaboracion', 'Envasado', 'Fraccionado', 'Reenvasado', 'Recuperado');
                                foreach ($operaciones as $valor):
                            ?>
                            <option <?php echo $datosOrden['operacion']==$valor?'Selected':'' ?> value= <?php echo $valor; ?> > <?php echo $valor; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Fecha de Entrega: </td>
                    <td><input type="date" name="fecha" value=<?php echo $datosOrden['fechaEntrega'] ?>></td>
                </tr>
                <tr>
                    <td>Material: </td>
                    <td>
                        <select name="material">
                            <?php
                                //Lo ideal seria despues sacar de la BD.
                                $materiales = array('Metal', 'Plastico');
                                foreach ($materiales as $valor):
                            ?>
                            <option <?php echo $datosOrden['material']==$valor?'Selected':'' ?> value= <?php echo $valor; ?> > <?php echo $valor; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Color: </td>
                    <td>
                        <input type="color" name="color" value=<?php echo $datosOrden['color'] ?>><!-- habria que ver si serviria de esta manera -->
                    </td>
                </tr>
                <tr>
                    <td>Tipo: </td>
                    <td>
                        <select name="tipo">
                            <?php
                                //Lo ideal seria despues sacar de la BD.
                                $tipo = array("Balde", "Botella", "Tambor", "Bidon", "Pote", "Bolsa", "Pallet");
                                foreach ($tipo as $valor):
                            ?>
                            <option <?php echo $datosOrden['tipo']==$valor?'Selected':'' ?> value= <?php echo $valor; ?> > <?php echo $valor; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Marca: </td> <!--VER SI ESTO ES UTIL, SI NO SACAR -->
                    <td> <input type="text" name="marca" value="<?php echo $datosOrden['marca'] ?>"> </td> 
                </tr>
                <tr>
                    <td>Tapa Color: </td>
                    <td>
                        <input type="color" name="tapaColor" value=<?php echo $datosOrden['tapaColor'] ?>><!-- habria que ver si serviria de esta manera -->
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Guardar"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
