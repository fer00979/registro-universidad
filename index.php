<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Alumnos y Tareas</title>
    <link rel="stylesheet" href="estilos.css">
    <script>
        function mostrarSeccion(idSeccion) {
            var seccion = document.getElementById(idSeccion);
            seccion.style.display = "block";
        }

        function ocultarSeccion(idSeccion) {
            var seccion = document.getElementById(idSeccion);
            seccion.style.display = "none";
        }
    </script>
</head>
<body> 
    <h1>Bienvenido A Nuestra Base de datos de Alumnos</h1>
    <h1>Registro de Alumnos y Tareas</h1>
    <div class="formulario">
        <form action="agregar_alumno.php" method="post">
            <h2>Agregar Alumno</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <button type="submit">Agregar Alumno</button>
        </form>

        <form action="agregar_tarea.php" method="post">
            <h2>Agregar Tarea</h2>
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" required>
            <label for="estado">Estado:</label>
            <select id="estado" name="estado">
                <option value="pendiente">Pendiente</option>
                <option value="completada">Completada</option>
                <option value="no_completada">No Completada</option>
            </select>
            <button type="submit">Agregar Tarea</button>
        </form>
    </div>

    <!-- Sección para seleccionar materia -->
    <h2>Selecciona tu materia:</h2>
    <button onclick="mostrarSeccion('materia')">Seleccionar Materia</button>
    <div id="materia" style="display: none;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="radio" name="materia" value="Matematicas"> Matemáticas <br>
            <input type="radio" name="materia" value="Lengua"> Lengua <br>
            <input type="radio" name="materia" value="Ingles"> Inglés <br><br>
            <input type="submit" name="submit_materia" value="Seleccionar">
        </form>
    </div>

    <!-- Sección para dar de alta a un alumno -->
    <h2>Dar de Alta a un Alumno</h2>
    <button onclick="mostrarSeccion('altaAlumno')">Dar de Alta a un Alumno</button>
    <div id="altaAlumno" style="display: none;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Nombre: <input type="text" name="nombre_alumno"><br>
            Apellidos: <input type="text" name="apellidos_alumno"><br>
            Correo Electrónico: <input type="email" name="email_alumno"><br>
            Teléfono: <input type="text" name="telefono_alumno"><br>
            Centro de Formación: <input type="text" name="centro_formacion_alumno"><br><br>
            <input type="submit" name="submit_alumno" value="Dar de Alta">
        </form>
    </div>

    <!-- Sección para seleccionar clase extraescolar -->
    <h2>Selecciona tu clase extraescolar:</h2>
    <button onclick="mostrarSeccion('clase')">Seleccionar Clase Extraescolar</button>
    <div id="clase" style="display: none;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <select name="clase">
                <option value="Musica">Música</option>
                <option value="Futbol">Fútbol</option>
                <option value="Baloncesto">Baloncesto</option>
                <option value="Piano">Piano</option>
                <option value="Idiomas">Idiomas</option>
                <option value="Ajedrez">Ajedrez</option>
            </select><br><br>
            <input type="submit" name="submit_clase" value="Seleccionar">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit_materia'])) {
            $materia = $_POST['materia'];
            echo "<h2>Has seleccionado: $materia</h2>";
        }

        if (isset($_POST['submit_alumno'])) {
            $nombre = $_POST['nombre_alumno'];
            $apellidos = $_POST['apellidos_alumno'];
            $email = $_POST['email_alumno'];
            $telefono = $_POST['telefono_alumno'];
            $centro_formacion = $_POST['centro_formacion_alumno'];

            echo "<h2>Alumno Registrado:</h2>";
            echo "Nombre: $nombre <br>";
            echo "Apellidos: $apellidos <br>";
            echo "Correo Electrónico: $email <br> <br>";
            echo "Teléfono: $telefono <br>";
            echo "Centro de Formación: $centro_formacion";
        }

        if (isset($_POST['submit_clase'])) {
            $clase = $_POST['clase'];
            echo "<h2>Has seleccionado la clase de: $clase</h2>";
        }
    }
    ?>
</body>
</html>
