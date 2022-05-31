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
                                <a class="nav-link" href="ubicacion.php">Mapa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="boletos.php">Boletos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <div class="col ">
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
                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                    <h1 class="display-4 fw-normal">Paquetes</h1>
                    <p class="fs-5 text-muted">Paquetes organizados y acomodados para mejorar la experencia de estancia en nuestro Zoologico mediante paquetes, cada paquete es una experencia diferente</p>
                </div>
                
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm border-secondary">
                            <div class="card-header py-3 text-white bg-secondary border-secondary">
                                <h4 class="my-0 fw-normal">Paquete GuadaZoo</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">$110<small class="text-muted fw-light">/MX</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>El paquete GuadaZoo incluye: Ingreso al zoológico, presentación de aves en el auditorio techado, Villa Australiana, Herpetario, Selva Tropical, Rancho Veterinario, Área de Crianza, Maravillas del Kalahari, Monkeyland y Michilía.</li>
                                </ul>
                                <button type="button" class="w-100 btn btn-lg btn-secondary">Comprar</button>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm border-primary">
                            <div class="card-header py-3 text-white bg-primary border-primary">
                                <h4 class="my-0 fw-normal">Paquete Premium</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">$305<small class="text-muted fw-light">/MX</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>El paquete PREMIER incluye: Ingreso al zoológico, presentación de aves en el auditorio techado, Villa Australiana, Herpetario, Selva Tropical, Rancho Veterinario, Área de Crianza, Maravillas del Kalahari, Monkeyland y Michilía. Además de una visita al Acuario Guadalajara, un recorrido en el Safari Masai Mara y un recorrido en el Tren Panorámico y el ingreso a Antártida, el reino de los pingüinos.</li>

                                </ul>
                                <button type="button" class="w-100 btn btn-lg btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm border-info">
                            <div class="card-header py-3 text-white bg-info border-info">
                                <h4 class="my-0 fw-normal">Paquete Diamante</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">$355<small class="text-muted fw-light">/MX</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>El paquete DIAMANTE incluye: Ingreso al zoológico, presentación de aves en el auditorio techado, Villa en Australiana, Herpetario, Selva Tropical, Rancho Veterinario, Área de crianza, Maravillas del Kalahari, Monkeyland y Michilía. Además de un viaje en el SkyZoo (se requiere estatura de más de 1.10 cm en los menores de edad e ir acompañados por un adulto), una visita al Acuario Guadalajara, un paseo en el Safari Masai Mara, un recorrido en el Tren Panorámico y el ingreso a Antártida, el reino de los pingüinos.</li>
                                </ul>
                                <button type="button" class="w-100 btn btn-lg btn-info">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>  

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
    <script src="js/jquery-3.2.1.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>