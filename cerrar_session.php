<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Modal Example</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Botón para abrir el modal -->
  <button type="button" class="btn btn-primary" id="openModalButton" data-toggle="modal" data-target="#myModal" style="display: none;">
    Abrir Modal
  </button>

  <!-- El Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alerta de Finalización de Session</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Desea Finalizar Sesion?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="history.back(-1)">Cancelar</button>
          <form action="" method="POST">
                <button type="submit" name="cerrar_s" class="btn btn-primary">Cerrar Sesión</button>
          </form>     
          <?php
            if(isset($_POST['cerrar_s'])){
                // Inicia la sesión
                session_start();
                
                // Destruye todas las variables de sesión
                session_destroy();
                
                // Redirige a la página de inicio de sesión o a otra página pública
                header("Location: login.php");
                exit();
            }
            ?>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery, Popper.js, and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Script para abrir el modal automáticamente -->
  <script>
    $(document).ready(function() {
      $('#openModalButton').click();
    });
    
  </script>
</body>
</html>
