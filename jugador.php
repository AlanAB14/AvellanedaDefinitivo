<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SportivoAvellaneda</title>

   <!--MENU RESPONSIVO-->
   <link rel="stylesheet" href="css/css/navigation1.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/css/navigation2.css"> <!-- Resource style -->
	<script src="js/js/modernizr.js"></script> <!-- Modernizr -->
    <link rel="stylesheet" href="css/navigation-responsive.css">
    <link rel="stylesheet" href="css/navigation-responsive1.css">

    <!--BOOTSTRAP CSS-->
    <link rel="icon" type="image/png" href="img/avellaneda.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/avellaneda.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/avellaneda.png" sizes="64x64">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

     

    <!--FONTAWESOME-->
    <script src="https://kit.fontawesome.com/35ffb07adf.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="css/css/navigation1.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/css/navigation2.css"> <!-- Resource style -->
    <script src="js/js/modernizr.js"></script> <!-- Modernizr -->
    

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilo_jugador.css">
    <link rel="stylesheet" href="css/lightbox.css">

    


    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Trade+Winds&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alatsi&display=swap" rel="stylesheet">
    <script src="js/carousel.js"></script>

</head>
<body background="">
    


    <!--HEADER-->

   <?php require_once "header.php" ?>

    <!--NAVEGACIÓN-->

    <?php require_once "navigation1.php" ?>
<section>
   <?php
$id=$_GET['id'];
$miconexion= mysqli_connect("localhost", "root", "", "avellaneda");
        
        //Compruebo conexion
        if(!$miconexion){
            echo "La conexion ha fallado: ";
            exit();
        }
        $miconsulta="SELECT * FROM plantel where codJug='". $id . "'";
        if($resultado= mysqli_query($miconexion, $miconsulta)){
            while ($registro= mysqli_fetch_assoc($resultado)){
                
                $foto_torso=$registro['fotoDorso'];
                if($foto_torso==null){
                    $foto_torso="jugador-none.png";
                }


?>

<div class="ficha container">
<h2 id="titulo-jugador" style="text-align: left;">Ficha del Jugador</h2>
<div class="row no-gutters">
        <div class="foto-jugador col-12 col-sm-12 col-lg-6">
            <div class="imagen-jugador py-1">
                <span class="contiene-imagen">
                <img class="img-fluid rounded d-block m-l-none" src="img/<?php echo $foto_torso; ?>"  style="width:auto; height:540px; margin-left:auto; margin-right:auto;" alt="">
                </span>
            </div>
        </div>
        <div class="info-jugador col-12 col-sm-12 col-lg-6">
            <div class="ficha-jugador">
                    <h2 class="titulo-jugador"><?php echo $registro['nombre'] . " " . $registro['apellido']; ?></h2>
                    <h3 class="posicion-jugador"><?php if($registro['codPosi']==1){echo "<p>Arquero</p>";}elseif($registro['codPosi']==2){echo "<p>Defensor</p>";}elseif($registro['codPosi']==3){echo "<p>Mediocampista</p>";}elseif($registro['codPosi']==4){echo "<p>Delantero</p>";} ?></h3>
                    <dl class="atributos">
                        <dt>Fecha de Nacimiento: </dt>
                        <dd><?php echo $registro['fecNac']; ?></dd>
                        <dt>Lugar de Nacimiento: </dt>
                        <dd><?php echo $registro['lugarNac']; ?></dd>
                        <dt>Nacionalidad: </dt>
                        <dd><?php echo $registro['nacionalidad']; ?></dd>
                        <dt>Altura: </dt>
                        <dd><?php echo $registro['altura'] . "cm" ?></dd>
                        <dt>Peso: </dt>
                        <dd><?php echo $registro['peso'] . "kg" ?></dd>
                        <dt>Pierna hábil: </dt>
                        <dd><?php if($registro['codPierna']==1){echo "Derecha" ;}elseif($registro['codPierna']==2){echo "Izquierda";}elseif($registro['codPierna']==5){echo "Ambas";} ?></dd>
                        <dt>Procedencia: </dt>
                        <dd><?php echo $registro['procedencia']; ?></dd>
                    </dl>
                    <div class="offset-3  col-6" style="padding-top: 2px" >
                    <a class="boton-volver btn btn-lg btn-danger btn-block" style="font-family: 'Spartan'; font-size: 16px" data-pant-chica="VOLVER" data-pant-grande="VOLVER A EL PLANTEL" href="equipo.php" title="Volver al plantel"></a>
                    </div>
                </div>
            </div>

</div>

</div>
            <?php 
            } 
            }
            ?>


</section>

   <!--FOOTER-->
   
   <?php require_once "footer.php" ?>
   <?php require_once "navigation2.php" ?>

<!--SCRIPT NAVBAR-->
<script src="js/funciones.js"></script>
 <!--JQUERY Y MENU RESPONSIVO-->
   <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
   <script src="js/navigation-responsive.js"></script>

</body>
</html>
