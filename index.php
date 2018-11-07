<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    $con = mysqli_connect("localhost","root","","proyt") or die ("Error");
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="index.php">
        <label>Nombre:</label>
        <input type="text" name="nombre" placeholder="Escriba su Nombre "> <br/>
        <label>Apellido:</label>
        <input type="text" name="apellido" placeholder="Escriba su Apellido "> <br/>
        <label>Email:</label>
        <input type="text" name="email" placeholder="Escriba su Email "> <br/>
        <input type="submit" name="insert" Value="Insertar datos"> <br/>
    </form>
    <?php
        if(isset($_POST['insert']))
            {
             $nombre= $_POST ['nombre'];
             $apellido= $_POST['apellido'];
             $email= $_POST['email'];

             $insertar="INSERT INTO usuario (nombre,apellido,email) VALUES ('$nombre','$apellido','$email')";
             $ejecutar= mysqli_query($con, $insertar);

             if($ejecutar){
                 echo"<h3>Insertado correctamente</h3>";
             }
            }
    ?>
    <br />
    <table width="500" style=" border:2; backgroud-color:#F9F9F9 " >
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
            <?php
                $consulta="SELECT * FROM usuario";
                $ejecutar= mysqli_query($con,$consulta);
                $i =0;

                while ($fila = mysqli_fetch_array($ejecutar)){
                    $id=$fila['id'];
                    $nombre=$fila['nombre'];
                    $apellido=$fila['apellido'];
                    $email=$fila['email'];
                    $i++;
                
            ?>
            <tr aling:"center">
                <td><?php echo $id; ?></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $apellido; ?></td>
                <td><?php echo $email; ?></td>
                <td><a href="index.php?editar=<?php echo $id; ?>">Editar</a></td>
                <td><a href="index.php?borrar=<?php echo $id; ?>">Borrar</a></td>
            </tr>
            <?php } ?>

    </table>
    <?php 
        if(isset($_GET['editar']))
        {
            include("editar.php");
        }
    ?>
    <?php
        if(isset($_GET['borrar']))
        {
            $borrar_id=$_GET['borrar'];
            $borrar="DELETE FROM usuario where id='$borrar_id'";
            $ejecutar= mysqli_query($con, $borrar);

            if($ejecutar){
                echo"<script>alert ('Usuario borrado')</script>";
                echo"<script>window.open('index.php','_self')</script>";
            }
        }
    ?>


</body>
</html>