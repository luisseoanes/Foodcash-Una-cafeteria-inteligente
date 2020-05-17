<?php
    include_once 'database.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: admin.php');
            break;

            case 2:
            header('location: Padres.php');
            break;

            case 3:
                header('location: estudiantes.php');
            break;

            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE username = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[3];
            
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: admin.php');
                break;

                case 2:
                header('location: Padres.php');
                break;

                case 3:
                    header('location: estudiantes.php');
                break;
    
                default:
            }
        }else{
            // no existe el usuario
            echo 'Nombre de usuario o contraseña incorrecto';
        }
        

    }

?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Login</title>
    <link rel='stylesheet' href='css/Inicia Sesion.css'>

    <link rel='shortcut icon' type='image/x-icon' href='img/favicon.png'>
</head>
<body >
    <div class='contenedor-form'>
        <div class=''>
        </div>

        <div class='formulario'> 
            <h2 align='center' href="index.php"><img src='img/logo 150 x 150.png' align="center" href="index.php">
            </h2>
            <form action='#' method='POST'>
      <input type='email' name='username' require>
        <input type='password' name='password' require>
        <input type='submit' value='Iniciar sesión'>
     </form>
        </div>

        

        <div class='reset-password'>
            <a href='#'>Olvide mi Contraseña</a>
        </div>
    </div>
</body>
</html>