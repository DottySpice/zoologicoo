<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contacto</title>
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
                                <a class="nav-link active" href="contacto.php">Contacto</a>
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
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row m-0 vh-100 row justify-content-center align-items-center">
            <div class="col p-4 m-3 shadow">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tu nombre</label>
                    <input class="form-control" id="exampleFormControlInput1" placeholder="Juan Perez Garcia">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tu Correo Electronico</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Titulo del mensaje</label>
                    <input class="form-control" id="exampleFormControlInput1" placeholder="...">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Tu mensaje</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Tu mensaje aqui!"></textarea>
                </div>
                <div class="mb-4">
                    <button class="btn btn-success"> Enviar Mensaje</button>
                </div>
            </div>

            <div class="col text-center fw-bold">
                <div class="p-4">
                    <i class="fa-solid fa-location-dot fa-2x"></i>
                    <h3>C. P.º del Zoológico 600, Huentitán El Alto, 44390 Guadalajara, Jal.</h3>
                </div>
                <div class="p-4">
                    <i class="fa-solid fa-phone fa-2x"></i>
                    <h3>+52 461 123 1234</h3>
                    
                </div>
                <div class="p-4">
                    <i class="fa-solid fa-at  fa-2x"></i>
                    <h3>zoologico@gmail.com</h3>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>