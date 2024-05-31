<html>
<head>
<link rel="stylesheet" type="text/css" href="estilosSitio.css"  >
</head>
<body>
<h1>
<h1 style="color: red; font-size: 40px"> Buscando Alumno</h1>

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

//OBTENEMOS LOS DATOS DEL FORMULARIO ATRAVES DE UN POST

//NOMBRE VENDEDOR
$NombreVendedor = $_POST[NombreVendedor];
echo "<h2 style='color: blue;'> " . "Datos del vendedor " . "</h2>";
echo "Vendedor = $NombreVendedor <br>";
//TITULO PUBLICACION
$TituloProducto = $_POST[TituloProducto];
echo "<h2 style='color: blue;'> " . "Titulo " . "</h2>";
echo "Titulo = $TituloProducto <br>";
//DESCRIPCION
$DescripcionProducto = $_POST[DescripcionProducto];
echo "<h2 style='color: blue;'> " . "Descripcion " . "</h2>";
echo "Descripcion = $DescripcionProducto <br>";
//DATOS DEL VENDEDOR
$DatosVendedor = $_POST[DatosVendedor];
echo "<h2 style='color: blue;'> " . "Contacto " . "</h2>";
echo "Contacto = $DatosVendedor <br>";

//CODIGO BACK END DE FOTO
$ruta='';
if (isset($_FILES[RutaFoto])){
    $file = $_FILES[RutaFoto];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provicional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provicional);
    $widht = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "imgs/";
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
        echo "Error, el archivo no es una imagen";
    }
    else if($size > 5*1024*1024){
        echo "Error, el archivo supera los 5 mb";
    }
    else { 
        $src = $carpeta.$nombre;
        echo "provicional = $ruta_provicional <br>";
        echo "final = $src <br>";
        move_uploaded_file($ruta_provicional, $src);
        //$imagen = "imgs/".$nombre; -> es el src
    }  
}

//AGREGAMOS EL ARTICULO A LA BASE


$sql_cmd = "insert into productos(NombreVendedor ,TituloProducto ,DescripcionProducto,DatosVendedor,RutaFoto) 
values( '$NombreVendedor','$TituloProducto','$DescripcionProducto','$DatosVendedor','$src');";
echo "insCmd = $sql_cmd <br>";	

$rslt = mysql_query($sql_cmd);
echo "InsRslt = $rslt " . mysql_error() ."<br>";


?>
</body>
</html>