<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    @include('layouts.partials.header')
    <main>
        <div class="hero-section">
            <div class="hero-text">
                <h1 class="animate-fadein">Financial Consultants & Business Solutions</h1>
                <p class="animate-fadein-delay">
                    "Your Trust, Our Priority"<br>
                    "Optimizing Investment, Maximizing Potential"<br>
                    "Controlled Finance, Rapidly Growing Business"
                </p>
            </div>
        </div>
        <div class="container">
            <div class="text">
                <h1 class="animate-slidein">
                    Financial Consultants & Business Solutions helps you in
                    various aspects of finance and business
                </h1>
                <p class="animate-slidein-delay">Technological and market developments are demanding
                    company to remain adaptive and responsive.
                    Challenges such as market fluctuations, competition
                    global, and increasingly complex regulations
                    increase the complexity of financial management,
                    operations, and standard operating procedures
                    the good one. Many companies are also lacking
                    internal resources or specialized expertise
                    in financial management, strategic planning,
                    data analysis, or business development.
                    This is where financial consultants and business solutions come in
                    like SFinBusinessSolution can provide value
                    add to your business.</p>
            </div>
            <div class="image"><img src="{{ asset('images/bisnis3.png') }}" alt="financialconsulting"
                    class="animate-zoomin"></div>
        </div>
        @include('layouts.partials.footer')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
