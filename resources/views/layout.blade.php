<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestiona tus roles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<header class="bg-secondary">
    <nav class="navbar navbar-expand navbar-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto ml-5">
                <li class="nav-item"> <a class="nav-link text-dark font-weight-bold ml-5 textoGrande" href="#!">Home</a>
                </li>
                <li class="nav-item"> <a class="nav-link text-dark font-weight-bold ml-5 textoGrande"
                        href="#!">About</a>
                </li>
                <li class="nav-item"> <a class="nav-link text-dark font-weight-bold ml-5 textoGrande"
                        href="#!">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<body class="bg-dark">
    <div class="container">
        <div class="card my-5 bg-secondary">
            <div class="card-header">
                <h4 class="text-center text-white">@yield('titulo')</h4>
            </div>
            <div class="card-body">
                <div class="card">
                    @yield('contenido')
                </div>
            </div>
        </div>
    </div>
</body>
<footer class="fixed-bottom bg-secondary">
    <p class="text-white ml-5">This website has been created by Javier Aso. You can contact him on
        <a class="text-dark" href="#">asoycia@hotmail.com</a>
    </p>
</footer>
</html>
