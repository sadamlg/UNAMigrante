<?php
// Datos de conexión a MySQL
$servidor = "132.248.247.240";
$usuario = "david"; // Cambia si tienes otro usuario
$clave = "reyes"; // Si tienes contraseña, ponla aquí
$base_datos = "emprendimiento_db";

// Conectar a MySQL
$conn = new mysqli($servidor, $usuario, $clave, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$nivel_estudios = $_POST['nivel_estudios'];
$nacionalidad = $_POST['nacionalidad'];
$doble_nacionalidad = $_POST['doble_nacionalidad'] ?? NULL;
$curp = $_POST['curp'] ?? NULL;
$codigo_identidad = $_POST['codigo_identidad'] ?? NULL;
$rango_edad = $_POST['rango_edad'];
$sexo = $_POST['sexo'];
$medio_conocido = $_POST['medio_conocido'];
$tematica_interes = $_POST['tematica_interes'] ?? NULL;
$acepto_terminos = isset($_POST['acepto_terminos']) ? 1 : 0;

// Verificar si el correo ya existe
$sql_verificar = "SELECT id FROM registros WHERE correo = '$correo'";
$resultado = $conn->query($sql_verificar);

if ($resultado->num_rows > 0) {
    echo "<script>
            alert('Error: El correo ya está registrado.');
            window.location.href = 'formulario.html';
          </script>";
    exit();
}

// Insertar datos
$sql = "INSERT INTO registros (nombre, apellidos, correo, nivel_estudios, nacionalidad, doble_nacionalidad, curp, codigo_identidad, rango_edad, sexo, medio_conocido, tematica_interes, acepto_terminos) 
        VALUES ('$nombre', '$apellidos', '$correo', '$nivel_estudios', '$nacionalidad', '$doble_nacionalidad', '$curp', '$codigo_identidad', '$rango_edad', '$sexo', '$medio_conocido', '$tematica_interes', '$acepto_terminos')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Registro exitoso.');
            window.location.href = 'formulario.html';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>