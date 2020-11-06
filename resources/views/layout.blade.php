<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ficha</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<header>
    <nav class="navbar navbar-dark">
        <a class="navbar-brand" href="#!">Home</a>
        <a class="navbar-brand" href="#!">Logout</a>
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

</html>
