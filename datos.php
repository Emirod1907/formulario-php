<?php

    require_once 'conexion.php';

    if(isset($_POST['Nombre'], $_POST['Apellido'],$_POST['Fecha_de_nacimiento'],$_POST['DNI'], $_POST['Email'], $_POST['Celular'], $_POST['Pais']) &&
    !empty($_POST['Nombre']) && !empty($_POST['Apellido']) && !empty($_POST['Fecha_de_nacimiento']) && !empty($_POST['DNI']) && !empty($_POST['Email']) && !empty($_POST['Celular']) && !empty($_POST['Pais'])
    ){ 

        $Nombre=$_POST['Nombre'];
        $Apellido=$_POST['Apellido'];
        $Fecha_de_nacimiento=$_POST['Fecha_de_nacimiento'];
        $DNI=$_POST['DNI'];
        $Email=$_POST['Email'];
        $Celular=$_POST['Celular'];
        $Pais=$_POST['Pais'];

        //validaciones

        $campos=array();
        if($Nombre ==""){
            array_push($campos,"El campo Nombre es obligatorio");
        }
        if($Apellido ==""){
            array_push($campos,"El campo Apellido es obligatorio");
        }
        if($Fecha_de_nacimiento ==""){
            array_push($campos,"El campo Fecha de nacimiento es obligatorio");
        }
        if($DNI == ""|| strlen($DNI)<7){
            array_push($campos,"El campo DNI es obligatorio y debe debe ingresar una cifra mayor a 7 digitos");
        }
        if($Email ==""|| strpos($Email,"@")===false){
            array_push($campos,"Ingrese un correo electronico válido");
        }
        if($Celular ==""){
            array_push($campos,"El campo Celular es obligatorio");
        }
        if($Pais ==""){
            array_push($campos,"El campo Pais es obligatorio");
        }
        if(count($campos)>0){
            echo "<div class='Error'><br>";
            for($i=0; $i < count($campos); $i++)
            {
                echo "<li>".$campos[$i]."</li>";
            }
            echo "</div>";
        }
        else {
            echo "Datos correctos!<br>";
        }

    //validacion y carga del archivo
    $info = pathinfo($_FILES['archivo']['name'],PATHINFO_EXTENSION);
    $ruta="archivos/".$_FILES['archivo']['name'];
    if($_FILES['archivo']['size']>0)
    {
        if(in_array(strtolower($info),['pdf','doc']))
        {
            if(move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta))
                {echo 'CV enviado exitosamente<br>';}
            else{
                echo 'error al copiar el archivo en el directorio<br>';
                exit();
            }
        }
        else
            {echo 'error al enviar, debe ingresar archivos en formato .pdf o .doc<br>';
            exit();}
    }
    else{echo '<p> Por favor, ingrese un archivo de curriculum en el<a href="index1.php">formulario</a><br></p>';
        exit();}

        // inserciones en BD
        $consulta = "INSERT INTO Postulantes
        (Nombre, Apellido, Fecha_de_nacimiento, DNI, Email, Celular, Pais) 
        values ('$Nombre', '$Apellido', '$Fecha_de_nacimiento', '$DNI', '$Email', '$Celular', '$Pais')";
        
        if(mysqli_query($conexion, $consulta))
        {
            $id_postulante = mysqli_insert_id($conexion);
        }
        
        $consulta1= "INSERT INTO cv_Postulante
        (id_postulante, Nombre_archivo) 
        values ('$id_postulante','$ruta')";
        
        if(mysqli_query($conexion, $consulta1))
        {
            echo "<p>Admision realizada correctamente <br></p>";
            exit();
        }
        else{
            echo "<p>Error al agregar registro.mysqli_error($conexion)<br></p>";
            exit();
        }

        echo '<p> Por favor, complete el<a href="index1.php">formulario</a> correctamente<br></p>';
        exit();
    }
    ?>