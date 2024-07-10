<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/stylefooter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
</head>

<body>
    <footer class="footer">
        <div class="footer-content container animate-zoomin">
            <div class="footer-left">
                <div class="footer-logo">
                    <img src="{{ asset('images/logo/satyafin.png') }}" alt="Satya">
                    <span class="logo-text">Satya</span>
                </div>
                <p>Financial Business Solutions provides planning services
                    business, business strategy implementation, policy analysis, as well
                    corporate financial consulting to produce strategies
                    suitable for your business.
                </p>
                <div class="footer-social">
                    <a href="#"><i class="bi bi-envelope"></i></a>
                </div>
            </div>
            <div class="footer-right">
                <nav class="footer-nav">
                    <a href="{{ route('dashboard') }}">Home</a>
                    <a href="#">About Us</a>
                    <a href="{{ route('layanan') }}">Services</a>
                    <a href="#">Career</a>
                </nav>
                <div class="footer-newsletter">
                    <h2>Subscribe to Our Newsletter </h2>
                    <p>Expand your horizons with our insights</p>
                    <form action="#">
                        <input type="email" placeholder="Email Address" required>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
