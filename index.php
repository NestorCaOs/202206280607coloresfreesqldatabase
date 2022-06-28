<?php

$link = 'mysql:host=sql10.freesqldatabase.com;dbname=sql10501867';
$usuario = 'sql10501867';
$pass = '9rFd3fVhV7';


$server = $link;// "localhost";
$user = $usuario; //"usuario";
$password = $pass;//"contrasenna";
$bd = "sql10501867";

// $server = "localhost";
// $user = "root";
// $password = "";
// $bd = "empresa";

$conexion = mysqli_connect($server, $user, $password, $bd);

if (!$conexion){ 
    die('Error de Conexión: ' . mysqli_connect_errno());    
}   

mysqli_set_charset($conexion, 'utf8');

$query = "SELECT * FROM productos";
$result = mysqli_query($conexion, $query);

?>  

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//ES" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
<title>Ejemplo de Exportación de HTML a PDF</title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="NOINDEX,NOFOLLOW,NOARCHIVE,NOODP,NOSNIPPET">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link href="assests/bootstrap/css/bootstrap-3.3.7.min.css" type="text/css" rel="stylesheet">      
<script src="assests/jquery/jquery.min.js" type="text/javascript"></script> 
<script src="assests/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<table border="0" width="100%" height="60" cellspacing="0" cellpadding="0"><tr><td>&nbsp;</td></tr></table>
<div class="container">
    <div class="btn btn-primary"><a href="generarpdf.php" style="color:#FFF; text-decoration:none; " target="_blank">Visualizar en PDF</a></div>  
<div class="row">
    <div class="col-md-14">             
        <div class="panel panel-default">
            <br><p>
            <p><font face="arial" size="5" color="#000000">Ejemplo de exportación de Tabla HTML a PDF usando la librería "dompdf"</font></p> 
            <br><p>  
            <p><font face="verdana" size="3" color="#000000"><b>Productos</b></font></p>  
            <div class="panel-body"> 
<?php               
            echo '<table class="table table-striped table-hover table-responsive cell-border" id="productos">';
                echo '<thead>';
                    echo '<tr style="background-color:#e6e6e6;">';
                        echo '<th>ID</th>';
                        echo '<th>Nombre</th>';
                        echo '<th>Precio Compra</th>';
                        echo '<th>Precio Venta</th>';
                        echo '<th>Fecha Compra</th>';
                        echo '<th>Categoria</th>';
                        echo '<th>Stock</th>';
                        echo '<th>Foto</th>';     
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    while($row = mysqli_fetch_assoc($result)) {
                        $active = '';
                        if($row['foto'] == '') {
                            $active = '<label class="label label-success">Sin Foto</label>';
                        } else {
                            $active = '<label class="label label-danger">Con Foto</label>'; 
                        }

                    echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$row['nombre'].'</td>';
                        echo '<td>'.$row['precioCompra'].'</td>';
                        echo '<td>'.$row['precioVenta'].'</td>';
                        echo '<td>'.$row['fechaCompra'].'</td>';
                        echo '<td>'.$row['categoria'].'</td>';
                        echo '<td>'.$row['unidadesEnExistencia'].'</td>';
                        echo '<td>'.$row['foto'].'</td>';   
                        echo '<td>'.$active.'</td>';          
                    echo '</tr>';                       
                    } // Fin while 

                    // Cierra la Conexión con la BD.
                    mysqli_close($conexion);

                    echo '</tbody>';
                echo '</table>';
            ?>  
            </div> <!-- / panel-body -->
        </div> <!-- / panel panel-default -->               
    </div> <!-- / col-md-14 -->
</div> <!-- / row -->
</div> <!-- / container -->
</body>
</html>