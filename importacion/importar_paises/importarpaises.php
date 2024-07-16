<?php

require('conexion.php');
include '../../conexion/conexion.php';


$tipo       = $_FILES['archivo_paises']['type'];
$tamanio    = $_FILES['archivo_paises']['size'];
$archivotmp = $_FILES['archivo_paises']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;
 

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);
    if ($i != 0) {

        $datos = explode(";", $linea);
       
        $nombre_pais    = (strtoupper(!empty($datos[0])  ? ($datos[0]) : ''));
        $valida_paises = $mysqli->query("SELECT COUNT(codigo) cantidad FROM rg_paises WHERE nombre LIKE '%$nombre_pais%'");
        $extraer_paises = $valida_paises->fetch_array(MYSQLI_ASSOC);
        $existencia = $extraer_paises['cantidad'];
        
        if($existencia > 0){
            echo '<script>
                        alert("Esta intentando cargas paises ya existentes");
                        window.location.href="../../listarpaises.php";
                  </script>';
        }else{
           
            $consultaultimopais = $mysqli->query("SELECT MAX(codigo) ultimo FROM rg_paises");
            $extraer_paises = $consultaultimopais->fetch_array(MYSQLI_ASSOC);
            $ultimo = $extraer_paises['ultimo']+1;
             
            $insertarData = $mysqli->query("INSERT INTO rg_paises(codigo,nombre,tipo_estado,estado) 
                                            VALUES ('$ultimo','$nombre_pais','1','1')");
                                                    
            
    
            ?>    

     <script> 
        window.onload=function(){
           document.forms["miformulario"].submit();
        }
    </script>
             
    <form name="miformulario" action="../../listar_paises" method="POST" onsubmit="procesar(this.action);" >
        <input type="hidden" name="validacionAgregarImportacion" value="1">
    </form> 
<?php
}
    }

 $i++;
}

?>
