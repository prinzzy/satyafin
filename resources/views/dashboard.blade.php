<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">This is the main page.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card text-white bg-primary mb-3 custom-card">
                    <div class="card-body">
                        <h5 class="card-title">Transactions</h5>
                        <p class="card-text">Manage all transactions here.</p>
                        <a href="{{ route('admin.transactions.index') }}" class="btn btn-light">Go to Transactions</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="transactionsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>