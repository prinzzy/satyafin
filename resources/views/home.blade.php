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
                <h1>Financial Business Solutions</h1>
                <p>Financial Business Solutions merupakan layanan yang dapat membantu anda terkait
                    manajemen finansial dan transaksi untuk memudahkan bisnis anda.
                </p>
            </div>
        </div>
        <div class="container">
            <div class="text">
                <h1>Kepercayaan Anda, Prioritas Kami</h1>
                <p>Perkembangan teknologi dan pasar menuntut
                    perusahaan untuk tetap adaptif dan responsif.
                    Tantangan seperti fluktuasi pasar, persaingan
                    global, dan peraturan yang semakin kompleks
                    menambah kompleksitas pengelolaan keuangan,
                    operasional, dan prosedur operasional standar
                    yang baik. Banyak perusahaan juga kekurangan
                    sumber daya internal atau keahlian khusus
                    dalam manajemen keuangan, perencanaan strategis,
                    analisis data, atau pengembangan bisnis.
                    Di sinilah konsultan keuangan dan solusi bisnis
                    seperti SFinBusinessSolution dapat memberikan nilai
                    tambah pada bisnis Anda.</p>
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
