{{-- filepath: c:\xampp\htdocs\warga_digital\resources\views\home.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Warga Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f2f1; /* Warna abu-abu terang */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        .title {
            font-size: 36px;
            font-weight: bold;
            color: #0078d4; /* Warna biru khas Microsoft */
            margin-bottom: 20px;
        }
        .subtitle {
            font-size: 18px;
            color: #666666;
            margin-bottom: 30px;
        }
        .btn-custom {
            background-color: #0078d4; /* Warna biru */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            margin: 10px;
            width: 150px;
        }
        .btn-custom:hover {
            background-color: #005a9e; /* Biru lebih gelap */
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #666666;
        }
        .footer a {
            color: #0078d4;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Warga Digital Annisa Residence</h2>
        <p class="subtitle">Selamat datang di Warga Digital. Pilih menu di bawah untuk melanjutkan.</p>
        <a href="{{ route('login') }}" class="btn btn-custom">Login</a>
        <a href="{{ route('register') }}" class="btn btn-custom">Sign Up</a>
        <div class="footer">
            <p>Jalan Parit Bugis, Arang limbung 78391 </p>
            <p>Ikuti kami di 
                <a href="#">WhatsApp</a>, 
                <a href="#">Facebook</a>, 
                <a href="#">Instagram</a>
            </p>
        </div>
    </div>
</body>
</html>