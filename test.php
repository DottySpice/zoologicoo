<?php
    /*
    $usuario = "zoologico";
    $contrasena = "1234";
    $servidor = "localhost";
    $database = "zoologico";

    //CREAMOS LA CONEXIÓN CON EL SERVIDOR QUE SE ALMACENARÁ EN $conexion
    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $database) or die("No se ha podido conectar con el servidor");

    //creamos la consulta
    $sql = "SELECT * FROM atraccion";
    //almacenamos los datos de regreso
    $datos = mysqli_query($conexion, $sql);
    $arrayDatos = array();

    //asiganmos los datos de regreso al array (usando fetch_array)
    while($row = mysqli_fetch_array($datos)){
    $arrayDatos[] = $row;
    }
    //Imprimimos los datos ya en el array
    print_r ($arrayDatos);

    foreach ($arrayDatos as $row) {
        echo "<h1>".$row[0]."</h1>";
        echo "<h1>".$row[1]."</h1>";
        echo "<h1>".$row[2]."</h1>";
        echo "<h1>".$row[3]."</h1>";
    }
    */
    
    //Usando la clase PDO

    $dsn = "mysql:dbname-zoologico;host=localhost";
    $user = "zoologico";
    $password = "1234";

    $conexion = new PDO($dsn, $user, $password);

    $consulta = $conexion -> prepare("SELECT * FROM atraccion");
    $consulta->execute();

    $atracciones = $consulta()->fetchAll();

    print_r ($atracciones);





?>