 <thead>
     <tr>
         <th>Identificador</th>
         <th>Nombre</th>
         <th>Descripción</th>
         <th>Acciones</th>
     </tr>
 </thead>

 <?php
    // Incluir la conexión a la base de datos y cualquier configuración necesaria
    include 'conexion/conexion.php';
    ///Ajax para actualizar dinamicamente la tabla de roles 
    $consulta_roles = $mysqli->query("SELECT * FROM roles WHERE estado = 1 ORDER BY identificador");
    while ($extraer_roles = $consulta_roles->fetch_array()) {
    ?>
     <tr>
         <td><?php echo $extraer_roles['identificador']; ?></td>
         <td><?php echo $extraer_roles['nombre']; ?></td>
         <td><?php echo $extraer_roles['descripcion']; ?></td>
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