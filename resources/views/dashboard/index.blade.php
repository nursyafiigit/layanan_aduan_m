@extends('layouts.app')

@section('content')
    <div class="container bg-white p-3 shadow-sm rounded" style= "overflow: hidden;">
        <h4 class="text-center judul mb-5">Dashboard</h4>

        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card shadow text-white d-flex flex-row justify-content-between align-items-center px-4 py-3"
                    style="background: linear-gradient(45deg,#36d1dc,#5b86e5); min-height: 120px;">
                    <div>
                        <div class="fw-semibold small">Jumlah Buku</div>
                        <div class="display-6 fw-bold" style="font-size: 28px;">{{ $totalBooks }}</div>
                    </div>
                    <img src="{{ asset('image/buku2.png') }}" alt="Buku" style="width:60px; height:60px;">
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow text-white d-flex flex-row justify-content-between align-items-center px-4 py-3"
                    style="background: linear-gradient(45deg,#8e2de2,#4a00e0); min-height: 120px;">
                    <div>
                        <div class="fw-semibold small">Buku yang Tersedia</div>
                        <div class="display-6 fw-bold" style="font-size: 28px;">{{ $availableBooks }}</div>
                    </div>
                    <img src="{{ asset('image/buku1.png') }}" alt="Buku1" style="width:55px; height:55px;">
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow text-white d-flex flex-row justify-content-between align-items-center px-4 py-3"
                    style="background: linear-gradient(45deg,#ff416c,#ff4b2b); min-height: 120px;">
                    <div>
                        <div class="fw-semibold small">Total Member</div>
                        <div class="display-6 fw-bold" style="font-size: 28px;">{{ $totalMembers }}</div>
                    </div>
                    <img src="{{ asset('image/member.png') }}" alt="Member" style="width:65px; height:65px;">
                </div>
            </div>
        </div>

        <div class="card shadow" style="height: 489px; overflow: hidden;">
            <div class="card-body p-3 d-flex flex-column" style="height: 100%;">
                <h6 class="card-title mb-2">Grafik Peminjaman Buku Selama 1 Tahun</h6>
                <div style="flex-grow: 1;">
                    <canvas id="loanChart" class="w-100 h-100"></canvas>
                </div>
            </div>
        </div>

    </div>

    </div>

    <script>
        var ctx = document.getElementById('loanChart').getContext('2d');
        var loanChart = new Chart(ctx, {
            data: {
                labels: @json($months),
                datasets: [
                    {
                        type: 'bar',
                        label: 'Jumlah Peminjaman',
                        data: @json($loanCounts),
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderRadius: 5,
                        maxBarThickness: 30
                    },
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
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
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