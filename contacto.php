<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Contacto - Frutas de Temporada</title>
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
    <h2>📞 Contáctanos</h2>
    <p>¿Tienes dudas o quieres ser parte de nuestros productores? Escríbenos.</p>

    <div style="max-width: 600px; margin: 30px auto; text-align: left;">
      
      <form method="POST" action="contacto.php" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        
        <label for="nombre" style="display: block; margin-bottom: 5px; font-weight: bold;">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

        <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
        <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

        <label for="telefono" style="display: block; margin-bottom: 5px; font-weight: bold;">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

        <label for="mensaje" style="display: block; margin-bottom: 5px; font-weight: bold;">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="5" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"></textarea>

        <button type="submit" name="enviar" style="background: #ff9800; color: white; border: none; padding: 15px 30px; border-radius: 5px; cursor: pointer; font-weight: bold; width: 100%;">Enviar Mensaje</button>

      </form>

      <?php
      if (isset($_POST['enviar'])) {
        echo '<div style="background: #4caf50; color: white; padding: 15px; margin-top: 20px; border-radius: 5px; text-align: center;">';
        echo '✅ ¡Gracias por tu mensaje! Te contactaremos pronto.';
        echo '</div>';
      }
      ?>

      <div style="margin-top: 30px; padding: 20px; background: #fff3e0; border-radius: 10px;">
        <h3 style="color: #ff9800;">📍 Ubicación</h3>
        <p><strong>Dirección:</strong> Centro del Municipio, Local 123</p>
        <p><strong>Teléfono:</strong> 555-FRUTAS (378827)</p>
        <p><strong>Email:</strong> info@frutastemporada.com</p>
        <p><strong>Horario:</strong> Lunes a Sábado, 8:00 AM - 6:00 PM</p>
      </div>

    </div>
  </section>

  <footer>
    <p>&copy; 2025 Frutas de Temporada del Municipio | Todos los derechos reservados</p>
  </footer>
</body>
</html>