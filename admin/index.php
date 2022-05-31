<?php 

    require_once("../class/zoologico.class.php");
    $zoologico -> validarPermiso("Portada");
    include('view/header.php');

?>

<h1>Bienvenido al sistema</h1>

<?php 
    include('view/footer.php');
?>