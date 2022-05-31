<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acuario</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/styles.css">
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
                                <a class="nav-link" href="../index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../contacto.php">Contacto</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Atracciones
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="safari.php">Safari</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="acuario.php">Acuario</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="selva.php">Selva</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="rancho.php">Rancho</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../ubicacion.php">Mapa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../boletos.php">Boletos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <div class="col ">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../images/acuario/acuarioNav1.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Experencia Agradable</h5>
                                <p>Vive la experiencia de conocer el Acuario, Acuario Interactivo y Ártico, la Expedición por un solo precio y con todas las medidas sanitarias.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="../images/acuario/acuarioNav2.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Gran experencia</h5>
                                <p>Recore nuestro acuario con sus especimenes en todo su esplendor</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="../images/acuario/acuarioNav3.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Visitanos ahora!</h5>
                                <p>Ven a visitarnos! Te esperamos</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
      
    <div class="container p-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-3 shadow m-3">
                <img src="../images/acuario/tiburon1.jpg" class="img-fluid" alt="...">
                <h2>Tiburon</h2>
                <p>Los selaquimorfos o selacimorfos son un superorden de condrictios conocidos comúnmente con el nombre de tiburones o escualos. </p>
                <p><a class="btn btn-primary" href="#">Ver en el mapa</a></p>
            </div>
            
            <div class="col-lg-3 shadow m-3">
                <img src="../images/acuario/estrella1.jpg" class="img-fluid" alt="...">
                <h2>Estrella de mar</h2>
                <p>Los asteroideos o estrellas de mar son una clase del filo Echinodermata de simetría pentarradial, con cuerpo aplanado formado por un disco pentagonal con cinco brazos o más.​</p>
                <p><a class="btn btn-primary" href="#">Ver en el mapa</a></p>
            </div>

            <div class="col-lg-3 shadow m-3">
                <img src="../images/acuario/delfin1.jpg" class="img-fluid" alt="...">
                <h2>Delfin</h2>
                <p>Los delfines, llamados también delfines oceánicos para distinguirlos de los platanistoideos o delfines de río, son mamíferos de una familia de cetáceos odontocetos muy heterogénea, que comprende 37 especies actuales.a</p>
                <p><a class="btn btn-primary " href="#">Ver en el mapa</a></p>
            </div>
            
        </div>
      
        <hr>
        <div class="row">
            <div class="col">
                <h2>Peces payaso</h2>
                <p>Amphiprioninae es una subfamilia de peces marinos de la familia Pomacentridae, que engloba únicamente a los géneros Amphiprion y Premnas, cuyos componentes son conocidos como peces payaso o peces de las anémonas.</p>
            </div>

            <div class="col">
                <img src="../images/acuario/payaso1.jpg" class="img-fluid" alt="...">
            </div>
        </div>
    </div>
    <footer class="bg-dark bg-gradient">
            <div class="row">
                <div class="col justify-content-start text-center">
                    <ul class="nav text-center flex-column">
                        <li class="nav-item"><a href="../contacto.php" class="nav-link px-2 link-primary">Atencion al cliente</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 link-primary">Facturacion</a></li>
                        <li class="nav-item"><a href="../contacto.php" class="nav-link px-2 link-primary">Contacto</a></li>
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
    <script src="js/jquery-3.2.1.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>