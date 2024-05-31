<html>
<head>
<link rel="stylesheet" type="text/css" href="estilosSitio.css"  >
</head>
<body>
<h1>
<h1 style="color: red; font-size: 40px"> Citando Elementos</h1>

<?php

//FUNCIONES PARA CONEXION A BASE( CONSIDERAR LAS CLAVES DE LA DB )
function dispError()
{ return mysql_error() . "(" . mysql_errno() . ")" ; }

$db_cnx = mysql_connect("localhost", "root", "Pateando2013" ) ;

if (! $db_cnx) { dispError(); exit(); }
echo "Cnx = $db_cnx <br>";

$dbName = 'storedb' ;
mysql_select_db($dbName, $db_cnx);
echo "conectando a BD $dbName" . " Rslt= " . dispError() . "<br>" ;


//OBTENEMOS EL PAQUETE DE LA CONSULTA A LA BASE


$query = "SELECT NombreVendedor ,TituloProducto ,DescripcionProducto,DatosVendedor,RutaFoto FROM productos";
$rslt = mysql_query($query);
echo $rslt;
echo "InsRslt = $rslt " . mysql_error() ."<br>";

//MOSTRAMOS LOS ELEMENTOS DEL PAQUETE

while ($fila=mysql_fetch_array($rslt)){
    echo "<p>";
    echo "-"; //un separador
    echo $fila ['NombreVendedor'];
    echo "-"; // un separador
    echo $fila ["TituloProducto"];
    echo "-"; // un separador
    echo $fila ["DescripcionProducto"];
    echo "-"; // un separador
    echo $fila ["DatosVendedor"];
    echo "-"; // un separador
    echo $fila ["RutaFoto"];
    echo "-"; // un separador
    echo '<img src="'.$fila ['RutaFoto'].'" width = 150px height=auto/>';
    echo "<p>"; 
}

?>
</body>
</html>