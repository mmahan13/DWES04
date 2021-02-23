<!DOCTYPE html>
    <head>
    <title>Preferencias</title>
    </head>
    <body>
        <!--se incluye el fichero estilos.css con los estilos aportados en la tarea-->
        <style>
            <?php include('estilos.css'); ?>
        </style>
        <?php 
        //inicio de sesion
        session_start();
        //inicializo variable a false
        $eliminar = false;
        //comprobamos que se ha presionado el boton borrar preferencias
        if(isset($_POST['borrarButton']))
        {
            //cambio los dato a vacio
            $_SESSION['idioma'] = "";
            $_SESSION['perfil'] = "";
            $_SESSION['zona'] = "";
            //cambio el dato a true para enseñar el mensaje de borrado
            $eliminar = true;
            //destruyo la sesion
            session_destroy();
        }
        ?>
        <form action="" method="post">
            <fieldset>
            <legend>Preferencias</legend>
                <?php
                    if($eliminar){
                    echo "<span class='mensaje'>Información de la sesión eliminada</span>";
                    }
                ?>
            <!--aplico las clases aportada en los estilos-->
                <label class="etiqueta">Idioma:</label>
                <br>
                <?php 
                    //compruebo el idioma que es y imprimo el label con el texto correcto
                    if($_SESSION['idioma'] == 'es'){ echo '<label class="texto">Español</label><br>'; }; 
                    if($_SESSION['idioma'] == 'en'){ echo '<label class="texto">Ingles</label><br>'; };
                ?>
                 
                <label class="etiqueta">Perfil publico:</label>
                <br>
                <?php 
                    //compruebo el perfil y se imprime el label con el texto correcto
                    if($_SESSION['perfil'] == 'si'){ echo '<label class="texto">Sí</label><br>'; };
                    if($_SESSION['perfil'] == 'no'){ echo '<label class="texto">No</label><br>'; }; 
                ?>       
            
                <label class="etiqueta">Zona horaria: </label>
                <br>
                <?php
                    //compruebo el zona y se imprime el label con el texto correcto
                    if($_SESSION['zona'] == 'GMT'){ echo '<label class="texto">GMT</label><br>'; }; 
                    if($_SESSION['zona'] == 'GMT-1'){ echo '<label class="texto">GMT-1</label><br>'; }; 
                    if($_SESSION['zona'] == 'GMT-2'){ echo '<label class="texto">GMT-2</label><br>'; }; 
                    if($_SESSION['zona'] == 'GMT+1'){ echo '<label class="texto">GMT+1</label><br>'; }; 
                    if($_SESSION['zona'] == 'GMT+2'){ echo '<label class="texto">GMT+2</label><br>'; }; 
                ?>   
                <br><br><br>
                <!--boton borrar preferencias-->
                <p><input type="submit"  name="borrarButton" value="Borrar preferencias"></p>
                <!--redirijo a preferncias.php-->
                <a href="preferencias.php">Establecer preferencias</a>
               
            </fieldset>
        </form>
    </body>
</html>