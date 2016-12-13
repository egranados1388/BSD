
<?php
// Script  cerrar  sesion (Fallo en mozilla)
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");
?> 