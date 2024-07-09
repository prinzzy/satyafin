<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleheader.css') }}">
</head>

<body>
    <header id="header" class="fixed-top">

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container d-flex align-items-center justify-content-between">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo/satyafin.png') }}" alt="Logo">
                    <span class="logo-text">Satya</span>
                </a>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tentang Kami</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Layanan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                <li><a class="dropdown-item" href="#">Service 1</a></li>
                                <li><a class="dropdown-item" href="#">Service 2</a></li>
                                <li><a class="dropdown-item" href="#">Service 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Karir</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <a href="#" class="btn">Hubungi Kami</a>
                </div>
            </div>
        </nav>
    </header>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
