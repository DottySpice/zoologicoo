<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mapa</title>
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
                                <a class="nav-link" href="index.php">Inicio</a>
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
                                <a class="nav-link active" href="ubicacion.php">Mapa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="boletos.php">Boletos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="col p-1 shadow">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14926.166477117222!2d-103.3069716!3d20.7288303!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9cf40bdcb60e44c9!2sZool%C3%B3gico%20Guadalajara!5e0!3m2!1ses!2smx!4v1645652128949!5m2!1ses!2smx" width="700" height="500" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div class="col text-center fw-bold">
                <div class="p-4">
                    <i class="fa-solid fa-location-dot fa-2x"></i>
                    <h3>C. P.º del Zoológico 600, Huentitán El Alto, 44390 Guadalajara, Jal.</h3>
                </div>
                <div class="p-4">
                    <i class="fa-brands fa-whatsapp fa-2x"></i>
                    <a href="https://wa.me/524612759603" target="_blank"> <h3>+52 461 123 1234</h3> </a>
                    
                </div>
                <div class="p-4">
                    <i class="fa-solid fa-at  fa-2x"></i>
                    <h3>zoologico@gmail.com</h3>
                </div>
            </div>
        </div>

        <div class=" row">
            <footer class="bg-dark bg-gradient">
                <div class="row">
                    <div class="col justify-content-start text-center">
                        <ul class="nav text-center flex-column">
                            <li class="nav-item"><a href="contacto.php" class="nav-link px-2 link-primary">Atencion al cliente</a></li>
                            <li class="nav-item"><a href="#" class="nav-link px-2 link-primary">Facturacion</a></li>
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
    </div>
    <script src="js/jquery-3.2.1.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>