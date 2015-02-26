<?php include('../includes/conexion.php'); if (isset($_SESSION['MM_ID'])){ header("Location: control.php" );} ?>
<html>
<head>
    <title>Admin</title>
</head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="includes/logincss.css">

<body>
    <div class="container">

        <?php if ((isset($_GET['code'])) && (isset($_GET['nombre']))){
            $codigo = $_GET['code'];
            $name = $_GET['nombre'];

            $select = "SELECT * FROM admin WHERE nombre='$name'";
            $ejecuta = mysqli_query($conn, $select);

            while ($fila = mysqli_fetch_assoc($ejecuta)){
                $db_code = $fila['passreset'];
                $db_nombre = $fila['nombre'];
            }
            if ($codigo == $db_code && $name == $db_nombre){
                echo '
                    <form id="signup" style="margin-top:50px;" action="passreset.php" method="POST">
                        <div class="header">
                            <h3 style="margin-top:20px;">Restablecer contraseña</h3> 
                            <p>Por favor introdusca su nueva contraseña.</p>
                        </div>
                        <div class="inputs">
                            <input type="password" name="pass1" placeholder="Nueva contraseña" />
                            <input type="password" name="pass2" placeholder="Repetir contraseña" />
                            <input type="hidden" name="user" value="';
                        echo $db_nombre;   
                        echo '" />
                            <input type="hidden" name="codigos" value="';

                        echo $db_code;
                        echo '" />           
                        <div class="sep"></div>
                           <input type="submit" value="Actualizar contraseña" name="actualizar" id="submit">
                        </div>
                    </form>
                ';
            }
        } 


        if (!isset($_GET['code'])){
            if (isset($_POST['envio'])) {
                $email = $_POST['email'];
                $code = "";
                    if ($email ==''){ echo "<div align='center' class='error'>Se supone que debes introducir un email.</div>"; } else { 

                    $qery = "SELECT * FROM admin WHERE email = '$email'";
                    $ejec = mysqli_query($conn, $qery);
                    $numero = mysqli_num_rows($ejec);

                    if($numero!=0) {
                        while ($row = mysqli_fetch_assoc($ejec)){
                            $db_email = $row['email'];
                            $nombre = $row['nombre'];
                        }
                        if ($email == $db_email) {
                            $code = rand(10000, 1000000);
                            $to = $db_email;
                            $subject = "Reinicio de Contrasena";
                            $body = "

                            Este es un Email Automatico. Por favor no responder este mensaje.

                            Hacer clic en el Link inferior o copiar y pegar en su navegador
                            http://localhost/new/_useradmin/reset.php?code=$code&nombre=$nombre

                            ";
                            $newcode = "UPDATE admin SET passreset='$code' WHERE email='$email'";
                            mysqli_query($conn, $newcode);

                            mail($to, $subject, $body);

                            header("Location: index.php?error=2");

                        } else {
                            echo "El email es incorrecto";
                        }
                    } else {
                        echo "<div align='center' class='error'>El email introducido no existe en nuestra base de datos.</div>";
                    }
                }
            }
        }

        ?>
        
        <?php if (!isset($_GET['code'])) { ?>
        <form id="signup" style="margin-top:50px;" action="reset.php" method="POST">
            <div class="header">
                <h3 style="margin-top:20px;">Restablecer contraseña</h3> 
                <p>Por favor escribir el correo que utiliza para inciar sesión de modo que le podamos enviar como reestablecer su contraseña.</p>
            </div>
            
            <div class="sep"></div>
            <div class="inputs">
                <input type="email" placeholder="E-mail" name="email" autofocus />          
                <div class="checkboxy">
                    <label class="terms"><a href="index.php">Volver al login</a></label>
                </div>
               <input type="submit" value="Restablecer" name="envio" id="submit">
            </div>
        </form>
        <?php } ?>
    </div>
</body>
</html>
