<?php
include('conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Frutas - Temporada del Municipio</title>
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
    <h2>Catálogo de Frutas de Temporada</h2>
    <p>Conoce todas las frutas disponibles en nuestro municipio, organizadas por temporada.</p>

    <div style="text-align: center; margin: 30px 0;">
      <h3 style="color: #ff9800;">🌸 Primavera-Verano</h3>
      <table border="1" align="center" cellpadding="10" style="margin-bottom: 30px;">
        <tr style="background-color:#ffa726; color:white;">
          <th>Fruta</th>
          <th>Precio</th>
          <th>Descripción</th>
          <th>Productor</th>
        </tr>
        <?php
        $sql = "SELECT f.nombre, f.precio, f.descripcion, p.nombre AS productor
                FROM frutas f
                LEFT JOIN productores p ON f.id_productor = p.id_productor
                WHERE f.temporada LIKE '%Primavera%' OR f.temporada LIKE '%Verano%'";
        $resultado = $conexion->query($sql);
        
        if ($resultado && $resultado->num_rows > 0) {
          while($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td><strong>" . htmlspecialchars($fila['nombre']) . "</strong></td>";
            echo "<td>$" . number_format($fila['precio'], 2) . "/kg</td>";
            echo "<td>" . htmlspecialchars($fila['descripcion']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['productor']) . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No hay frutas en esta temporada.</td></tr>";
        }
        ?>
      </table>

      <h3 style="color: #ff9800;">🍂 Otoño-Invierno</h3>
      <table border="1" align="center" cellpadding="10" style="margin-bottom: 30px;">
        <tr style="background-color:#ffa726; color:white;">
          <th>Fruta</th>
          <th>Precio</th>
          <th>Descripción</th>
          <th>Productor</th>
        </tr>
        <?php
        $sql = "SELECT f.nombre, f.precio, f.descripcion, p.nombre AS productor
                FROM frutas f
                LEFT JOIN productores p ON f.id_productor = p.id_productor
                WHERE f.temporada LIKE '%Otoño%' OR f.temporada LIKE '%Invierno%'";
        $resultado = $conexion->query($sql);
        
        if ($resultado && $resultado->num_rows > 0) {
          while($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td><strong>" . htmlspecialchars($fila['nombre']) . "</strong></td>";
            echo "<td>$" . number_format($fila['precio'], 2) . "/kg</td>";
            echo "<td>" . htmlspecialchars($fila['descripcion']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['productor']) . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No hay frutas en esta temporada.</td></tr>";
        }
        ?>
      </table>

      <h3 style="color: #ff9800;">📅 Todo el Año</h3>
      <table border="1" align="center" cellpadding="10">
        <tr style="background-color:#ffa726; color:white;">
          <th>Fruta</th>
          <th>Precio</th>
          <th>Descripción</th>
          <th>Productor</th>
        </tr>
        <?php
        $sql = "SELECT f.nombre, f.precio, f.descripcion, p.nombre AS productor
                FROM frutas f
                LEFT JOIN productores p ON f.id_productor = p.id_productor
                WHERE f.temporada LIKE '%Todo el año%'";
        $resultado = $conexion->query($sql);
        
        if ($resultado && $resultado->num_rows > 0) {
          while($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td><strong>" . htmlspecialchars($fila['nombre']) . "</strong></td>";
            echo "<td>$" . number_format($fila['precio'], 2) . "/kg</td>";
            echo "<td>" . htmlspecialchars($fila['descripcion']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['productor']) . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No hay frutas en esta temporada.</td></tr>";
        }
        ?>
      </table>
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