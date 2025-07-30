<!-- resources/views/dashboard/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container bg-white p-4 shadow-sm rounded">
        <h2 class="text-center mb-4">Dashboard</h2>

        <!-- Statistik -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Buku</h5>
                        <p class="card-text">{{ $totalBooks }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Buku yang Tersedia</h5>
                        <p class="card-text">{{ $availableBooks }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Member</h5>
                        <p class="card-text">{{ $totalMembers }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Peminjaman Buku -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Grafik Peminjaman Buku Selama 1 Tahun</h5>
                <canvas id="loanChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('loanChart').getContext('2d');
        var loanChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($months), // Bulan-bulan dalam tahun ini
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: @json($loanCounts), // Jumlah peminjaman per bulan
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Peminjaman'
                        }
                    }
                }
            }
        });
    </script>
@endsection