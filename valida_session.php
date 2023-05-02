
<?php
session_start();
if ( !isset($_SESSION['usuario'])) {
    unset ($_SESSION['usuario']);
    unset ($_SESSION['senha']);
    session_destroy();
    header ("Location:index.php");
	die();
}


?>