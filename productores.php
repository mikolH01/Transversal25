<?php
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Productores - Frutas de Temporada</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <header>
    <img src="imagenes/logo.png" alt="Logo del Proyecto" class="logo">
    <h1>Frutas de Temporada del Municipio</h1>
    <nav>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="frutas.php">Frutas</a></li>
        <li><a href="productores.php">Productores</a></li>
        <li><a href="conservacion.php">Conservación</a></li>
        <li><a href="tienda.php">Tienda</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </nav>
  </header>

  <section class="contenido">
    <h2>Nuestros Productores Locales</h2>
    <p>Conoce a los agricultores que cultivan las mejores frutas del municipio.</p>

    <table border="1" align="center" cellpadding="10">
      <tr style="background-color:#ffa726; color:white;">
        <th>ID</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Email</th>
        <th>Frutas que Produce</th>
      </tr>

      <?php
      $sql = "SELECT p.id_productor, p.nombre, p.telefono, p.direccion, p.email,
                     GROUP_CONCAT(f.nombre SEPARATOR ', ') AS frutas
              FROM productores p
              LEFT JOIN frutas f ON p.id_productor = f.id_productor
              GROUP BY p.id_productor";
      
      $resultado = $conexion->query($sql);

      if ($resultado && $resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($fila['id_productor']) . "</td>";
          echo "<td><strong>" . htmlspecialchars($fila['nombre']) . "</strong></td>";
          echo "<td>" . htmlspecialchars($fila['telefono']) . "</td>";
          echo "<td>" . htmlspecialchars($fila['direccion']) . "</td>";
          echo "<td>" . htmlspecialchars($fila['email']) . "</td>";
          echo "<td>" . htmlspecialchars($fila['frutas'] ? $fila['frutas'] : 'Ninguna') . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No hay productores registrados.</td></tr>";
      }
      ?>
    </table>
  </section>

  <footer>
    <p>&copy; 2025 Frutas de Temporada del Municipio | Todos los derechos reservados</p>
  </footer>

  <?php
  $conexion->close();
  ?>
</body>
</html>