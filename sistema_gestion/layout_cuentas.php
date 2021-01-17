<!DOCTYPE html>
<html>
<head>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Mega Envios</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../templates/solicitar_cliente.php">Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../templates/transferencias.php">Informe De transferencias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="../controller/cerrarSesion.php">Cerrar Sesión</a>
      </li>
    </ul>
  </div>
</nav>
    <?=$content?>
</body>
</html>