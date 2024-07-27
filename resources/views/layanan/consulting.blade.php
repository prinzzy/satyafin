<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Financial & Management Consulting</title>
    <link rel="stylesheet" href="{{ asset('css/styleconsulting.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    @include('layouts.partials.headercust')
    <main>
        <div class="hero-section">
            <div class="hero-text">
                <h1 class="animate-fadein">Financial & Management Consulting</h1>
            </div>
        </div>
        <div class="container">
            <div class="text">
                <h1 class="animate-slidein">
                    Financial & Management Consulting
                </h1>
                <p class="animate-slidein-delay">
                    Our Financial & Management Consulting services are designed
                    to help organizations enhance their financial performance and
                    achieve their strategic goals. We provide expert advice, tailored solutions,
                    and comprehensive support to navigate complex financial landscapes and drive
                    sustainable growth. Our goal is to empower organizations to make
                    informed decisions, optimize their operations, and achieve sustainable
                    growth. With our comprehensive consulting services, we provide the
                    expertise and support needed to navigate the complexities of
                    financial and managerial challenges.
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
                                <h5 class="modal-title" id="exampleModalLabel">Financial & Management Consulting Package
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="consultingform">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Product</label>
                                        <input type="text" class="form-control"
                                            value="Financial & Management Consultings" id="product" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="package" class="form-label">Select Package</label>
                                        <select class="form-select" id="package" required>
                                            <option value="" disabled selected>Select package...</option>
                                            <option value="paket1">3x Consultations</option>
                                            <option value="paket2">5x Consultations</option>
                                            <option value="paket3">10x Consultations</option>
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
                                    <div class="mb-3">
                                        <label for="notes" class="form-label">Notes (optional)</label>
                                        <textarea class="form-control" id="notes" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn-button">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image animate-zoomin"><img src="{{ asset('images/consulting3.png') }}"
                    alt="financialconsulting">
            </div>
        </div>
    </main>
    @include('layouts.partials.footercust')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('package').addEventListener('change', function() {
            var priceContainer = document.getElementById('price-container');
            var priceInput = document.getElementById('price');
            var selectedPackage = this.value;
            var price = '';

            if (selectedPackage === 'paket1') {
                price = 'Rp 5.000.000';
            } else if (selectedPackage === 'paket2') {
                price = 'Rp 8.000.000';
            } else if (selectedPackage === 'paket3') {
                price = 'Rp 10.000.000';
            }

            if (price) {
                priceInput.value = price;
                priceContainer.style.display = 'block';
            } else {
                priceContainer.style.display = 'none';
            }
        });

        document.getElementById('consultingform').addEventListener('submit', function(event) {
            event.preventDefault();
            // Ambil nilai dari form
            const packageName = document.getElementById('package').value;
            const price = document.getElementById('price').value;
            const product = document.getElementById('product').value;
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const notes = document.getElementById('notes').value; // Ambil nilai Catatan

            const packageMap = {
                'paket1': '3x Consultations',
                'paket2': '5x Consultations',
                'paket3': '10x Consultations'
            }

            // Buat URL dengan query parameters
            let paymentUrl =
                `{{ route('pembayaran') }}?product=${encodeURIComponent(product)}&package=${encodeURIComponent(packageMap[packageName])}&price=${encodeURIComponent(price)}&name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&phone=${encodeURIComponent(phone)}`;

            // Sertakan Catatan jika ada nilai yang dimasukkan
            if (notes.trim() !== '') {
                paymentUrl += `&notes=${encodeURIComponent(notes)}`;
            }

            // Arahkan ke halaman pembayaran
            window.location.href = paymentUrl;
        });
    </script>
</body>

</html>
