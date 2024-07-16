<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
  <title>Glance Design Dashboard an Admin Panel Category Flat Bootstrap Responsive Website Template | Tables ::
    w3layouts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link rel="stylesheet" type="text/css" href="css_personalizado/estilos_personalizados.css" />

  <!-- Custom CSS -->
  <link href="css/style.css" rel='stylesheet'>
  

  <!-- font-awesome icons CSS -->
  <link href="css/font-awesome.css" rel="stylesheet">
  <!-- //font-awesome icons CSS -->

  <!-- side nav css file -->
  <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css' />
  <!-- side nav css file -->

  <!-- js-->
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/modernizr.custom.js"></script>

  <!--webfonts-->
  <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
  <!--//webfonts-->

  <!-- Metis Menu -->
  <script src="js/metisMenu.min.js"></script>
  <script src="js/custom.js"></script>
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos_adicionales.css">
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <!--//Metis Menu -->

</head>

<body class="cbp-spmenu-push">
  <div class="main-content">
    <?php
    include 'menu.php';
    session_start();
    ?>
    <!--left-fixed -navigation-->

    <!-- header-starts -->
  
    <!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">
        <div class="tables">
          <h2 class="title1">PAISES</h2>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Agregar Pais</button>


          <a type="button" class="btn btn-danger" href="listar_paises_desactivados"><i class="fa fa-ban"></i>
            Listar Paises Desactivados</a>

          <!-- Modal -->
          <a type="button" class="btn btn-info" href="cargar_paises"><i class="fa fa-upload"></i>
            Cargar Paises</a>
            

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Agregar Pais</h5>
                  <button type="button" id="cerrar" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" id="form_registro_paises">
                      
                    <label>Nombre Pais</label>&nbsp;<abbr title="Se recomienda ingresar el nombre del pais en mayusculas" class="info_color"><i class="fa fa-info"></i></abbr>
                    <br>
                    <input class="form-control" name="nombre_pais" id="nombre_pais">
                    <br>
                    <button type="button" onclick="guardar_pais()" class="btn btn-success">Guardar</button>
                  </form>
                  <div id="message"></div>
                  <script>
                    function guardar_pais() {
                      const nombre_pais = document.getElementById('nombre_pais').value;

                      const xhr = new XMLHttpRequest();
                      xhr.open('POST', 'ajax_guardar_pais.php', true);
                      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                      xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                          document.getElementById('message').textContent = xhr.responseText;
                          if (xhr.responseText.includes("guardado exitosamente")) {
                            limpiarModal(); // Llama a la función para limpiar el modal
                            refreshTable(); // Llama a la función para refrescar la tabla después de guardar

                          }
                        }
                      };

                      const data = `nombre_pais=${encodeURIComponent(nombre_pais)}`;
                      xhr.send(data);
                    }

                    function refreshTable() {
                      const xhr = new XMLHttpRequest();
                      xhr.open('GET', 'ajax_actualiza_tabla_paises.php', true); // Archivo PHP que genera la tabla de países
                      xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                          document.getElementById('dataTable').innerHTML = xhr.responseText;
                        }
                      };
                      xhr.send();
                    }

                    function limpiarModal() {
                      // Limpiar el campo del nombre del país
                      document.getElementById('nombre_pais').value = '';
                      // Limpiar cualquier otro campo del formulario si es necesario
                      document.addEventListener('DOMContentLoaded', function() {
                        // Obtener el modal por su id
                        var modal = document.getElementById('exampleModal');

                        // Escuchar el evento de cierre del modal
                        modal.addEventListener('hidden.bs.modal', function() {
                          // Limpiar el campo del nombre del país
                          document.getElementById('nombre_pais').value = '';

                          // Limpiar el mensaje dentro del div
                          document.getElementById('message').textContent = '';
                        });
                      });

                    }

                    function limpiaralerta() {
                      document.getElementById('message').value = '';
                    }
                    // Esperar a que el documento esté completamente cargado
                  </script>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
              </div>
            </div>
          </div>

          <div class="bs-example widget-shadow" data-example-id="hoverable-table">
            <h4>Lista de Paises Activos</h4>
            <div class="buscar">
              <div class="contenedor-1">
                <center>
                  <span class="icon"><i class="fa fa-search"></i></span>
                  <center>
                    <input type="text" id="searchInput" placeholder="Buscar...">
                  </center>
                  <script>
                    $(document).ready(function() {
                      $('#searchInput').on('keyup', function() {
                        var searchText = $(this).val().toLowerCase();
                        $('#dataTable tbody tr').each(function() {
                          var found = false;
                          $(this).each(function() {
                            if ($(this).text().toLowerCase().indexOf(searchText) !== -1) {
                              found = true;
                              return false;
                            }
                          });
                          if (found) {
                            $(this).show();
                          } else {
                            $(this).hide();
                          }
                        });
                      });
                    });
                  </script>
                </center>
              </div>
            </div>
            <table class="table table-hover" id="dataTable">
              <thead>
                <tr>
                  <th>Identificador</th>
                  <th>Nombre</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $consulta_paises = $mysqli->query("SELECT * FROM paises WHERE estado = 1 ORDER BY identificador");
                while ($extraer_paises = $consulta_paises->fetch_array()) {
                ?>
                  <tr>
                    <td><?php echo $extraer_paises['identificador']; ?></td>
                    <td><?php echo $extraer_paises['nombre_pais']; ?></td>
                    <td>
                      <div class="button-container">
                        <form action="controller/paises/controller.php" method="POST">
                          <input type="hidden" value="<?php echo $extraer_paises['identificador']; ?>" name="id_pais">
                          <button type="submit" name="desactivar_pais" class="btn btn-danger btn-sm">
                            <i class="fa fa-close"></i> Desactivar
                          </button>
                        </form>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalE_<?php echo $extraer_paises['identificador']; ?>">
                          <i class="fa fa-edit"></i> Editar
                        </button>
                        <div class="modal fade" id="exampleModalE_<?php echo $extraer_paises['identificador']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelE_<?php echo $extraer_paises['identificador']; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelE_<?php echo $extraer_paises['identificador']; ?>">Actualizar País</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_editar_pais_<?php echo $extraer_paises['identificador']; ?>">
                                            <input type="hidden" name="id_pais" value="<?php echo $extraer_paises['identificador']; ?>">
                                            <label for="nombre_pais">Nombre País</label>
                                            <input type="text" class="form-control" id="nombre_pais_<?php echo $extraer_paises['identificador']; ?>" name="nombre_pais" value="<?php echo $extraer_paises['nombre_pais']; ?>">
                                        </form>
                                        <div id="message_<?php echo $extraer_paises['identificador']; ?>"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary" onclick="actualizar_pais_<?php echo $extraer_paises['identificador']; ?>()">Guardar cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <script>
                            // Lógica para actualizar la tabla después de cerrar el modal
                            $('#exampleModalE_<?php echo $extraer_paises['identificador']; ?>').on('hidden.bs.modal', function () {
                                refreshTable();
                            });
                        </script>
                      </div>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>

            <script>
              <?php
              $consulta_paises->data_seek(0);
              while ($extraer_paises = $consulta_paises->fetch_array()) {
              ?>

                function actualizar_pais_<?php echo $extraer_paises['identificador']; ?>() {
                  const nombre_pais = document.getElementById('nombre_pais_<?php echo $extraer_paises['identificador']; ?>').value;
                  const id_pais = <?php echo $extraer_paises['identificador']; ?>;

                  const xhr = new XMLHttpRequest();
                  xhr.open('POST', 'ajax_actualizar_pais.php', true);
                  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                  xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                      document.getElementById('message_<?php echo $extraer_paises['identificador']; ?>').textContent = xhr.responseText;
                      if (xhr.responseText.includes("guardado exitosamente")) {
                        limpiarModal_<?php echo $extraer_paises['identificador']; ?>(); 
                        refreshTable();
                      }
                    }
                  };

                  const data = `id_pais=${encodeURIComponent(id_pais)}&nombre_pais=${encodeURIComponent(nombre_pais)}`;
                  xhr.send(data);
                }

                function limpiarModal_<?php echo $extraer_paises['identificador']; ?>() {

                  document.getElementById('nombre_pais_<?php echo $extraer_paises['identificador']; ?>').value = '';
               
                  document.getElementById('message_<?php echo $extraer_paises['identificador']; ?>').textContent = '';

                  $('#exampleModalE_<?php echo $extraer_paises['identificador']; ?>').modal('hide'); 
                }
              <?php
              }
              ?>
            </script>

            <script>
              function refreshTable() {
                    const xhr = new XMLHttpRequest();
                    xhr.open('GET', 'ajax_actualiza_tabla_paises.php', true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            document.getElementById('dataTable').innerHTML = xhr.responseText;
                            setTimeout(refreshTable, 1000); 
                        }
                    };
                    xhr.send();
                }
            </script>
          </div>

        </div>
      </div>
    </div>
    <!--footer-->
    <div class="footer">
      <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
    </div>
    <!--//footer-->
  </div>

  <!-- side nav js -->
  <script src='js/SidebarNav.min.js' type='text/javascript'></script>
  <script>
    $('.sidebar-menu').SidebarNav()
  </script>
  <!-- //side nav js -->

  <!-- Classie --><!-- for toggle left push menu script -->
  <script src="js/classie.js"></script>
  <script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
      showLeftPush = document.getElementById('showLeftPush'),
      body = document.body;

    showLeftPush.onclick = function() {
      classie.toggle(this, 'active');
      classie.toggle(body, 'cbp-spmenu-push-toright');
      classie.toggle(menuLeft, 'cbp-spmenu-open');
      disableOther('showLeftPush');
    };

    function disableOther(button) {
      if (button !== 'showLeftPush') {
        classie.toggle(showLeftPush, 'disabled');
      }
    }
  </script>
  <!-- //Classie --><!-- //for toggle left push menu script -->

  <!--scrolling js-->
  <script src="js/jquery.nicescroll.js"></script>
  <script src="js/scripts.js"></script>
  <!--//scrolling js-->

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.js"> </script>
  <?php
  /// validaciones de alertas

  $validacionDesactivar = $_POST['validacionDesactivar'];
  $validacionActivar = $_POST['validacionActivar'];

  ?>
  <script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 7000
      });


      <?php
      if ($validacionDesactivar == 1) {
      ?>
        Toast.fire({
          type: 'warning',
          title: 'Pais Desactivado.'
        })
      <?php
      }
      if ($validacionActivar == 1) {
      ?>
        Toast.fire({
          type: 'success',
          title: 'Pais Activado.'
        })
      <?php
      }

      if ($validacionAgregar == 1) {
      ?>
        Toast.fire({
          type: 'success',
          title: 'Bodega Agregado.'
        })
      <?php
      }
      if ($validacionAgregarB == 1) {
      ?>
        Toast.fire({
          type: 'success',
          title: 'Registro Activado.'
        })
      <?php
      }

      if ($validacionActualizar == 1) {
      ?>
        Toast.fire({
          type: 'info',
          title: 'Bodega Actualizada.'
        })
      <?php
      }

      if ($validacionEliminar == 1) {
      ?>
        Toast.fire({
          type: 'error',
          title: 'Registro eliminado.'
        })

      <?php
      }

      if ($validacionDesactivarB == 1) {
      ?>
        Toast.fire({
          type: 'warning',
          title: 'Bodega Desactivada.'
        })
      <?php
      }
      ?>

    });
  </script>

</body>

</html>