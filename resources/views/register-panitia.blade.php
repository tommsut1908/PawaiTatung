@php
    $highlights = [
        ['title' => 'Bantu Kelancaran Acara', 'text' => 'Menjadi bagian dari tim yang memastikan kegiatan berjalan tertib.'],
        ['title' => 'Koordinasi Langsung', 'text' => 'Panitia akan menghubungi Anda untuk pembagian tugas.'],
        ['title' => 'Peran Fleksibel', 'text' => 'Cocok untuk relawan yang ingin berkontribusi pada acara.'],
    ];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Panitia & Relawan - Pawai Tatung Batam</title>
    <meta name="description" content="Halaman pendaftaran panitia dan relawan untuk Pawai Tatung Batam.">
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
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            color: var(--text);
            background:
                radial-gradient(circle at 10% 10%, rgba(255, 216, 154, 0.34), transparent 18%),
                radial-gradient(circle at 90% 0%, rgba(255, 255, 255, 0.9), transparent 22%),
                linear-gradient(180deg, #fffdf8 0%, var(--bg) 100%);
            font-family: 'Inter', sans-serif;
        }

        a { color: inherit; text-decoration: none; }
        img { display: block; width: 100%; }

        .page-shell {
            position: relative;
            overflow: hidden;
            min-height: 100vh;
        }

        .container {
            width: min(1240px, calc(100% - 2rem));
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.05rem 0 0.8rem;
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

        button:hover { cursor: pointer; }

        .btn:hover { transform: translateY(-1px); }
        .btn-primary {
            color: #fff;
            background: linear-gradient(135deg, #c74732, #a71917);
            box-shadow: 0 14px 28px rgba(167, 25, 23, 0.2);
        }
        .btn-secondary {
            color: #8a5616;
            border-color: rgba(201, 146, 53, 0.25);
            background: linear-gradient(180deg, rgba(255, 250, 242, 0.96), rgba(247, 236, 211, 0.94));
        }

        .hero {
            overflow: hidden;
            border: 1px solid rgba(193, 136, 46, 0.18);
            border-radius: 30px;
            background:
                linear-gradient(90deg, rgba(10, 8, 7, 0.78) 0%, rgba(10, 8, 7, 0.48) 34%, rgba(10, 8, 7, 0.05) 100%),
                url('{{ asset('images/registration-panitia.png') }}') center right / cover no-repeat;
            box-shadow: var(--shadow);
            min-height: 420px;
            display: grid;
            align-items: end;
        }

        .hero-copy {
            width: min(560px, 100%);
            padding: 2.2rem;
            color: #fff8ee;
        }

        .hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.45rem 0.8rem;
            border-radius: 999px;
            background: rgba(255, 239, 208, 0.14);
            border: 1px solid rgba(255, 238, 204, 0.18);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .hero-copy h2 {
            margin: 0.85rem 0 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(3rem, 6vw, 5.2rem);
            line-height: 0.92;
        }

        .hero-copy p {
            margin: 0.8rem 0 0;
            max-width: 30rem;
            color: rgba(255, 248, 238, 0.92);
            font-size: 1rem;
            line-height: 1.75;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
            padding: 0.55rem 0.8rem;
            border-radius: 12px;
            background: rgba(255, 248, 238, 0.12);
            border: 1px solid rgba(255, 248, 238, 0.18);
            font-size: 0.9rem;
            font-weight: 600;
        }

        .section {
            margin-top: 1rem;
            padding: 1rem;
            border: 1px solid rgba(193, 136, 46, 0.14);
            border-radius: 26px;
            background: var(--paper);
            box-shadow: var(--shadow);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 0.8rem;
        }

        .info-card {
            padding: 1rem;
            border: 1px solid rgba(193, 136, 46, 0.16);
            border-radius: 18px;
            background: linear-gradient(180deg, rgba(255, 253, 248, 0.98), rgba(247, 236, 212, 0.85));
        }

        .info-card h3 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            color: #8f5516;
        }

        .info-card p {
            margin: 0.35rem 0 0;
            color: var(--muted);
            line-height: 1.65;
            font-size: 0.95rem;
        }

        .form-wrap {
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
            gap: 1rem;
            margin-top: 1rem;
        }

        .form-card,
        .side-card {
            border: 1px solid rgba(193, 136, 46, 0.16);
            border-radius: 24px;
            background: linear-gradient(180deg, rgba(255, 253, 248, 0.98), rgba(247, 236, 212, 0.86));
            box-shadow: 0 16px 32px rgba(104, 66, 20, 0.08);
        }

        .form-card {
            padding: 1.2rem;
        }

        .section-title {
            margin: 0 0 0.4rem;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            color: #8f5516;
            text-align: center;
        }

        .section-copy {
            margin: 0 auto 1rem;
            max-width: 40rem;
            color: var(--muted);
            line-height: 1.7;
            text-align: center;
        }

        .alert-success {
            margin-bottom: 1rem;
            padding: 0.9rem 1rem;
            border-radius: 16px;
            border: 1px solid rgba(36, 132, 56, 0.2);
            background: rgba(233, 248, 237, 0.9);
            color: #165a2c;
            font-weight: 600;
        }

        .alert-error {
            margin-bottom: 1rem;
            padding: 0.9rem 1rem;
            border-radius: 16px;
            border: 1px solid rgba(167, 25, 23, 0.2);
            background: rgba(252, 235, 235, 0.95);
            color: #8f1d19;
        }

        .success-modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 90;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background: rgba(32, 18, 8, 0.5);
            backdrop-filter: blur(8px);
        }

        .success-modal-backdrop.is-open {
            display: flex;
        }

        .success-modal {
            position: relative;
            width: min(560px, 100%);
            overflow: hidden;
            border: 1px solid rgba(193, 136, 46, 0.2);
            border-radius: 26px;
            background:
                radial-gradient(circle at 15% 15%, rgba(255, 219, 155, 0.2), transparent 20%),
                linear-gradient(180deg, rgba(255, 252, 246, 0.99), rgba(248, 239, 222, 0.98));
            box-shadow: 0 26px 60px rgba(32, 18, 8, 0.3);
        }

        .success-modal::before,
        .success-modal::after {
            content: '';
            position: absolute;
            width: 110px;
            height: 110px;
            pointer-events: none;
            border-radius: 50%;
            background:
                radial-gradient(circle at 50% 50%, transparent 0 68%, rgba(214, 159, 58, 0.85) 69% 73%, transparent 74%),
                radial-gradient(circle at 50% 50%, transparent 0 78%, rgba(214, 159, 58, 0.18) 79% 81%, transparent 82%);
            opacity: 0.7;
        }

        .success-modal::before {
            top: -24px;
            left: -24px;
        }

        .success-modal::after {
            right: -24px;
            bottom: -24px;
        }

        .success-modal-close {
            position: absolute;
            top: 0.8rem;
            right: 0.8rem;
            z-index: 1;
            display: grid;
            place-items: center;
            width: 2.35rem;
            height: 2.35rem;
            border: 1px solid rgba(193, 136, 46, 0.24);
            border-radius: 999px;
            background: rgba(255, 251, 244, 0.96);
            color: #8f5516;
            font-size: 1.45rem;
            line-height: 1;
            cursor: pointer;
        }

        .success-modal-body {
            padding: 1.4rem 1.2rem 1.15rem;
            text-align: center;
        }

        .success-modal-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.4rem 0.75rem;
            border-radius: 999px;
            background: rgba(247, 212, 132, 0.18);
            border: 1px solid rgba(201, 146, 53, 0.16);
            color: #9a651c;
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .success-modal-body h3 {
            margin: 0.9rem 0 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2rem, 5vw, 3rem);
            color: var(--red);
            line-height: 1;
        }

        .success-modal-body p {
            margin: 0.7rem auto 0;
            max-width: 30rem;
            color: var(--muted);
            line-height: 1.8;
        }

        .success-modal-actions {
            display: flex;
            justify-content: center;
            margin-top: 1.15rem;
        }

        .field-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.85rem;
        }

        .field {
            display: grid;
            gap: 0.4rem;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 0.92rem;
            font-weight: 700;
            color: #6b4a20;
        }

        input {
            width: 100%;
            min-height: 3rem;
            border: 1px solid rgba(193, 136, 46, 0.22);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.92);
            padding: 0.85rem 0.95rem;
            color: var(--text);
            font: inherit;
            outline: none;
        }

        input:focus {
            border-color: rgba(201, 146, 53, 0.52);
            box-shadow: 0 0 0 4px rgba(201, 146, 53, 0.12);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 1rem;
        }

        .side-card {
            padding: 1.2rem;
            display: grid;
            gap: 0.85rem;
        }

        .side-media {
            border-radius: 20px;
            overflow: hidden;
            aspect-ratio: 4 / 3;
            box-shadow: 0 10px 24px rgba(104, 66, 20, 0.12);
        }

        .side-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .side-card h3 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            color: #8f5516;
        }

        .side-card p {
            margin: 0;
            color: var(--muted);
            line-height: 1.75;
        }

        .checklist {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 0.7rem;
        }

        .checklist li {
            padding: 0.75rem 0.85rem;
            border-radius: 14px;
            border: 1px solid rgba(193, 136, 46, 0.14);
            background: rgba(255, 255, 255, 0.76);
            color: var(--text);
            line-height: 1.55;
        }

        .footer {
            margin: 1rem 0 1.5rem;
            text-align: center;
            color: var(--muted);
            font-size: 0.92rem;
        }

        @media (max-width: 980px) {
            .form-wrap,
            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 720px) {
            .topbar {
                flex-wrap: wrap;
            }

            .hero-copy {
                padding: 1.5rem;
            }

            .section {
                padding: 0.85rem;
            }

            .field-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="page-shell">
        <div class="container">
            <header class="topbar">
                <a href="{{ url('/') }}" class="brand" aria-label="Kembali ke beranda">
                    <div class="brand-mark">PT</div>
                    <div class="brand-text">
                        <h1>Pawai Tatung</h1>
                        <p>BATAM - KEPRI</p>
                    </div>
                </a>
                <a href="{{ url('/') }}" class="btn btn-secondary">Kembali ke Beranda</a>
            </header>

            <section class="hero" aria-label="Pendaftaran Panitia dan Relawan">
                <div class="hero-copy">
                    <div class="hero-kicker">Pendaftaran Panitia & Relawan</div>
                    <h2>Bantu sukseskan Pawai Tatung Batam</h2>
                    <p>Isi data singkat Anda untuk bergabung sebagai panitia atau relawan. Tim kami akan menghubungi Anda untuk koordinasi selanjutnya.</p>
                    <div class="hero-badge">Kontak cepat, koordinasi mudah, peran jelas</div>
                </div>
            </section>

            <section class="section">
                <div class="info-grid">
                    @foreach ($highlights as $highlight)
                        <article class="info-card">
                            <h3>{{ $highlight['title'] }}</h3>
                            <p>{{ $highlight['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </section>

            <section class="section">
                <div class="form-wrap">
                    <div class="form-card">
                        <h2 class="section-title">Form Pendaftaran Panitia</h2>
                        <p class="section-copy">Lengkapi data di bawah ini. Setelah berhasil dikirim, panitia akan menghubungi Anda kembali.</p>

                        @if (isset($errors) && $errors->any())
                            <div class="alert-error">
                                <strong>Periksa kembali isian Anda:</strong>
                                <ul style="margin: 0.5rem 0 0; padding-left: 1.2rem;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('pendaftaran.panitia.submit') }}" method="POST">
                            @csrf
                            <div class="field-grid">
                                <div class="field full">
                                    <label for="nama">Nama *</label>
                                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                                </div>
                                <div class="field full">
                                    <label for="no_kontak">No Kontak *</label>
                                    <input type="text" id="no_kontak" name="no_kontak" value="{{ old('no_kontak') }}" placeholder="Masukkan nomor WhatsApp / telepon" required>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Kirim Pendaftaran</button>
                            </div>
                        </form>
                    </div>

                    <aside class="side-card">
                        <div class="side-media">
                            <img src="{{ asset('images/registration-panitia.png') }}" alt="Panitia Pawai Tatung">
                        </div>
                        <h3>Kenapa bergabung?</h3>
                        <p>Panitia dan relawan punya peran penting untuk menjaga kelancaran acara, membantu peserta, dan memastikan rangkaian kegiatan berjalan tertib.</p>
                        <ul class="checklist">
                            <li>Data pendaftaran akan diverifikasi oleh tim panitia.</li>
                            <li>Koordinasi tugas dilakukan setelah Anda terdaftar.</li>
                            <li>Anda akan dihubungi melalui kontak yang diisi.</li>
                        </ul>
                    </aside>
                </div>
            </section>

        <div class="footer">
            &copy; 2026 Pawai Tatung Jilid 3 - Batam, Kepri. All rights reserved.
        </div>
    </div>
</div>
@if (session('success'))
    <div class="success-modal-backdrop is-open" id="successModal" role="dialog" aria-modal="true" aria-labelledby="successModalTitle">
        <div class="success-modal">
            <button type="button" class="success-modal-close" aria-label="Tutup pesan" data-success-modal-close>×</button>
            <div class="success-modal-body">
                <div class="success-modal-kicker">Pendaftaran Tersimpan</div>
                <h3 id="successModalTitle">Pendaftaran berhasil</h3>
                <p>{{ session('success') }}</p>
                <div class="success-modal-actions">
                    <button type="button" class="btn btn-primary" data-success-modal-close>Baik</button>
                </div>
            </div>
        </div>
    </div>
@endif
<script>
    (function () {
        const modal = document.getElementById('successModal');
        if (!modal) return;

        function closeModal() {
            modal.classList.remove('is-open');
        }

        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('click', function (event) {
            const trigger = event.target.closest('[data-success-modal-close]');
            if (!trigger) return;
            event.preventDefault();
            closeModal();
        });
    })();
</script>
</body>
</html>
