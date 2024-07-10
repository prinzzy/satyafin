<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Business Process FlowChart SOP</title>
    <link rel="stylesheet" href="{{ asset('css/styleconsulting.css') }}">
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
                <h1 class="animate-fadein">Business Process FlowChart SOP</h1>
            </div>
        </div>
        <div class="container">
            <div class="text">
                <h1 class="animate-slidein">
                    Business Process FlowChart SOP
                </h1>
                <p class="animate-slidein-delay">
                    A Business Process Flowchart SOP (Standard Operating Procedure)
                    visually represents the steps and procedures for a specific business
                    process. It ensures consistency, efficiency, and clarity in
                    executing tasks, enabling employees to understand and follow
                    the process accurately.
                </p>
                <button type="button" class="btn-button animate-zoomin" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Select Package
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Business Process FlowChart SOP Package
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="package" class="form-label">Select Package</label>
                                        <select class="form-select" id="package" required>
                                            <option value="" disabled selected>Select package...</option>
                                            <option value="paket1">Retail Company</option>
                                            <option value="paket2">Service Company</option>
                                            <option value="paket3">Manufacture Company</option>
                                            <option value="paket4">All Business Process FlowChart SOP</option>
                                        </select>
                                    </div>
                                    <div class="mb-3" id="price-container" style="display: none;">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" required>
                                    </div>
                                    <button type="submit" class="btn-button">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image animate-zoomin"><img src="{{ asset('images/process.png') }}" alt="financialconsulting">
            </div>
        </div>
    </main>
    @include('layouts.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('package').addEventListener('change', function() {
            var priceContainer = document.getElementById('price-container');
            var priceInput = document.getElementById('price');
            var selectedPackage = this.value;
            var price = '';

            if (selectedPackage === 'paket1') {
                price = 'Rp 10.000.000';
            } else if (selectedPackage === 'paket2') {
                price = 'Rp 10.000.000';
            } else if (selectedPackage === 'paket3') {
                price = 'Rp 10.000.000';
            } else if (selectedPackage === 'paket4') {
                price = 'Rp 25.000.000';
            }

            if (price) {
                priceInput.value = price;
                priceContainer.style.display = 'block';
            } else {
                priceContainer.style.display = 'none';
            }
        });
    </script>
</body>

</html>
