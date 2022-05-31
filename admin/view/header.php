<!doctype html>
<html lang="en">
    <head>
        <script src="https://kit.fontawesome.com/3beda8c82a.js" crossorigin="anonymous"></script>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="../../boostrap/bootstrap.css" rel="stylesheet">

        <title>Administración del Zoologico</title>
    </head>

    <body>

    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Administración</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Catalogos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="atraccion.php">Atracciones</a></li>
                                    <li><a class="dropdown-item" href="familia.php">Familias</a></li>
                                    <li><a class="dropdown-item" href="alimento.php">Alimentos</a></li>
                                    <li><a class="dropdown-item" href="animal.php">Animales</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php?accion=logout">Salir</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>