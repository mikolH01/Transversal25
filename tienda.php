<?php
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Tienda - Frutas de Temporada</title>
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
    <h2>🛒 Tienda en Línea</h2>
    <p>Compra frutas frescas directamente de los productores locales.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; padding: 30px;">
      
      <?php
      $sql = "SELECT f.id_fruta, f.nombre, f.precio, f.descripcion, p.nombre AS productor
              FROM frutas f
              LEFT JOIN productores p ON f.id_productor = p.id_productor";
      
      $resultado = $conexion->query($sql);

      if ($resultado && $resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
          echo '<div style="border: 2px solid #ff9800; border-radius: 10px; padding: 20px; background: white; text-align: center;">';
          echo '<h3 style="color: #ff9800;">' . htmlspecialchars($fila['nombre']) . '</h3>';
          echo '<p style="font-size: 24px; color: #4caf50; font-weight: bold;">$' . number_format($fila['precio'], 2) . ' /kg</p>';
          echo '<p>' . htmlspecialchars($fila['descripcion']) . '</p>';
          echo '<p style="font-size: 12px; color: gray;">Productor: ' . htmlspecialchars($fila['productor']) . '</p>';
          echo '<button style="background: #ff9800; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-weight: bold;">Agregar al Carrito</button>';
          echo '</div>';
        }
      } else {
        echo "<p>No hay productos disponibles en este momento.</p>";
      }
      ?>

    </div>
  </section>

  <footer>
    <p>&copy; 2025 Frutas de Temporada del Municipio | Todos los derechos reservados</p>
  </footer>

  <?php
  $conexion->close();
  ?>
</body>
</html>