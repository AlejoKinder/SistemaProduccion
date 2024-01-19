<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="index.php?controller=materiales&action=indexMateriales">Crear Material</a>
        <h1>Selección de Articulo</h1>
        <br>
        <br>
        <form method="post" action="index.php?controller=articulo&action=buscarArticuloDesc">
            Ingrese Numero Articulo o Nombre: <input type="text" name="busqueda">
            <input type="submit" name="Buscar">
        </form>
    </body>
</html>
