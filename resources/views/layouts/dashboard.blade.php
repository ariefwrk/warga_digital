{{-- filepath: c:\xampp\htdocs\warga_digital\resources\views\layouts\dashboard.blade.php --}}
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
            <div class="user-info">
                <span class="username" style="font-weight: 500;">Hello, {{ Auth::user()->name }}</span>
            </div>
        </div>

        {{-- Main Content --}}
        <div>
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
