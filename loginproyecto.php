<?php
    if (array_key_exists('username',$_POST) OR
    array_key_exists('password',$_POST)) {

        $servidor = "sdb-51.hosting.stackcp.net";
        $bd = "bdpruebas-35303033a085";
        $usuario = "usuario-3ea9";
        $password = "usuario123";

        $enlace = mysqli_connect($servidor, $usuario, $password, $bd); 
        if (mysqli_connect_error()) {
            die("Error en la conexión");
        }
        if ($_POST['username']=='') {
            echo "<p> El campo usuario es obligatorio </p>";
        }
        else if ($_POST['password']=='') {
            echo "<p> El campo password es obligatorio </p>";
        }
        else {
            $contra = $_POST['password'];
            $cifrada = md5($contra);
            $query = "SELECT username, password FROM usuarios WHERE username='".mysqli_real_escape_string($enlace,$_POST['username'])."' AND password='".$cifrada."'";
            $result = mysqli_query($enlace,$query);
            if (mysqli_num_rows($result)>0) {
                setcookie("id",mysqli_insert_id($enlace),time()+60*60*24*365);
                header('Location: https://iawdanielvaldes-com.stackstaging.com/proyecto.php');
                
            }
            else {
                echo "<p> El usuario o contraseña que ha introducido no existe </p>";
        }
    }
}

?>
<html>
<link rel="stylesheet" href="style.css">
    <body>
<form method="post">
    <input type="text" name="username" placeholder="Usuario">
    <input type="password" name="password" placeholder="Contraseña">
    <br>
    <input type="submit" value="Registro">
</form>
    <body>
</html>