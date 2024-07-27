<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank Transfer Information</title>
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
                <h1 class="animate-fadein">Bank Transfer Information</h1>
            </div>
        </div>
        <div class="container-card">
            <div class="card custom-card animate-fadein">
                <div class="card-body">
                    <h5 class="card-title">Transfer to the following bank account:</h5>
                    <div class="details-group">
                        <strong>Bank Name:</strong>
                        <span>BRI</span>
                    </div>
                    <div class="details-group">
                        <strong>Account Number:</strong>
                        <span>032901006075306</span>
                    </div>
                    <div class="details-group">
                        <strong>Account Name:</strong>
                        <span>SATYA PRATAMA GUNA</span>
                    </div>
                    <div class="details-group">
                        <strong>Grand Total:</strong>
                        <span>{{ request('grandTotal') }}</span>
                    </div>
                    <div class="details-group">
                        <strong>Note:</strong>
                        <span>Please include your name in the transfer description.</span>
                    </div>

                    <!-- Button to open upload proof modal -->
                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#uploadProofModal">
                        Submit
                    </button>
                </div>
            </div>
        </div>

        <!-- Upload Proof Modal -->
        <div class="modal fade" id="uploadProofModal" tabindex="-1" aria-labelledby="uploadProofModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadProofModalLabel">Upload Proof of Transfer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="uploadProofForm" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="paymentProof" class="form-label">Select proof of transfer file:</label>
                                <input type="file" class="form-control" id="paymentProof" name="paymentProof"
                                    required>
                                <input type="hidden" name="package" value="{{ request('package') }}">
                                <input type="hidden" name="price" value="{{ request('price') }}">
                                <input type="hidden" name="product" value="{{ request('product') }}">
                                <input type="hidden" name="name" value="{{ request('name') }}">
                                <input type="hidden" name="email" value="{{ request('email') }}">
                                <input type="hidden" name="phone" value="{{ request('phone') }}">
                                <input type="hidden" name="notes" value="{{ request('notes') }}">
                                <input type="hidden" name="grandTotal" value="{{ request('grandTotal') }}">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submitProofBtn">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.partials.footercust')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Function to handle submit proof button click
        document.getElementById('submitProofBtn').addEventListener('click', function() {
            const form = document.getElementById('uploadProofForm');
            const formData = new FormData(form);

            // Send AJAX request to upload proof
            fetch("{{ route('store.payment.proof') }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            title: 'Proof of Transfer Successfully Uploaded!',
                            text: 'Invoice will be sent to your email.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonText: 'Back To Home',
                            confirmButtonColor: '#3085d6',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('home') }}";
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while uploading proof of transfer.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        });
    </script>
</body>

</html>
