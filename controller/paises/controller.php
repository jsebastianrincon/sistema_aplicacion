<?php

include '../../conexion/conexion.php';
    
if(isset($_POST['desactivar_pais'])){
    echo 'A';
    $id_pais = $_POST['id_pais'];
    
    $desactivar_pais = $mysqli->query("UPDATE paises SET estado = 0 WHERE identificador = $id_pais");
?>
    <script> 
                 window.onload=function(){
               
                     document.forms["miformulario"].submit();
                 }
            </script>
             
            <form name="miformulario" action="../../listar_paises" method="POST" onsubmit="procesar(this.action);" >
                <input type="hidden" name="validacionDesactivar" value="1">
            </form> 
<?php
    
}

if(isset($_POST['activar_pais'])){
    echo 'A';
    $id_pais = $_POST['id_pais'];
    
    $desactivar_pais = $mysqli->query("UPDATE paises SET estado = 1 WHERE identificador = $id_pais");
?>
    <script> 
                 window.onload=function(){
               
                     document.forms["miformulario"].submit();
                 }
            </script>
             
            <form name="miformulario" action="../../listar_paises" method="POST" onsubmit="procesar(this.action);" >
                <input type="hidden" name="validacionActivar" value="1">
            </form> 
<?php
    
}

?>