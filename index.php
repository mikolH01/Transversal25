<?php
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Frutas de Temporada - Municipio</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <header>
    <img src="imagenes/logo.png" alt="Logo del Proyecto" class="logo">
    <h1>Frutas de Temporada del Municipio</h1>
    <nav>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="#">Frutas</a></li>
        <li><a href="#">Productores</a></li>
        <li><a href="#">Conservación</a></li>
        <li><a href="#">Tienda</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
    </nav>
  </header>

  <section class="contenido">
    <h2>Bienvenido</h2>
    <p>Explora las frutas de temporada de nuestro municipio, aprende cómo conservarlas y apoya a los productores locales.</p>
    <img src="imagenes/frutas.jpg" alt="Frutas de temporada" class="portada">
  </section>

  <section class="contenido">
    <h2>Frutas disponibles</h2>

    <table border="1" align="center" cellpadding="10">
      <tr style="background-color:#ffa726; color:white;">
        <th>ID</th>
        <th>Nombre</th>
        <th>Temporada</th>
        <th>Precio</th>
        <th>Descripción</th>
        <th>Productor</th>
      </tr>

      <?php
      $sql = "SELECT frutas.id_fruta, frutas.nombre, frutas.temporada, frutas.precio, frutas.descripcion, productores.nombre AS productor
              FROM frutas
              LEFT JOIN productores ON frutas.id_productor = productores.id_productor";
      
      $resultado = $conexion->query($sql);

      if ($resultado && $resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($fila['id_fruta']) . "</td>";
          echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
          echo "<td>" . htmlspecialchars($fila['temporada']) . "</td>";
          echo "<td>$" . number_format($fila['precio'], 2) . "</td>";
          echo "<td>" . htmlspecialchars($fila['descripcion']) . "</td>";
          echo "<td>" . htmlspecialchars($fila['productor']) . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No hay frutas registradas.</td></tr>";
      }
      ?>
    </table>
  </section>

  <footer>
    <p>&copy; 2025 Frutas de Temporada del Municipio. Todos los derechos reservados.</p>
  </footer>

  <?php
  $conexion->close();
  ?>
</body>
</html>