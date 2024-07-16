<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilos personalizados para el login */
    .login-container {
      background-image: url('ruta/a/tu/imagen-de-fondo.jpg');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-form {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <form class="login-form">
      <!-- Aquí van los campos del formulario de login -->
      <h2 class="text-center mb-4">Iniciar Sesión</h2>
      <div class="form-group">
        <label for="username">Usuario</label>
        <input type="text" class="form-control" id="username" placeholder="Ingresa tu usuario">
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
    </form>
  </div>

  <!-- Bootstrap JS y cualquier otro JS necesario -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
