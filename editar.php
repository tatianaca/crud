<?php 
    if(isset($_GET['editar'])){
        $editar_id = $_GET['editar'];

        $consulta = "SELECT * FROM usuario WHERE  id='$editar_id'";
        $ejecutar = mysqli_query($con,$consulta);

        $fila = mysqli_fetch_array($ejecutar);
        $nombre = $fila ['nombre'];
        $apellido = $fila ['apellido'];
        $email = $fila ['email'];
    }
?>
<br/>

<form method="POST" action=""> 
    <input type="text" name="nombre" value="<?php echo $nombre; ?>" >
    <input type="text" name="apellido" value="<?php echo $apellido; ?>" >
    <input type="text" name="email" value="<?php echo $email; ?>" >
    <input type="submit" name ="actualizar" value="ACTUALIZAR DATOS">
</form>

<?php
if(isset($_POST['actualizar'])){
    $actualizar_nombre = $_POST['nombre'];
    $actualizar_apellido = $_POST['apellido'];
    $actualizar_email = $_POST['email'];

    $actualizar ="UPDATE usuario SET nombre = '$actualizar_nombre', apellido='$actualizar_apellido',email='$actualizar_email' WHERE id='$editar_id' ";
    $ejecutar = mysqli_query($con,$actualizar);

    if($ejecutar){
        echo "<script>alert ('Datos actualizados')  </script>";
        echo "<script> window.open('index.php') </script>";
    }
}   
?>