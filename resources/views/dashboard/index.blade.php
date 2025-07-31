@extends('layouts.app')

@section('content')
    <div class="container bg-white p-4 shadow-sm rounded">
        <h2 class="text-center mb-4">Dashboard</h2>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="kartu card shadow text-white d-flex flex-row justify-content-between align-items-center px-5 py-4"
                    style="background: linear-gradient(45deg,#36d1dc,#5b86e5);">
                    <div>
                        <h5 class="card-title mb-2">Jumlah Buku</h5>
                        <p class="card-text display-6 fw-bold" style="font-size: 50px;">{{ $totalBooks }}</p>
                    </div>
                    <div>
                        <img src="{{ asset('image/buku2.png') }}" alt="Buku" style="width:80px; height:80px;">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="kartu card shadow text-white d-flex flex-row justify-content-between align-items-center px-5 py-4" 
                    style="background: linear-gradient(45deg,#8e2de2,#4a00e0);">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Buku yang Tersedia</h5>
                        <p class="card-text display-6 fw-bold">{{ $availableBooks }}</p>
                    </div>
                    <div>
                        <img src="{{ asset('image/buku1.png') }}" alt="Buku1" style="width:70px; height:70px;">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="kartu card shadow text-white d-flex flex-row justify-content-between align-items-center px-5 py-4" 
                    style="background: linear-gradient(45deg,#ff416c,#ff4b2b);">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Total Member</h5>
                        <p class="card-text display-6 fw-bold">{{ $totalMembers }}</p>
                    </div>
                    <div>
                        <img src="{{ asset('image/member.png') }}" alt="Buku1" style="width:100px; height:100px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik cok-->
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Grafik Peminjaman Buku Selama 1 Tahun</h5>
                <canvas id="loanChart"></canvas>
            </div>
        </div>
    </div>

    <script>
    var ctx = document.getElementById('loanChart').getContext('2d');
    var loanChart = new Chart(ctx, {
        data: {
            labels: @json($months), // Bulan-bulan dalam tahun ini
            datasets: [
                // Dataset 1: Bar Chart
                {
                    type: 'bar',
                    label: 'Jumlah Peminjaman',
                    data: @json($loanCounts),
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderRadius: 5,
                    maxBarThickness: 40
                },
                // Dataset 2: Line Chart (Trend)
                {
                    type: 'line',
                    label: 'Trend',
                    data: @json($loanCounts),
                    borderColor: '#ff4b4b',
                    borderWidth: 2,
                    fill: false,
                    tension: 0.3,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#ff4b4b',
                    pointRadius: 5,
                    pointHoverRadius: 7
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true, position: 'top' }
            },
            scales: {
                x: { grid: { display: false } },
                y: { grid: { color: '#f0f0f0' }, beginAtZero: true }
            }
        }
    });
</script>

@endsection

<style scoped>
.kartu {
    min-width: 400px;
    max-height: 120px;
    min-height: 120px;
}
</style>