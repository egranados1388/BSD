    <?php
    /* A continuaci�n, realizamos la conexi�n con nuestra base de datos en MySQL */
    $link = mysql_connect("172.16.1.249:3306","root","");
    mysql_select_db("desarrollo", $link);
    echo "usuario a encontrar: ".$_POST["usuario"]."-";
    /* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la funci�n
    htmlentities para evitar inyecciones SQL. */
    $myusuario = mysql_query("select idusuario from usuarios
    where idusuario = '".htmlentities($_POST["usuario"])."'",$link);
    $nmyusuario = mysql_num_rows($myusuario);

    //Si existe el usuario, validamos tambi�n la contrase�a ingresada y el estado del usuario�
    if($nmyusuario != 0){
	echo "existe usuario";
	
    $sql = "select idusuario,nombre
    from usuarios
    where estado = 1
    and idusuario = '".htmlentities($_POST["usuario"])."'
    and clave = '".md5(htmlentities($_POST["clave"]))."'";
    $myclave = mysql_query($sql,$link);
    $nmyclave = mysql_num_rows($myclave);

    //Si el usuario y clave ingresado son correctos (y el usuario est� activo en la BD), creamos la sesi�n del mismo.
    if($nmyclave != 0){
	echo "existen los dos";
    session_start();
    //Guardamos dos variables de sesi�n que nos auxiliar� para saber si se est� o no "logueado" un usuario
    $_SESSION["autentica"] = "SIP";
    $_SESSION["usuarioactual"] = mysql_result($myclave,0,1); //nombre del usuario logueado.
    //Direccionamos a nuestra p�gina principal del sistema.
    header ("Location: home.php");
    }
    else{
	
	?>
    <script languaje='javascript'>alert("La contrase\u00f1a del usuario no es correcta.")</script>
   
	<?php
	header ("Location: index.php?msg=La clave de usuario no es correcta");
    }
    }else{
	
	?>
	
    <script languaje='javascript'>alert("El usuario no existe.2")</script>
	
	
	<?php
	header ("Location: index.php?msg=El usuario no existe 2");
    }
    mysql_close($link);
    ?>