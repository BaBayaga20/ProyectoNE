<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artículos</title>
    <link rel="stylesheet" href="estilosSitio.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        h1 {
            color: #333;
            text-align: center;
            padding: 20px 0;
            margin-bottom: 20px;
            background-color: #fff;
        }
        .item {
            background-color: #fff;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .item img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .item h2 {
            color: #333;
        }
        .item p {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Citando Elementos</h1>
        <?php
        // FUNCIONES PARA CONEXION A BASE (CONSIDERAR LAS CLAVES DE LA DB)
        function dispError() {
            return mysql_error() . "(" . mysql_errno() . ")";
        }

        $db_cnx = mysql_connect("localhost", "root", "Pateando2013");

        if (!$db_cnx) {
            echo dispError();
            exit();
        }

        $dbName = 'storedb';
        mysql_select_db($dbName, $db_cnx);

        // OBTENEMOS EL PAQUETE DE LA CONSULTA A LA BASE
        $query = "SELECT NombreVendedor, TituloProducto, DescripcionProducto, DatosVendedor, RutaFoto FROM productos";
        $rslt = mysql_query($query);

        // MOSTRAMOS LOS ELEMENTOS DEL PAQUETE
        while ($fila = mysql_fetch_array($rslt)) {
            echo '<div class="item">';
            echo '<h2>' . $fila['TituloProducto'] . '</h2>';
            echo '<p><strong>Vendedor:</strong> ' . $fila['NombreVendedor'] . '</p>';
            echo '<p><strong>Descripción:</strong> ' . $fila['DescripcionProducto'] . '</p>';
            echo '<p><strong>Datos del Vendedor:</strong> ' . $fila['DatosVendedor'] . '</p>';
            echo '<img src="' . $fila['RutaFoto'] . '" alt="' . $fila['TituloProducto'] . '">';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
