<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Patua+One&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <style>
        h1,
        h2,
        h3,
        h4,
        a {
            font-family: "Comfortaa", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light" style="background-color: #FFFFFF;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <div class="container">
                    <img src="/img/slogan.png" alt="Bootstrap" width="100" height="50">
                </div>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-primary-emphasis" aria-current="page" href="/plano"><i class="fa-solid fa-wifi"></i> Planos de Internet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-primary-emphasis" aria-current="page" href="#"><i class="fa-solid fa-tv"></i> Planos de TV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-primary-emphasis" aria-current="page" href="/produto"><i class="fa-solid fa-box-open"></i> Produtos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <style>
        body {
            background-color: #212529;
        }
    </style>
    @yield('content')
    <footer class="position-absolute bottom-0 start-50 translate-middle-x">
        <p class="text-white">FastNet Telecom &copy; 2024</p>
    </footer>

    <!-- Bootstrap javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
