<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İçerik Yönetim Paneli</title>
    <style>
        /* Genel Stiller */
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; margin: 0; background-color: #f0f2f5; color: #333; }
        .container { max-width: 1200px; margin: 2rem auto; padding: 0 1.5rem; }
        
        /* Başlık ve Navigasyon Stilleri */
        .header { background-color: #ffffff; padding: 1rem 1.5rem; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .header .logo a { font-size: 1.5rem; font-weight: 700; color: #333; text-decoration: none; }
        .header nav a { color: #555; text-decoration: none; margin-left: 2rem; font-size: 1rem; font-weight: 600; transition: color 0.3s ease; }
        .header nav a:hover { color: #007bff; }

        /* Buton Stilleri */
        .btn { display: inline-block; padding: 0.75rem 1.5rem; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; font-weight: 600; transition: background-color 0.3s ease, transform 0.2s ease; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-primary:hover { background-color: #0056b3; transform: translateY(-2px); }
        .btn-danger { background-color: #dc3545; color: white; }
        .btn-danger:hover { background-color: #c82333; transform: translateY(-2px); }
        .btn-secondary { background-color: #6c757d; color: white; }
        .btn-secondary:hover { background-color: #5a6268; }

        /* Tablo Stilleri */
        .table-container { background-color: #fff; padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-top: 1.5rem; }
        table { width: 100%; border-collapse: collapse; }
        table th, table td { padding: 1rem; text-align: left; border-bottom: 1px solid #ddd; }
        table th { background-color: #f8f9fa; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; }
        table tbody tr:hover { background-color: #f1f1f1; }
        .action-links { display: flex; align-items: center; }
        .action-links form { display: inline-block; }

        /* Form Stilleri */
        .form-card { background-color: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); max-width: 600px; margin: 2rem auto; }
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #495057; }
        input[type="text"], textarea, select { width: 100%; padding: 0.75rem; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; font-size: 1rem; }
        input[type="text"]:focus, textarea:focus, select:focus { border-color: #80bdff; outline: 0; box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25); }

        /* Uyarı Mesajları */
        .alert { padding: 1rem 1.5rem; border-radius: 6px; margin-bottom: 1.5rem; font-weight: 600; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert-danger {
        background-color: #f8d7da; /* Açık kırmızı */
        color: #721c24;          /* Koyu kırmızı metin */
        border: 1px solid #f5c6cb;
        padding: 1rem 1.5rem;
        border-radius: 6px;
        margin-bottom: 1.5rem;
        font-weight: 600;
    }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="/">Ana Sayfa</a>
        </div>
        <nav>
            <a href="{{ route('authors.index') }}">Yazarlar</a>
            <a href="{{ route('categories.index') }}">Kategoriler</a>
            <a href="{{ route('posts.index') }}">Yazılar</a>
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>