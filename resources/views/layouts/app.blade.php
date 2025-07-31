<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
            @vite(['resources/css/app.css', 'resources/js/app.js'])
    
  
</head>

<body class="bg-gray-100">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">
            <h3 class="mb-4">Admin Dashboard</h3>
            <ul class="list-unstyled">
                <li><a href="{{ route('dashboard') }}" class="text-white">Dashboard</a></li>
                <li><a href="{{ route('books.index') }}" class="text-white">Daftar Buku</a></li>
                <li><a href="{{ route('categories.index') }}" class="text-white">Kategori Buku</a></li>
                <li><a href="{{ route('loans.create') }}" class="text-white">Peminjaman Buku</a></li>
                <li><a href="{{ route('members.index') }}" class="text-white">Anggota</a></li>
                <li><a href="{{ route('loans.returnForm', ['id' => 1]) }}" class="text-white">Kembalikan Buku</a></li>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

                <!-- Menu kembalikan buku -->
            </ul>
        </div>

        <!-- Konten Dashboard -->
        <div class="container-fluid p-4" style="flex: 1;">
            @yield('content')
        </div>
    </div>
</body>

</html>