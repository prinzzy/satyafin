<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    @include('layouts.partials.header')
    <main>
        <div class="hero-section">
            <div class="hero-text">
                <h1>Financial Consultants and Business Solutions</h1>
                <p>"Optimizing Investment"<br>
                    "Maximizing Potential"<br>
                    "Your Trust, Our Priority"<br>
                    "Controlled Finance, Rapidly Growing Business"
                </p>
            </div>
        </div>
        <div class="container">
            <div class="text">
                <h1>Your Trust Are Our Priority</h1>
                <p>technological and market developments require companies to remain adaptive and responsive. Challenges such as market fluctuations, global competition, and increasingly complex regulations add to the complexity of proper financial, operational, and standard operating procedure management. Many companies also lack internal resources or specific expertise in financial management, strategic planning, data analysis, or business development. This is where financial consultants and business solutions like SFinBusinessSolution can add value to your business.</p>
            </div>
            <div class="image"><img src="{{ asset('images/bisnis3.png') }}" alt="financialconsulting"></div>
        </div>
        <footer class="footer">
            <div class="footer-content container">
                <div class="footer-left">
                    <div class="footer-logo">
                        <img src="{{ asset('images/logo/satyafin.png') }}" alt="Satya">
                        <span class="logo-text">Satya</span>
                    </div>
                    <p>Financial Business Solutions menyediakan jasa perencanaan
                        bisnis, implementasi strategi bisnis, analisis kebijakan, serta
                        konsultasi keuangan perusahaan untuk menghasilkan strategi yang
                        sesuai pada bisnis anda.
                    </p>
                    <div class="footer-social">
                        <a href="#"><i class="bi bi-envelope"></i></a>
                    </div>
                </div>
                <div class="footer-right">
                    <nav class="footer-nav">
                        <a href="#">Beranda</a>
                        <a href="#">Tentang Kami</a>
                        <a href="#">Layanan</a>
                        <a href="#">Karir</a>
                    </nav>
                    <div class="footer-newsletter">
                        <h2>Ikuti Berita Terbaru Kami</h2>
                        <p>Perluas wawasan anda dengan artikel kami</p>
                        <form action="#">
                            <input type="email" placeholder="Alamat Email" required>
                            <input type="submit" value="KIRIM">
                        </form>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>