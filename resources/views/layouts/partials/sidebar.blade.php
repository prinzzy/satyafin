<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/satyafin.png')">


    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Transaksi" icon="bi bi-stack">
        <x-maz-sidebar-sub-item name="Data Transaksi" :link="route('admin.transactions.index')"></x-maz-sidebar-sub-item>
    </x-maz-sidebar-item>

</x-maz-sidebar>