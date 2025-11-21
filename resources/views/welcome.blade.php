<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang di Web Biodata</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
            font-family: sans-serif;
        }
        .welcome-container {
            text-align: center;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .welcome-container h1 {
            color: #343a40;
            margin-bottom: 20px;
        }
        .welcome-container p {
            color: #6c757d;
            margin-bottom: 30px;
        }
        .welcome-container a {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .welcome-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Halo! Selamat Datang di Web Biodata Saya</h1>
        <p>Di sini Anda bisa melihat informasi pribadi saya.</p>
        <a href="{{ route('personal-data.index') }}">Lihat Biodata</a>
    </div>
</body>
</html>