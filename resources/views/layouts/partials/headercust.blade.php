<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleheader.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
</head>

<body>
    <header id="header" class="fixed-top animate-zoomin">

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container d-flex align-items-center justify-content-between">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo/satyafin.png') }}" alt="Logo">
                    <span class="logo-text">Satya</span>
                </a>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li> -->
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle {{ request()->is('layanan*') || request()->routeIs('consulting') || request()->routeIs('flowchart') || request()->routeIs('report') ? 'active' : '' }}" href="{{ route('layanan') }}" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                <li><a class="dropdown-item" href="{{ route('consulting') }}">Financial & Management
                                        Consulting</a></li>
                                <li><a class="dropdown-item" href="{{ route('flowchart') }}">Business Process FlowChart
                                        SOP</a></li>
                                <li><a class="dropdown-item" href="{{ route('report') }}">Financial Report Template</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('layanan') }}">All Services</a></li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Career</a>
                        </li> -->
                    </ul>
                </div>
                <div class="d-flex">
                    <a href="#" class="btn">Contact Us</a>
                </div>
            </div>
        </nav>
    </header>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>