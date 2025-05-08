{{-- filepath: c:\xampp\htdocs\warga_digital\resources\views\auth\register.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Warga Digital</title>
    <meta name="description" content="Register a new Warga Digital account">
    <meta name="keywords" content="Warga Digital, register, authentication">
    <meta name="author" content="Warga Digital Team">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#0078d4">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f2f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .register-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333333;
        }
        .app-title {
            font-size: 28px;
            font-weight: bold;
            color: #0078d4;
            text-align: center;
            margin-bottom: 10px;
        }
        .btn-primary {
            background-color: #0078d4;
            border-color: #0078d4;
        }
        .btn-primary:hover {
            background-color: #005a9e;
            border-color: #005a9e;
        }
        .footer-text {
            font-size: 12px;
            color: #666666;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="register-container">
        {{-- Judul Aplikasi --}}
        <div class="app-title">Warga Digital</div>

        {{-- Judul Form --}}
        <div class="register-header text-center">Daftar Akun Baru</div>

        {{-- Pesan Error --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Register --}}
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password Anda" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Ulangi password Anda" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftar</button>
        </form>

        {{-- Footer --}}
        <div class="footer-text">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
        </div>
    </div>
</body>
</html>