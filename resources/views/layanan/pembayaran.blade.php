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
    @include('layouts.partials.headercust')
    <main>
        <div class="hero-section">
            <div class="hero-text">
                <h1 class="animate-fadein">Payment Details</h1>
            </div>
        </div>
        <div class="container-card">
            <div class="card custom-card animate-fadein">
                <div class="card-body">
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

                    <h5 class="card-title">Package Details</h5>
                    <div class="details-group">
                        <strong>Package:</strong>
                        <span id="package"></span>
                    </div>
                    <div class="details-group">
                        <strong>Notes:</strong>
                        <span id="notes"></span>
                    </div>
                    <div class="details-group">
                        <strong>Price:</strong>
                        <span id="price"></span>
                    </div>
                    <div class="details-group">
                        <strong>Grand Total:</strong>
                        <span id="grandTotal"></span>
                    </div>

                    <h5 class="card-title">Payment Method</h5>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer"
                                checked>
                            <span class="form-check-label">Bank Transfer</span>
                        </label>
                    </div>

                    <br>
                    <button type="submit" class="btn-button" id="submitBtn">Submit</button>
                </div>
            </div>
        </div>

        <!-- <div class="custom-alert" id="customAlert">
            <p>Terimakasih sudah memilih jasa kami, kami akan mengirimkan pesan ke email anda.</p>
            <button class="btn-button" id="okBtn" onclick="redirectToDashboard()">OK</button>
        </div> -->

        <form id="hiddenForm" action="{{ route('bank-transfer-info') }}" method="GET" style="display: none;">
            <input type="hidden" name="package" id="hiddenPackage">
            <input type="hidden" name="price" id="hiddenPrice">
            <input type="hidden" name="name" id="hiddenName">
            <input type="hidden" name="email" id="hiddenEmail">
            <input type="hidden" name="phone" id="hiddenPhone">
            <input type="hidden" name="notes" id="hiddenNotes">
            <input type="hidden" name="grandTotal" id="hiddenGrandTotal">
        </form>
    </main>
    @include('layouts.partials.footercust')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Ambil nilai dari URL query parameters
        const urlParams = new URLSearchParams(window.location.search);
        const packageName = urlParams.get('package');
        const priceString = urlParams.get('price');
        const name = urlParams.get('name');
        const email = urlParams.get('email');
        const phone = urlParams.get('phone');
        const notes = urlParams.get('notes');

        // Function to extract numeric value from price string
        function extractNumericPrice(priceString) {
            // Remove non-numeric characters and parse to float
            return parseFloat(priceString.replace(/\D/g, ''));
        }

        // Format currency
        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(amount);
        }

        // Hitung grand total
        const price = extractNumericPrice(priceString);
        const grandTotal = price;

        // Tampilkan nilai pada halaman
        document.getElementById('package').textContent = packageName;
        document.getElementById('price').textContent = formatCurrency(price);
        document.getElementById('grandTotal').textContent = formatCurrency(grandTotal);
        document.getElementById('name').textContent = name;
        document.getElementById('email').textContent = email;
        document.getElementById('phone').textContent = phone;

        if (notes) {
            document.getElementById('notes').textContent = notes;
        }


        document.getElementById('hiddenPackage').value = packageName;
        document.getElementById('hiddenPrice').value = priceString;
        document.getElementById('hiddenName').value = name;
        document.getElementById('hiddenEmail').value = email;
        document.getElementById('hiddenPhone').value = phone;
        document.getElementById('hiddenNotes').value = notes;
        document.getElementById('hiddenGrandTotal').value = formatCurrency(grandTotal);

        document.getElementById('submitBtn').addEventListener('click', function() {
            document.getElementById('hiddenForm').submit();
        });

        // document.getElementById('submitBtn').addEventListener('click', function() {
        //     // Cek apakah file bukti pembayaran sudah diupload
        //     const paymentProof = document.getElementById('paymentProof').files[0];
        //     if (paymentProof) {
        //         // Tampilkan custom alert
        //         document.getElementById('customAlert').style.display = 'block';
        //     } else {
        //         // Jika belum upload bukti pembayaran, beri notifikasi
        //         alert("Silakan upload bukti pembayaran terlebih dahulu.");
        //     }
        // });

        // Function to redirect to dashboard
        // function redirectToDashboard() {
        //     window.location.href = "{{ route('dashboard') }}";
        // }
    </script>
</body>

</html>
