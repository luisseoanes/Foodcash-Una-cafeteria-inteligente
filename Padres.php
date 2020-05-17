<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: login.php');
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Indice</title>
  <link rel="stylesheet" href="css/interno.css">
  <link rel="stylesheet" href="css/fondo.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
      <script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			   $(".wrapper").toggleClass("collapse");
			});
		});
	</script>
</head>
<body>

<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <div class="top_menu">
      <div class="logo">Food Cash</div>
      <div class="logo">(Nombre del estudiante)</div> 
      <img src="img/logo 200x200.png" alt="gimsaber logo">
      <div class="logo">Saldo: 25.000</div>  
      <img src="img/Logo Gimsaber.png" alt="gimsaber logo">
      
      <ul>
        <li><a href="pages/padres/Actualiza.html">
          <i class="fas fa-cloud-upload-alt" title="Actualiza tus datos"></i></a></li>
        <li><a href="pages/padres/Cuenta.html">
          <i class="fas fa-user" title="Tu cuenta"></i>
          </a></li>
        <li><a href="logout.php">
          <i class="fas fa-arrow-right" title="Cerrar Sesion"></i>
          </a></li>
      </ul>
    </div>
  </div>
  
  <div class="sidebar">
    <ul>
      <li><a href="padres.php" class="active">
        <span class="icon"><i class="fas fa-home"></i></span>
        <span class="title">Inicio</span></a></li>
      <li><a href="pages/padres/Alimentacion.html">
        <span class="icon"><i class="fas fa-carrot"></i></span>
        <span class="title">Mi alimentacion</span>
        </a></li>
      <li><a href="pages/padres/Recarga.html">
        <span class="icon"><i class="fas fa-dollar-sign"></i></span>
        <span class="title">Recarga</span>
        </a></li>
      <li><a href="#" class="cancel">
        <span class="icon"><i class="fas fa-hamburger"></i></span>
        <span class="title">Comidas</span>
        <span class="icon"><i class="fas fa-lock"></i></span>
        </a></li>
      <li><a href="#" class="cancel">
        <span class="icon"><i class="fas fa-users-cog"></i></span>
        <span class="title">Parental</span>
        <span class="icon"><i class="fas fa-lock"></i></span>
        </a></li>
      <li><a href="pages/padres/ayuda.html">
        <span class="icon"><i class="fas fa-headset"></i></span>
        <span class="title">Ayuda</span>
        </a></li>
    </ul>
  </div>
  
  <div class="main_container">
    <div class="item">
    Bienvenido <?php
            $servidor = "localhost";
            $nombreusuario = "root";
            $password = "";
            $db = "blog";
        
            $conexion = new mysqli($servidor, $nombreusuario, $password, $db);
        
            if($conexion->connect_error){
                die("Conexión fallida: " . $conexion->connect_error);
            }

            if(isset($_POST['texto'])){
                $texto = $_POST['texto'];
                
                $sql = "INSERT INTO todoTable(texto, completado)
                                    VALUES('$texto', false)";
                
                if($conexion->query($sql) === true){
                    echo '<div><form action=""><input type="checkbox">'.$texto.'</form></div>';
                }else{
                    die("Error al insertar datos: " . $conexion->error);
                }
                $conexion->close();
            }

        ?>
    </div>
    <div class="item">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut sapiente adipisci nemo atque eligendi reprehenderit minima blanditiis eum quae aspernatur!
    </div>
    <div class="item">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut sapiente adipisci nemo atque eligendi reprehenderit minima blanditiis eum quae aspernatur!
    </div>
</div>
</div>
	
</body>
</html>