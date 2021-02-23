<!DOCTYPE html>
    <head>
    <title>Preferencias</title>
      <!--se incluye el fichero estilos.css con los estilos aportados en la tarea-->
        <style>
            <?php include('estilos.css'); ?>
        </style>
    </head>
    <body>
      <?php 
        //inicio de sesion
        session_start();
        
        //compruebo que si hay datos guardados en la session
        if (!isset($_SESSION['idioma']) && !isset($_SESSION['perfil']) && !isset($_SESSION['zona'])) 
        { 
            //inicializo variable a false
            $guardar = false;
            //compruebo que se hayan enviado los datos desde el formulario
            if(isset($_POST['SubmitButton']))
            {
                
                //inicializo los datos a vacio
                $_SESSION['idioma'] = "";
                $_SESSION['perfil'] = "";
                $_SESSION['zona'] = "";
                //asigno a la session los datos enviados en el formulario
                $_SESSION['idioma'] = $_POST['idioma'];
                $_SESSION['perfil'] = $_POST['perfil'];
                $_SESSION['zona'] =  $_POST['zona'];
                //recargo la pagina 
                ob_start();
                $guardar = true;
            }
        }
        else{
            //compruebo que haya datos en la session
            if (isset($_SESSION['idioma']) && isset($_SESSION['perfil']) && isset($_SESSION['zona']))
            {
                 //inicializo variable a false
            $guardar = true;
                //compruebo que se hayan enviado los datos desde el formulario
                if(isset($_POST['SubmitButton']))
                {
                    //asigno los nuevos valores las variables de session
                    $_SESSION['idioma'] = $_POST['idioma'];
                    $_SESSION['perfil'] = $_POST['perfil'];
                    $_SESSION['zona'] =  $_POST['zona'];
                    //recargo la pagina
                    ob_start();
                }
            }
        }
        ?>
        <form action="" method="post">
            <fieldset>
            <legend>Preferencias</legend>
            <?php
             if($guardar){
                echo "<span class='mensaje'>información guardada en la sesión</span>";
                }
            ?>
            <!--aplico las clases aportada en los estilos-->
            <label class="etiqueta">Idioma:</label>
                <select name="idioma">
                    <option >Seleccione perfil</option>
                    <!--Compruebo la variable de sesion y el idioma que se ha seleccionado y inserto el selected en la opcion-->
                    <option value="es" <?php if(isset($_SESSION['idioma']) && $_SESSION['idioma'] == 'es'){ echo 'selected';}else{ echo ''; }; ?>>Español</option>
                    <option value="en" <?php if(isset($_SESSION['idioma']) && $_SESSION['idioma'] == 'en'){ echo 'selected';}else{ echo ''; }; ?>>Ingles</option>
                </select>
            
                <label class="etiqueta">Perfil publico:</label>
                <select name="perfil">
                    <option>Seleccione perfil</option>
                    <!--Compruebo la variable de sesion y el perfil que se ha seleccionado y inserto el selected en la opcion-->
                    <option value="si" <?php if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'si'){ echo 'selected';}else{ echo ''; }; ?>>Sí</option>
                    <option value="no" <?php if(isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'no'){ echo 'selected';}else{ echo ''; }; ?>>No</option>
                </select>        
            
                <label class="etiqueta">Zona horaria: </label>
                <select name="zona">
                    <option >Seleccione zona</option>
                    <!--Compruebo la variable de sesion y el zona que se ha seleccionado y inserto el selected en la opcion-->
                    <option value="GMT" <?php if(isset($_SESSION['zona']) && $_SESSION['zona'] == 'GMT'){ echo 'selected';}else{ echo ''; }; ?>>GMT</option>
                    <option value="GMT-1" <?php if(isset($_SESSION['zona']) && $_SESSION['zona'] == 'GMT-1'){ echo 'selected';}else{ echo ''; }; ?>>GMT-1</option>
                    <option value="GMT-2" <?php if(isset($_SESSION['zona']) && $_SESSION['zona'] == 'GMT-2'){ echo 'selected';}else{ echo ''; }; ?>>GMT-2</option>
                    <option value="GMT+1" <?php if(isset($_SESSION['zona']) && $_SESSION['zona'] == 'GMT+1'){ echo 'selected';}else{ echo ''; }; ?>>GMT+1</option>
                    <option value="GMT+2" <?php if(isset($_SESSION['zona']) && $_SESSION['zona'] == 'GMT+2'){ echo 'selected';}else{ echo ''; }; ?>>GMT+2</option>
                </select>        
                
                <br><br><br>
                <!--boton de envio del formulario-->
                <p><input type="submit"  name="SubmitButton" value="Establecer preferencias"></p>
                <!--redirijo al archivo mostrar.php-->
                <a href="mostrar.php">Mostrar preferencias</a>
               
            </fieldset>
        </form>
    </body>
</html>


