<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Warga Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343A40;
            color: white;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .sidebar .logout-btn {
            margin-top: auto;
            padding: 15px 20px;
            background-color: #dc3545;
            text-align: center;
            border-top: 1px solid #c82333;
        }
        .sidebar .logout-btn:hover {
            background-color: #c82333;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .header .search-bar {
            width: 300px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-family: 'Inter', sans-serif;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .grid-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }
        .grid-container > div {
            width: 100%;
            max-width: 300px;
        }
        .card {
            background-color: #fff;
            color: #212529;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #4a5568;
        }
        .card-value {
            font-size: 24px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0;
        }
        .card-text {
            font-size: 16px;
            color: #718096;
        }
        .chart-container {
            width: 100%;
            height: 200px;
            margin-top: 15px;
            position: relative;
        }
    </style>
</head>
<body>
    {{-- Sidebar --}}
    <div class="sidebar">
        <h2 class="text-center text-white">Warga Digital</h2>
        <hr class="text-white">
        <a href="{{ route('dashboard') }}">
            <i class="bi bi-house-door text-primary me-2"></i> <span class="text-white">Dashboard</span>
        </a>
        <a href="{{ route('warga.index') }}">
            <i class="bi bi-people text-success me-2"></i> <span class="text-white">Data Warga</span>
        </a>
        <a href="{{ route('kegiatanwarga.index') }}">
            <i class="bi bi-calendar-event text-danger me-2"></i> <span class="text-white">Kegiatan Warga</span>
        </a>
        <a href="{{ route('rekapitulasi-transaksi.index') }}">
            <i class="bi bi-cash me-2 text-warning"></i> <span class="text-white">Rekapitulasi Transaksi</span>
        </a>
        <form action="{{ route('logout') }}" method="POST" class="logout-btn">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Sign Out</button>
        </form>
    </div>
    

    {{-- Content --}}
    <div class="content">
        {{-- Header --}}
        <div class="header">
            <h4 class="text-white">Dashboard</h4>
            <div class="user-info">
                <span class="username" style="font-weight: 500;">Hello, {{ Auth::user()->name }}</span>
            </div>
        </div>

        {{-- Cards --}}
        <div class="grid-container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Warga</h5>
                    <p class="card-value">{{ $totalWarga }}</p>
                    <p class="card-text">Jumlah Warga Terdaftar</p>
                    <div class="chart-container">
                        <canvas id="wargaChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Kegiatan</h5>
                    <p class="card-value">{{ $totalKegiatan }}</p>
                    <p class="card-text">Kegiatan yang Terlaksana</p>
                     <div class="chart-container">
                        <canvas id="kegiatanChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Saldo</h5>
                    <p class="card-value">Rp {{ number_format($totalSaldo, 0, ',', '.') }}</p>
                    <p class="card-text">Saldo Kas Komplek</p>
                    <div class="chart-container">
                         <canvas id="saldoChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const wargaChartCtx = document.getElementById('wargaChart').getContext('2d');
        const wargaChart = new Chart(wargaChartCtx, {
            type: 'doughnut',
            data: {
                labels: ['Warga'],
                datasets: [{
                    label: 'Total Warga',
                    data: [{{ $totalWarga }}],
                    backgroundColor: ['#4CAF50'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                       callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed !== null) {
                                    label += context.parsed + ' Warga';
                                }
                                return label;
                            }
                        }
                    }
                },
            }
        });

        const kegiatanChartCtx = document.getElementById('kegiatanChart').getContext('2d');
        const kegiatanChart = new Chart(kegiatanChartCtx, {
            type: 'pie',
            data: {
                labels: ['Kegiatan'],
                datasets: [{
                    label: 'Total Kegiatan',
                    data: [{{ $totalKegiatan }}],
                    backgroundColor: ['#00B0FF'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                     tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed !== null) {
                                    label += context.parsed + ' Kegiatan';
                                }
                                return label;
                            }
                        }
                    }
                },
            }
        });

        const saldoChartCtx = document.getElementById('saldoChart').getContext('2d');
        const saldoChart = new Chart(saldoChartCtx, {
            type: 'line',
            data: {
                labels: ['Saldo'],
                datasets: [{
                    label: 'Total Saldo',
                    data: [{{ $totalSaldo }}],
                    backgroundColor: ['rgba(255, 215, 0, 0.2)'],
                    borderColor: ['rgba(255, 215, 0, 1)'],
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed !== null) {
                                    label += 'Rp ' + context.parsed.toLocaleString();
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                         ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
