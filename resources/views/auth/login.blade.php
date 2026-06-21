<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Panitia - Pawai Tatung Batam</title>
    <meta name="description" content="Halaman login panitia untuk masuk ke dashboard Pawai Tatung Batam.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #fbf6ed;
            --paper: rgba(255, 252, 247, 0.96);
            --line: rgba(195, 140, 58, 0.22);
            --gold: #c88a2b;
            --gold-deep: #9f6116;
            --red: #b92722;
            --text: #392615;
            --muted: #6c5844;
            --shadow: 0 24px 60px rgba(104, 66, 20, 0.14);
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            color: var(--text);
            background:
                radial-gradient(circle at 10% 10%, rgba(255, 216, 154, 0.34), transparent 18%),
                radial-gradient(circle at 90% 90%, rgba(255, 255, 255, 0.9), transparent 22%),
                linear-gradient(180deg, #fffdf8 0%, var(--bg) 100%);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a { color: inherit; text-decoration: none; }

        .page-shell {
            width: 100%;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .container {
            width: min(1200px, calc(100% - 2rem));
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.5rem 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .brand-mark {
            display: grid;
            place-items: center;
            width: 2.8rem;
            height: 2.8rem;
            border-radius: 16px;
            background: linear-gradient(145deg, #ca8f32, #9f6116);
            color: #fff;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.7rem;
            font-weight: 700;
        }

        .brand-text h1 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.55rem;
            line-height: 0.95;
            color: #b76d1d;
        }

        .brand-text p {
            margin: 0.1rem 0 0;
            letter-spacing: 0.26em;
            font-size: 0.72rem;
            color: #8a6a43;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            min-height: 2.9rem;
            padding: 0.75rem 1.15rem;
            border: 1px solid transparent;
            border-radius: 14px;
            font-weight: 700;
            line-height: 1;
            transition: transform .18s ease, box-shadow .18s ease;
            cursor: pointer;
        }

        .btn:hover { transform: translateY(-1px); }
        .btn-primary {
            color: #fff;
            background: linear-gradient(135deg, #c74732, #a71917);
            box-shadow: 0 14px 28px rgba(167, 25, 23, 0.2);
            width: 100%;
        }
        .btn-secondary {
            color: #8a5616;
            border-color: rgba(201, 146, 53, 0.25);
            background: linear-gradient(180deg, rgba(255, 250, 242, 0.96), rgba(247, 236, 211, 0.94));
        }

        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0 4rem;
        }

        .login-card {
            width: min(440px, 100%);
            border: 1px solid rgba(193, 136, 46, 0.18);
            border-radius: 26px;
            background: var(--paper);
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, rgba(201, 146, 53, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .card-header {
            padding: 2rem 2rem 1rem;
            text-align: center;
        }

        .card-title {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.2rem;
            color: #8f5516;
            line-height: 1.1;
        }

        .card-subtitle {
            margin: 0.5rem 0 0;
            color: var(--muted);
            font-size: 0.92rem;
            line-height: 1.5;
        }

        .card-body {
            padding: 1rem 2rem 2rem;
        }

        .form-grid {
            display: grid;
            gap: 1.2rem;
        }

        .field {
            display: grid;
            gap: 0.4rem;
        }

        label {
            font-size: 0.85rem;
            color: #6a4c31;
            font-weight: 700;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 1px solid rgba(193, 136, 46, 0.22);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.95);
            color: var(--text);
            font: inherit;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: rgba(167, 25, 23, 0.4);
            box-shadow: 0 0 0 3px rgba(167, 25, 23, 0.08);
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.88rem;
            color: var(--muted);
            cursor: pointer;
            user-select: none;
        }

        .remember-me input {
            accent-color: var(--red);
            width: 1rem;
            height: 1rem;
            cursor: pointer;
        }

        .alert-error {
            padding: 0.85rem 1rem;
            border-radius: 14px;
            border: 1px solid rgba(167, 25, 23, 0.2);
            background: rgba(252, 235, 235, 0.95);
            color: #8f1d19;
            font-size: 0.88rem;
            font-weight: 600;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        .footer {
            padding: 1.5rem 0;
            text-align: center;
            color: #8a6b49;
            font-size: 0.88rem;
            border-top: 1px solid rgba(195, 140, 58, 0.1);
            margin-top: auto;
        }

        @media (max-width: 760px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
                padding: 1rem 0;
            }
            .btn-secondary {
                width: 100%;
                text-align: center;
            }
            .main-content {
                padding: 1rem 0 3rem;
            }
            .login-card {
                border-radius: 20px;
            }
            .card-body {
                padding: 1rem 1.5rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="page-shell">
        <div class="container">
            <header class="topbar">
                <a href="{{ url('/') }}" class="brand" aria-label="Kembali ke beranda">
                    <span class="brand-mark">PT</span>
                    <span class="brand-text">
                        <h1>Pawai Tatung</h1>
                        <p>BATAM - KEPRI</p>
                    </span>
                </a>
                <a href="{{ url('/') }}" class="btn btn-secondary">Kembali ke Beranda</a>
            </header>
        </div>

        <main class="main-content">
            <div class="container" style="display: flex; justify-content: center;">
                <div class="login-card">
                    <div class="card-header">
                        <h2 class="card-title">Login Panitia</h2>
                        <p class="card-subtitle">Silakan masuk menggunakan akun panitia Pawai Tatung Anda.</p>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert-error">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('login.submit') }}" method="POST">
                            @csrf
                            <div class="form-grid">
                                <div class="field">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="contoh@domain.com">
                                </div>

                                <div class="field">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" id="password" name="password" required placeholder="Masukkan kata sandi">
                                </div>

                                <label class="remember-me">
                                    <input type="checkbox" name="remember" id="remember">
                                    <span>Ingat saya di perangkat ini</span>
                                </label>

                                <button type="submit" class="btn btn-primary">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="container">
                &copy; {{ date('Y') }} Pawai Tatung Batam - Kepri. Hak Cipta Dilindungi.
            </div>
        </footer>
    </div>
</body>
</html>
