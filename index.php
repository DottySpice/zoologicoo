<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoologico</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Zoologico</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contacto.php">Contacto</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Atracciones
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="atracciones/safari.php">Safari</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="atracciones/acuario.php">Acuario</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="atracciones/selva.php">Selva</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="atracciones/rancho.php">Rancho</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="ubicacion.php">Mapa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="boletos.php">Boletos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin/login.php">Iniciar sesion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <div class="col">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/nav3.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/nav2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/nav4.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/nav1.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row p-3">
            <div class="col"> 
                <section>
                    <div class="card mb-2 shadow bg-body rounded">
                        <img src="images/atraccion1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nueva Atraccion!</h5>
                            <p class="card-text">Hemos inagurado una nueva atraccion en nuestro zoologico.</p>
                            <p class="card-text">Ven a visitarnos! en nuestro nuevo Avario recien abierto.</p>
                            <p class="card-text"><small class="text-muted">Fecha de publicacion: 20.20.2020</small></p>
                        </div>
                        </div>
                </section>
            </div>
        </div>  

        <div class="row p-3">
            <?php
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
                
                //Forecah para imprimir cada contenedor
                $renglon = 0;

                foreach ($arrayDatos as $row) {

                    echo'<div class="col-lg-4">
                            <div class="card shadow bg-body rounded " style="width: 25rem;">
                                <img src="'.$row["foto"].'" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row["atraccion"].'</h5>
                                    <p class="card-text">'.$row["descripcion"].'.</p>
                                    <a href="#" class="btn btn-primary">Ver Horarios</a>
                                </div>
                            </div>
                        </div>';

                    $renglon++;
                    if($renglon%3 == 0){
                        echo '<div class="row p-3">';
                    }
                }
            ?>

        <div class=" row text-center p-4">
            <?php

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
                foreach ($arrayDatos as $row) {
                    echo "<h1>".$row["atraccion"]."</h1>";
                    echo '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7463.256518691389!
                        2d'.$row["latitud"].'!
                        3d'.$row["longitud"].'
                        !3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b0f857e52fcf%3A0x471fbc082cc6df6f!2sSelva%20M%C3%A1gica!5e0!3m2!1ses!2smx!4v1646159107176!5m2!1ses!2smx" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
                    echo '<img src='.$row["foto"].' class="card-img-top" alt="...">';
                }
            ?>
        </div>

        <footer class="bg-dark bg-gradient">
            <div class="row">
                <div class="col justify-content-start text-center">
                    <ul class="nav text-center flex-column">
                        <li class="nav-item"><a href="contacto.php" class="nav-link px-2 link-primary">Atencion al cliente</a></li>
                        <li class="nav-item"><a href="admin/view/login.php" class="nav-link px-2 link-primary">Iniciar sesion</a></li>
                        <li class="nav-item"><a href="contacto.php" class="nav-link px-2 link-primary">Contacto</a></li>
                    </ul>
                </div>
                <div class="col justify-content-end  flex-column">
                    <ul class="nav p-5 text-center">
                        <li>
                            <a href="https://www.facebook.com/" target="_blank"><i class="icono-tamano fa-brands fa-facebook fa-2x"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/?hl=es-la" target="_blank"><i class="icono-tamano fa-brands fa-instagram fa-2x"></i></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/" target="_blank"><i class="icono-tamano fa-brands fa-youtube fa-2x"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/?lang=es" target="_blank"><i class="icono-tamano fa-brands fa-twitter fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center text-center p-1">
                <div class="col">
                    <p class=" text-primary">C. P.º del Zoológico 600, Huentitán El Alto, 44390 Guadalajara, Jal.</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>