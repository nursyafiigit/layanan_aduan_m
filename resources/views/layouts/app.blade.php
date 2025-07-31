<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body class="bg-gray-100">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-4" style="width: 250px; height: 100vh; box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.1);">
            <h3 class="mb-4 text-center">Admin Dashboard</h3>
            <ul class="list-unstyled">
                <!-- Sidebar links -->
                <li class="mb-3"><a href="{{ route('dashboard') }}" class="text-white d-block p-2 rounded hover:bg-gray-700 text-decoration-none">Dashboard</a></li>
                <li class="mb-3"><a href="{{ route('books.index') }}" class="text-white d-block p-2 rounded hover:bg-gray-700 text-decoration-none">Daftar Buku</a></li>
                <li class="mb-3"><a href="{{ route('categories.index') }}" class="text-white d-block p-2 rounded hover:bg-gray-700 text-decoration-none">Kategori Buku</a></li>
                <li class="mb-3"><a href="{{ route('loans.index') }}" class="text-white d-block p-2 rounded hover:bg-gray-700 text-decoration-none">Peminjaman Buku</a></li>
                <li class="mb-3"><a href="{{ route('members.index') }}" class="text-white d-block p-2 rounded hover:bg-gray-700 text-decoration-none">Anggota</a></li>
                <li class="mb-3"><a href="{{ route('loans.history') }}" class="text-white d-block p-2 rounded hover:bg-gray-700 text-decoration-none">Riwayat Peminjaman</a></li>
                
                <!-- Logout button -->
              
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="container-fluid p-4" style="flex: 1;">
            @yield('content')
        </div>
    </div>
</body>

</html>
