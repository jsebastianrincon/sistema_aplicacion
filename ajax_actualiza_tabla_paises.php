 <thead>
     <tr>
         <th>Identificador</th>
         <th>Nombre</th>
         <th>Acciones</th>
     </tr>
 </thead>

 <?php
    // Incluir la conexión a la base de datos y cualquier configuración necesaria
    ///Este es el ajax de actualizacion dinamica comentario desde local a hostinger

    include 'conexion/conexion.php';

    $consulta_paises = $mysqli->query("SELECT * FROM paises WHERE estado = 1 ORDER BY identificador");
    while ($extraer_paises = $consulta_paises->fetch_array()) {
    ?>
     <tr>
         <td><?php echo $extraer_paises['identificador']; ?></td>
         <td><?php echo $extraer_paises['nombre_pais']; ?></td>
         <td>
             <div class="button-container">
                 <form action="">
                     <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Desactivar</button>
                 </form>
                 <form action="">
                     <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Editar</button>
                 </form>
             </div>
         </td>
     </tr>
 <?php
    }
    ?>