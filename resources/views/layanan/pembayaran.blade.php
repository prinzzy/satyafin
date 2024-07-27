<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
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
                <h1 class="animate-fadein">Payment</h1>
            </div>
        </div>
        <div class="container-card">
            <div class="card custom-card animate-fadein">
                <div class="card-body">
                    <h5 class="card-title">Package Details</h5>
                    <div class="details-group">
                        <strong>Package</strong>
                        <span id="package"></span>
                    </div>
                    <div class="details-group">
                        <strong>Price</strong>
                        <span id="price"></span>
                    </div>
                    <h5 class="card-title">Personal Details</h5>
                    <div class="details-group">
                        <strong>Name</strong>
                        <span id="name"></span>
                    </div>
                    <div class="details-group">
                        <strong>Email</strong>
                        <span id="email"></span>
                    </div>
                    <div class="details-group">
                        <strong>Phone</strong>
                        <span id="phone"></span>
                    </div>
                    <h5 class="card-title bank-info">Bank Information</h5>
                    <div class="details-group">
                        <strong>Name</strong>
                        <span>SATYA PRATAMA GUNA</span>
                    </div>
                    <div class="details-group">
                        <strong>Bank</strong>
                        <span>BRI</span>
                    </div>
                    <div class="details-group">
                        <strong>Account Number</strong>
                        <span>032901006075306</span>
                    </div>
                    <h5 class="card-title upload-section">Upload Payment Proof</h5>
                    <div class="mb-3">
                        <input type="file" class="form-control" id="paymentProof" required>
                    </div>
                    <button type="submit" class="btn-button" id="submitBtn">Submit</button>
                </div>
            </div>
        </div>

        <div class="custom-alert" id="customAlert">
            <p>Thank you for choosing our services, we will send a message to your email.</p>
            <button class="btn-button" onclick="window.location.href = '{{ route('dashboard') }}'">Ok</button>
        </div>
    </main>
    @include('layouts.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Ambil nilai dari URL query parameters
        const urlParams = new URLSearchParams(window.location.search);
        const packageName = urlParams.get('package');
        const price = urlParams.get('price');
        const name = urlParams.get('name');
        const email = urlParams.get('email');
        const phone = urlParams.get('phone');

        // Tampilkan nilai pada halaman
        document.getElementById('package').textContent = packageName;
        document.getElementById('price').textContent = price;
        document.getElementById('name').textContent = name;
        document.getElementById('email').textContent = email;
        document.getElementById('phone').textContent = phone;

        document.getElementById('submitBtn').addEventListener('click', function() {
            // Cek apakah file bukti pembayaran sudah diupload
            const paymentProof = document.getElementById('paymentProof').files[0];
            if (paymentProof) {
                // Tampilkan custom alert
                document.getElementById('customAlert').style.display = 'block';
            } else {
                // Jika belum upload bukti pembayaran, beri notifikasi
                alert("Please upload proof of payment first.");
            }
        });
    </script>
</body>

</html>
