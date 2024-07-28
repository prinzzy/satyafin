<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Transactions Data</h3>
                <p class="text-subtitle text-muted">Detail Semua Transaksi</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Alert</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Button to trigger modal for creating new transaction -->
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createTransactionModal">
                            Add New Transaction
                        </button>

                        <div class="table-responsive">
                            <table id="transactionsTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Package</th>
                                        <th>Price</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Grand Total</th>
                                        <th>Notes</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Proof</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->product }}</td>
                                        <td>{{ $transaction->package }}</td>
                                        <td>{{ 'Rp ' . number_format($transaction->price, 0, ',', '.') }}</td>
                                        <td>{{ $transaction->name }}</td>
                                        <td>{{ $transaction->email }}</td>
                                        <td>{{ $transaction->phone }}</td>
                                        <td>{{ 'Rp ' . number_format($transaction->grand_total, 0, ',', '.') }}</td>
                                        <td>{{ $transaction->notes }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                        <td>{{ $transaction->updated_at }}</td>
                                        <td>
                                            @if ($transaction->proof_path)
                                            <a href="{{ asset('storage/' . $transaction->proof_path) }}" target="_blank" class="btn btn-info btn-sm">View Proof</a>
                                            @else
                                            No proof uploaded
                                            @endif
                                        </td>
                                        <td>
                                            <select class="form-select status-select" data-id="{{ $transaction->id }}" style="min-width: 150px;">
                                                <option value="Belum Terbit Invoice" {{ $transaction->status === 'Belum Terbit Invoice' ? 'selected' : '' }}>Belum Terbit Invoice</option>
                                                <option value="Terbit Invoice" {{ $transaction->status === 'Terbit Invoice' ? 'selected' : '' }}>Terbit Invoice</option>
                                            </select>
                                        </td>
                                        <td>
                                            <!-- Button to trigger modal for editing transaction -->
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editTransactionModal{{ $transaction->id }}">
                                                Edit
                                            </button>
                                            <!-- Form for deleting transaction -->
                                            <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this transaction?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal for editing transaction -->
                                    <div class="modal fade" id="editTransactionModal{{ $transaction->id }}" tabindex="-1" aria-labelledby="editTransactionModalLabel{{ $transaction->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editTransactionModalLabel{{ $transaction->id }}">Edit Transaction</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form fields for editing transaction -->
                                                        <div class="mb-3">
                                                            <label for="product" class="form-label">Product</label>
                                                            <input type="text" class="form-control" id="product" name="product" value="{{ $transaction->product }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit_package{{ $transaction->id }}" class="form-label">Package</label>
                                                            <input type="text" class="form-control" id="edit_package{{ $transaction->id }}" name="package" value="{{ $transaction->package }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit_price{{ $transaction->id }}" class="form-label">Price</label>
                                                            <input type="text" class="form-control rupiah-input" id="edit_price{{ $transaction->id }}" name="price" value="{{ $transaction->price }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit_name{{ $transaction->id }}" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="edit_name{{ $transaction->id }}" name="name" value="{{ $transaction->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit_email{{ $transaction->id }}" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="edit_email{{ $transaction->id }}" name="email" value="{{ $transaction->email }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit_phone{{ $transaction->id }}" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" id="edit_phone{{ $transaction->id }}" name="phone" value="{{ $transaction->phone }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit_notes{{ $transaction->id }}" class="form-label">Notes</label>
                                                            <textarea class="form-control" id="edit_notes{{ $transaction->id }}" name="notes">{{ $transaction->notes }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit_grand_total{{ $transaction->id }}" class="form-label">Grand Total</label>
                                                            <input type="text" class="form-control rupiah-input" id="edit_grand_total{{ $transaction->id }}" name="grand_total" value="{{ $transaction->grand_total }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit_proof_path{{ $transaction->id }}" class="form-label">Payment Proof</label>
                                                            <input type="file" class="form-control" id="edit_proof_path{{ $transaction->id }}" name="proof_path">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for creating new transaction -->
    <div class="modal fade" id="createTransactionModal" tabindex="-1" aria-labelledby="createTransactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.transactions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createTransactionModalLabel">Add New Transaction</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form fields for creating new transaction -->
                        <div class="mb-3">
                            <label for="product" class="form-label">Product</label>
                            <input type="text" class="form-control" id="product" name="product" required>
                        </div>
                        <div class="mb-3">
                            <label for="package" class="form-label">Package</label>
                            <input type="text" class="form-control" id="package" name="package" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control rupiah-input" id="price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea class="form-control" id="notes" name="notes"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="grand_total" class="form-label">Grand Total</label>
                            <input type="text" class="form-control rupiah-input" id="grand_total" name="grand_total" required>
                        </div>
                        <div class="mb-3">
                            <label for="proof_path" class="form-label">Payment Proof</label>
                            <input type="file" class="form-control" id="proof_path" name="proof_path">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include colResizable plugin from CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/colresizable/colResizable-1.6.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize colResizable plugin on transactionsTable
            $('#transactionsTable').colResizable({
                liveDrag: true,
                resizeMode: 'fit'
            });

            // Format currency input fields
            $('.rupiah-input').on('input', function() {
                let value = $(this).val().replace(/[^,\d]/g, '').toString();
                let split = value.split(',');
                let remainder = split[0].length % 3;
                let rupiah = split[0].substr(0, remainder);
                let thousand = split[0].substr(remainder).match(/\d{3}/gi);

                if (thousand) {
                    let separator = remainder ? '.' : '';
                    rupiah += separator + thousand.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                $(this).val('Rp ' + rupiah);
            });

            // Handle status change via AJAX
            $('.status-select').change(function() {
                let transactionId = $(this).data('id');
                let newStatus = $(this).val();

                $.ajax({
                    url: '{{ route("admin.transactions.update-status") }}',
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: transactionId,
                        status: newStatus
                    },
                    success: function(response) {
                        alert('Status updated successfully');
                    },
                    error: function(response) {
                        alert('Failed to update status');
                    }
                });
            });
        });
    </script>
</x-app-layout>