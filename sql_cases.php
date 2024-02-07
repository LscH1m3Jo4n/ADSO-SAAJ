<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "saaj";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, 3308);
//Parametros para la conexion en otros dispositivos, eliminar el ultimo que especifica en que puerto conectar el xampp


if (!$conn) {
    die("No hay conexión: " . mysqli_connect_error());
}
// Verificar la conexión

$document = mysqli_real_escape_string($conn, $_POST["document"]);
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$tarjeta = mysqli_real_escape_string($conn, $_POST["tp"]);
$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
$phone = mysqli_real_escape_string($conn, $_POST["phone"]);
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$city = mysqli_real_escape_string($conn, $_POST["city"]);

//Parametros de definicion


$data = "INSERT INTO procesos (documento, nombre, tarjeta_profesional, apellido, telefono, direccion, ciudad) VALUES ('$document', '$name', '$tarjeta', '$lastname', '$phone', '$address', '$city')";
//Insercion de datos dentro de la base de datos de radicados

if (mysqli_query($conn, $data)) {
    header('Location: online.html');
} else {
    echo "Error al insertar los datos: " . mysqli_error($conn);
}
//Condicion de verificacion de datos
mysqli_close($conn);
//cierre de conexion
?>