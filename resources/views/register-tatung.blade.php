@php
    $benefits = [
        ['title' => 'Aman & Terkoordinasi', 'text' => 'Setiap peserta akan mendapat arahan dari panitia.'],
        ['title' => 'Data Peserta Resmi', 'text' => 'Pendaftaran membantu verifikasi dan pendataan.'],
        ['title' => 'Briefing Teknis', 'text' => 'Peserta mendapat informasi teknis sebelum acara.'],
        ['title' => 'Kontak Panitia', 'text' => 'Tim siap membantu pertanyaan seputar pendaftaran.'],
    ];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Peserta Tatung - Pawai Tatung Batam</title>
    <meta name="description" content="Halaman pendaftaran peserta Tatung untuk Pawai Tatung Batam.">
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

        button:hover {
            cursor: pointer;
        }

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

        .btn-warning {
            color: #6f4310;
            border-color: rgba(219, 171, 80, 0.3);
            background: linear-gradient(180deg, rgba(255, 244, 215, 0.98), rgba(243, 212, 148, 0.96));
            box-shadow: 0 12px 22px rgba(175, 124, 30, 0.12);
        }

        .hero {
            overflow: hidden;
            border: 1px solid rgba(193, 136, 46, 0.18);
            border-radius: 30px;
            background:
                linear-gradient(90deg, rgba(10, 8, 7, 0.78) 0%, rgba(10, 8, 7, 0.48) 34%, rgba(10, 8, 7, 0.05) 100%),
                url('{{ asset('images/registration-tatung.png') }}') center right / cover no-repeat;
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
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 0.8rem;
        }

        .info-card {
            padding: 1rem;
            border: 1px solid rgba(193, 136, 46, 0.16);
            border-radius: 18px;
            background: linear-gradient(180deg, rgba(255, 253, 248, 0.98), rgba(247, 236, 212, 0.85));
            text-align: center;
        }

        .info-card .icon {
            display: grid;
            place-items: center;
            width: 2.7rem;
            height: 2.7rem;
            margin: 0 auto 0.6rem;
            border-radius: 999px;
            background: rgba(255, 238, 204, 0.9);
            color: var(--gold);
            font-size: 1.2rem;
        }

        .info-card h3 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            color: #8f5516;
        }

        .info-card p {
            margin: 0.3rem 0 0;
            color: var(--muted);
            line-height: 1.55;
            font-size: 0.92rem;
        }

        .form-layout {
            display: block;
            margin-top: 1rem;
        }

        .panel {
            overflow: hidden;
            border: 1px solid rgba(193, 136, 46, 0.16);
            border-radius: 24px;
            background: rgba(255, 253, 248, 0.98);
            box-shadow: 0 12px 26px rgba(109, 70, 18, 0.08);
        }

        .panel-header {
            padding: 1rem 1rem 0;
        }

        .panel-title {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2rem, 3vw, 3rem);
            color: #8f5516;
            text-align: center;
        }

        .panel-copy {
            margin: 0.3rem auto 0;
            max-width: 42rem;
            text-align: center;
            color: var(--muted);
            line-height: 1.7;
        }

        .alert-success,
        .alert-error {
            padding: 0.9rem 1rem;
            border-radius: 16px;
            font-weight: 600;
            line-height: 1.6;
        }

        .alert-success {
            border: 1px solid rgba(36, 132, 56, 0.2);
            background: rgba(233, 248, 237, 0.95);
            color: #165a2c;
        }

        .alert-error {
            border: 1px solid rgba(167, 25, 23, 0.2);
            background: rgba(252, 235, 235, 0.95);
            color: #8f1d19;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 0.5rem;
            padding: 1rem 1rem 0.2rem;
        }

        .step {
            position: relative;
            display: grid;
            justify-items: center;
            gap: 0.35rem;
            text-align: center;
        }

        .step::before {
            content: '';
            position: absolute;
            top: 1.35rem;
            left: 50%;
            right: -50%;
            height: 2px;
            background: rgba(198, 138, 43, 0.18);
            transform: translateX(50%);
        }

        .step:last-child::before { display: none; }

        .step .dot {
            position: relative;
            z-index: 1;
            display: grid;
            place-items: center;
            width: 2.7rem;
            height: 2.7rem;
            border-radius: 999px;
            background: #fff;
            border: 1px solid rgba(193, 136, 46, 0.24);
            color: #8f5516;
            font-weight: 800;
        }

        .step.active .dot {
            background: linear-gradient(135deg, #c74732, #a71917);
            color: #fff;
            border-color: transparent;
            box-shadow: 0 10px 18px rgba(167, 25, 23, 0.22);
        }

        .step span:last-child {
            font-size: 0.82rem;
            color: var(--muted);
        }

        .form-card {
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .form-title {
            margin: 0 0 0.9rem;
            color: var(--red);
            font-size: 1rem;
            font-weight: 800;
        }

        .form-subtitle {
            margin: 0 0 0.9rem;
            color: var(--muted);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.9rem 0.9rem;
        }

        .field { display: grid; gap: 0.35rem; }
        .field.full { grid-column: 1 / -1; }

        label {
            font-size: 0.85rem;
            color: #6a4c31;
            font-weight: 700;
        }

        input, select, textarea {
            width: 100%;
            padding: 0.82rem 0.9rem;
            border: 1px solid rgba(193, 136, 46, 0.22);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.95);
            color: var(--text);
            font: inherit;
            outline: none;
        }

        textarea { min-height: 106px; resize: vertical; }

        input:focus, select:focus, textarea:focus {
            border-color: rgba(167, 25, 23, 0.4);
            box-shadow: 0 0 0 3px rgba(167, 25, 23, 0.08);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.7rem;
            margin-top: 1rem;
        }

        .section-divider {
            margin: 1rem 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(193, 136, 46, 0.25), transparent);
        }

        .type-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.8rem;
            margin: 1rem 0 0.8rem;
            flex-wrap: wrap;
        }

        .type-toolbar h4 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.7rem;
            color: #8f5516;
        }

        .type-table-wrap {
            overflow-x: auto;
            border: 1px solid rgba(193, 136, 46, 0.16);
            border-radius: 18px;
            background: linear-gradient(180deg, rgba(255, 253, 248, 0.98), rgba(247, 236, 212, 0.86));
        }

        .type-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 560px;
        }

        .type-table th,
        .type-table td {
            padding: 0.85rem 0.9rem;
            border-bottom: 1px solid rgba(193, 136, 46, 0.12);
            text-align: left;
            vertical-align: top;
        }

        .type-table th {
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #8f5516;
            background: rgba(255, 248, 236, 0.72);
        }

        .type-table td {
            color: var(--text);
            font-size: 0.92rem;
        }

        .type-table .muted {
            color: var(--muted);
        }

        .table-empty {
            padding: 1rem;
            color: var(--muted);
            text-align: center;
        }

        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 90;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background: rgba(32, 18, 8, 0.55);
            backdrop-filter: blur(8px);
        }

        .modal-backdrop.is-open {
            display: flex;
        }

        .modal-card {
            position: relative;
            width: min(760px, 100%);
            max-height: calc(100vh - 2rem);
            border: 1px solid rgba(193, 136, 46, 0.18);
            border-radius: 24px;
            background: rgba(255, 252, 246, 0.98);
            box-shadow: 0 24px 60px rgba(104, 66, 20, 0.24);
            overflow: auto;
        }

        .modal-close-fab {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            z-index: 2;
            display: inline-grid;
            place-items: center;
            width: 2.35rem;
            height: 2.35rem;
            border: 1px solid rgba(193, 136, 46, 0.28);
            border-radius: 999px;
            background: rgba(255, 250, 243, 0.98);
            color: #8f5516;
            font-size: 1.45rem;
            line-height: 1;
            cursor: pointer;
        }

        .modal-view {
            display: none;
        }

        .modal-view.is-active {
            display: block;
        }

        .modal-header {
            padding: 1rem 1rem 0.4rem;
            text-align: center;
        }

        .modal-header h3 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            color: #8f5516;
        }

        .modal-header p {
            margin: 0.35rem 0 0;
            color: var(--muted);
            line-height: 1.6;
        }

        .modal-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 0.8rem;
            padding: 1rem;
        }

        .modal-choice {
            border: 1px solid rgba(193, 136, 46, 0.18);
            border-radius: 18px;
            background: linear-gradient(180deg, rgba(255, 253, 248, 0.98), rgba(247, 236, 212, 0.88));
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: transform .18s ease, box-shadow .18s ease;
        }

        .modal-choice:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 22px rgba(104, 66, 20, 0.12);
        }

        .modal-choice strong {
            display: block;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            color: #8f5516;
            margin-top: 0.35rem;
        }

        .modal-choice p {
            margin: 0.35rem 0 0;
            color: var(--muted);
            line-height: 1.55;
            font-size: 0.92rem;
        }

        .modal-form {
            padding: 0 1rem 1rem;
        }

        .modal-form-title {
            margin: 0;
            text-align: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            color: #8f5516;
        }

        .modal-form-copy {
            margin: 0.35rem auto 0.9rem;
            max-width: 36rem;
            text-align: center;
            color: var(--muted);
            line-height: 1.6;
        }

        .modal-form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.85rem;
        }

        .modal-form-grid .field.full {
            grid-column: 1 / -1;
        }

        .modal-form-grid .field.file {
            grid-column: 1 / -1;
        }

        .modal-close-row {
            padding: 0 1rem 1rem;
            display: flex;
            justify-content: space-between;
            gap: 0.75rem;
        }

        .modal-close-btn {
            border: 0;
            background: transparent;
            color: #8f5516;
            font-weight: 800;
            cursor: pointer;
        }

        .modal-footer-actions {
            display: flex;
            gap: 0.7rem;
            flex-wrap: wrap;
        }

        .side-panel {
            padding: 1rem;
            display: grid;
            gap: 0.9rem;
        }

        .side-image {
            overflow: hidden;
            min-height: 250px;
            border-radius: 20px;
            box-shadow: 0 12px 24px rgba(104, 66, 20, 0.12);
        }

        .side-image img {
            height: 100%;
            object-fit: cover;
        }

        .help-card {
            padding: 1rem;
            border-radius: 20px;
            border: 1px solid rgba(193, 136, 46, 0.16);
            background: linear-gradient(180deg, rgba(255, 253, 248, 0.98), rgba(247, 236, 212, 0.8));
        }

        .help-card h3 {
            margin: 0 0 0.5rem;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            color: #8f5516;
        }

        .help-card p {
            margin: 0;
            color: var(--muted);
            line-height: 1.7;
        }

        .footer {
            margin: 1rem 0 1rem;
            padding: 1rem 0;
            text-align: center;
            color: #8a6b49;
            font-size: 0.9rem;
        }

        @media (max-width: 960px) {
            .info-grid,
            .form-layout {
                grid-template-columns: 1fr 1fr;
            }

            .hero {
                background:
                    linear-gradient(180deg, rgba(10, 8, 7, 0.76), rgba(10, 8, 7, 0.42)),
                    url('{{ asset('images/registration-tatung.png') }}') center right / cover no-repeat;
            }

            .hero-copy { width: min(100%, 560px); }
        }

        @media (max-width: 760px) {
            .container { width: min(100% - 1rem, 1240px); }
            .topbar { flex-direction: column; align-items: flex-start; }
            .hero {
                min-height: 360px;
                border-radius: 24px;
            }
            .hero-copy {
                padding: 1.4rem;
            }
            .hero-copy h2 { font-size: clamp(2.4rem, 11vw, 3.4rem); }
            .info-grid,
            .form-layout,
            .steps,
            .form-grid {
                grid-template-columns: 1fr;
            }
            .step::before { display: none; }
            .field.full { grid-column: auto; }
            .form-actions { flex-direction: column; }
            .btn { width: 100%; }
            .modal-backdrop {
                padding: 0.4rem;
                align-items: flex-start;
            }
            .modal-card {
                width: 100%;
                border-radius: 20px;
            }
            .modal-grid,
            .modal-form-grid {
                grid-template-columns: 1fr;
            }
            .modal-close-row,
            .modal-footer-actions {
                flex-direction: column;
            }
            .modal-footer-actions .btn,
            .modal-close-btn {
                width: 100%;
            }
            .type-table {
                min-width: 0;
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

            <section class="hero">
                <div class="hero-copy">
                    <span class="hero-kicker">Pendaftaran Peserta</span>
                    <h2>Peserta Tatung</h2>
                    <p>Bergabunglah dalam prosesi sakral Pawai Tatung Jilid 3 Batam, Kepulauan Riau.</p>
                    <div class="hero-badge">Pendaftaran Dibuka - Batas akhir: 15 Juni 2026</div>
                </div>
            </section>

            <section class="section">
                <div class="info-grid">
                    @foreach ($benefits as $benefit)
                        <article class="info-card">
                            <div class="icon">●</div>
                            <h3>{{ $benefit['title'] }}</h3>
                            <p>{{ $benefit['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </section>

            <section class="section">
                <div class="panel">
                    <div class="panel-header">
                        <h2 class="panel-title">Formulir Pendaftaran Peserta Tatung</h2>
                        <p class="panel-copy">Lengkapi data penanggung jawab dan data jenis pawai. Semua data akan kami rahasiakan.</p>
                        <hr>
                    </div>

                    @if (session('success'))
                        <div class="alert-success" style="margin: 0 1rem 1rem;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert-error" style="margin: 0 1rem 1rem;">
                            <strong>Periksa kembali isian Anda:</strong>
                            <ul style="margin: 0.5rem 0 0; padding-left: 1.2rem;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-layout">
                        <div class="form-card">
                            <div class="form-title">Informasi Penanggung Jawab</div>
                            <p class="form-subtitle">Data ini dipakai untuk menghubungi pihak cetya, vihara, atau kelenteng.</p>
                            <form id="tatungRegistrationForm" action="{{ route('pendaftaran.tatung.submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-grid">
                                    <div class="field">
                                        <label for="nama_cetya_vihara_kelenteng">Nama Cetya/Vihara/Kelenteng *</label>
                                        <input type="text" id="nama_cetya_vihara_kelenteng" name="nama_cetya_vihara_kelenteng" value="{{ old('nama_cetya_vihara_kelenteng') }}" placeholder="Masukkan nama cetya / vihara / kelenteng" required>
                                    </div>
                                    <div class="field">
                                        <label for="penanggung_jawab">Penanggung Jawab *</label>
                                        <input type="text" id="penanggung_jawab" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}" placeholder="Masukkan nama penanggung jawab" required>
                                    </div>
                                    <div class="field">
                                        <label for="no_kontak_penanggung_jawab">No Kontak Penanggung Jawab *</label>
                                        <input type="text" id="no_kontak_penanggung_jawab" name="no_kontak_penanggung_jawab" value="{{ old('no_kontak_penanggung_jawab') }}" placeholder="Contoh: 08xxxxxxxxxx" required>
                                    </div>
                                </div>

                                <div class="section-divider"></div>

                                <div class="type-toolbar">
                                    <h4>Jenis Pawai</h4>
                                    <button type="button" class="btn btn-warning" id="openTypeModal">Tambah Jenis Pawai</button>
                                </div>

                                <div class="type-table-wrap">
                                    <table class="type-table">
                                        <thead>
                                            <tr>
                                                <th>Jenis</th>
                                                <th>Data</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="typeTableBody">
                                            <tr id="typeEmptyRow">
                                                <td colspan="4" class="table-empty">Belum ada jenis pawai. Klik <strong>Tambah Jenis Pawai</strong> untuk menambah data.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div id="jenisPawaiEntries" style="display: none;"></div>

                                <div class="form-actions">
                                    <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Kirim Pendaftaran</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <div class="footer">&copy; 2026 Pawai Tatung Batam Jilid 3. All rights reserved.</div>
        </div>
    </div>

    <div class="modal-backdrop" id="typeModal" aria-hidden="true">
        <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="typeModalTitle">
            <div class="modal-view is-active" id="typeChooserView">
                <div class="modal-header">
                    <h3 id="typeModalTitle">Pilih Jenis Pawai</h3>
                    <p>Silakan pilih jenis pawai yang ingin ditambahkan.</p>
                </div>
                <div class="modal-grid">
                    <button type="button" class="modal-choice" data-type-choice="Tatung">
                        <span class="brand-mark" style="margin:0 auto;">PT</span>
                        <strong>Tatung</strong>
                        <p>Untuk peserta Tatung.</p>
                    </button>
                    <button type="button" class="modal-choice" data-type-choice="Tandu">
                        <span class="brand-mark" style="margin:0 auto;">TD</span>
                        <strong>Tandu</strong>
                        <p>Untuk peserta tandu.</p>
                    </button>
                    <button type="button" class="modal-choice" data-type-choice="Budaya">
                        <span class="brand-mark" style="margin:0 auto;">BD</span>
                        <strong>Budaya</strong>
                        <p>Untuk peserta budaya.</p>
                    </button>
                </div>
                <button type="button" class="modal-close-fab" id="closeTypeModal" aria-label="Tutup modal">×</button>
            </div>

            <div class="modal-view" id="typeFormView">
                <button type="button" class="modal-close-fab" id="closeTypeFormModal" aria-label="Tutup modal">×</button>
                <div class="modal-form">
                    <h3 class="modal-form-title" id="typeFormTitle">Isi Data Jenis Pawai</h3>
                    <p class="modal-form-copy" id="typeFormCopy"></p>
                    <form id="typeForm">
                        <div class="modal-form-grid" id="typeFormFields"></div>
                        <div class="modal-close-row" style="padding: 0; margin-top: 1rem;">
                            <div class="modal-footer-actions">
                                <button type="button" class="btn btn-secondary" id="cancelTypeForm">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Jenis Pawai</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <template id="tatungFieldTemplate">
        <div class="field">
            <label>Nama Dewa *</label>
            <input type="text" placeholder="Masukkan nama dewa" required>
        </div>
        <div class="field">
            <label>Nama Tatung *</label>
            <input type="text" placeholder="Masukkan nama tatung" required>
        </div>
        <div class="field file">
            <label>Foto *</label>
            <input type="file" accept="image/*" required>
            <div class="file-hint">Unggah foto peserta Tatung.</div>
        </div>
    </template>

    <template id="simpleFieldTemplate">
        <div class="field full">
            <label>Nama *</label>
            <input type="text" placeholder="Masukkan nama" required>
        </div>
        <div class="field file">
            <label>Foto *</label>
            <input type="file" accept="image/*" required>
            <div class="file-hint">Unggah foto untuk jenis pawai ini.</div>
        </div>
    </template>

    <script>
        (function () {
            const modal = document.getElementById('typeModal');
            const openBtn = document.getElementById('openTypeModal');
            const closeBtn = document.getElementById('closeTypeModal');
            const closeFormBtn = document.getElementById('closeTypeFormModal');
            const cancelTypeForm = document.getElementById('cancelTypeForm');
            const chooserView = document.getElementById('typeChooserView');
            const formView = document.getElementById('typeFormView');
            const formTitle = document.getElementById('typeFormTitle');
            const formCopy = document.getElementById('typeFormCopy');
            const formFields = document.getElementById('typeFormFields');
            const form = document.getElementById('typeForm');
            const typeTableBody = document.getElementById('typeTableBody');
            const emptyRow = document.getElementById('typeEmptyRow');
            const jenisPawaiEntries = document.getElementById('jenisPawaiEntries');
            const mainForm = document.getElementById('tatungRegistrationForm');
            const tatungFieldTemplate = document.getElementById('tatungFieldTemplate');
            const simpleFieldTemplate = document.getElementById('simpleFieldTemplate');
            let currentType = null;
            let currentFields = [];
            let typeEntries = [];
            let entrySequence = 0;

            function openModal() {
                if (!modal) return;
                modal.classList.add('is-open');
                modal.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
                showChooser();
            }

            function closeModal() {
                if (!modal) return;
                modal.classList.remove('is-open');
                modal.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
                currentType = null;
                currentFields = [];
                if (formFields) formFields.innerHTML = '';
                showChooser();
            }

            function showChooser() {
                if (chooserView) chooserView.classList.add('is-active');
                if (formView) formView.classList.remove('is-active');
            }

            function showForm(type) {
                currentType = type;
                if (chooserView) chooserView.classList.remove('is-active');
                if (formView) formView.classList.add('is-active');

                if (formTitle) formTitle.textContent = `Isi Data ${type}`;
                if (formCopy) {
                    formCopy.textContent = type === 'Tatung'
                        ? 'Lengkapi Nama Dewa, Nama Tatung, dan unggah foto peserta.'
                        : 'Lengkapi Nama dan unggah foto peserta.';
                }

                if (formFields) {
                    formFields.innerHTML = '';
                    const template = type === 'Tatung' ? tatungFieldTemplate : simpleFieldTemplate;
                    const nodes = Array.from(template.content.cloneNode(true).children);
                    nodes.forEach(function (node, index) {
                        if (type === 'Tatung') {
                            if (index === 0) node.querySelector('input').setAttribute('name', 'nama_dewa');
                            if (index === 1) node.querySelector('input').setAttribute('name', 'nama_tatung');
                            if (index === 2) node.querySelector('input').setAttribute('name', 'foto');
                        } else {
                            if (index === 0) node.querySelector('input').setAttribute('name', 'nama');
                            if (index === 1) node.querySelector('input').setAttribute('name', 'foto');
                        }
                        formFields.appendChild(node);
                    });
                }
                currentFields = Array.from(formFields ? formFields.querySelectorAll('input, select, textarea') : []);
            }

            function getFieldValue(name) {
                const field = currentFields.find(function (el) {
                    return el.getAttribute('name') === name;
                });
                if (!field) return '';
                if (field.type === 'file') {
                    return field.files && field.files[0] ? field.files[0].name : '-';
                }
                return field.value.trim();
            }

            function getFileInput() {
                return currentFields.find(function (el) {
                    return el.getAttribute('name') === 'foto';
                }) || null;
            }

            function createRow(entry) {
                const row = document.createElement('tr');
                row.dataset.entryId = entry.entryId;
                const dataText = entry.type === 'Tatung'
                    ? [
                        `Nama Dewa: ${entry.data.nama_dewa || '-'}`,
                        `Nama Tatung: ${entry.data.nama_tatung || '-'}`
                    ].join('<br>')
                    : `Nama: ${entry.data.nama || '-'}`;

                row.innerHTML = `
                    <td><strong>${entry.type}</strong></td>
                    <td>${dataText}</td>
                    <td>${entry.foto || '-'}</td>
                    <td><button type="button" class="btn btn-secondary" data-remove-row="true">Hapus</button></td>
                `;

                row.querySelector('[data-remove-row="true"]').addEventListener('click', function () {
                    removeEntry(entry.entryId);
                });

                return row;
            }

            function removeEntry(entryId) {
                typeEntries = typeEntries.filter(function (item) {
                    return item.entryId !== entryId;
                });

                const block = jenisPawaiEntries ? jenisPawaiEntries.querySelector('[data-entry-id="' + entryId + '"]') : null;
                if (block) {
                    block.remove();
                }

                const row = typeTableBody ? typeTableBody.querySelector('tr[data-entry-id="' + entryId + '"]') : null;
                if (row) {
                    row.remove();
                }

                if (typeTableBody && !typeTableBody.children.length) {
                    typeTableBody.innerHTML = '<tr id="typeEmptyRow"><td colspan="4" class="table-empty">Belum ada jenis pawai. Klik <strong>Tambah Jenis Pawai</strong> untuk menambah data.</td></tr>';
                }
            }

            function appendHiddenEntry(entry) {
                if (!mainForm || !jenisPawaiEntries) return;

                const block = document.createElement('div');
                block.dataset.entryId = entry.entryId;

                const inputs = [
                    { name: 'jenis_pawai[' + entry.entryId + '][type]', value: entry.type },
                ];

                if (entry.type === 'Tatung') {
                    inputs.push(
                        { name: 'jenis_pawai[' + entry.entryId + '][nama_dewa]', value: entry.data.nama_dewa || '' },
                        { name: 'jenis_pawai[' + entry.entryId + '][nama_tatung]', value: entry.data.nama_tatung || '' }
                    );
                } else {
                    inputs.push(
                        { name: 'jenis_pawai[' + entry.entryId + '][nama]', value: entry.data.nama || '' }
                    );
                }

                inputs.forEach(function (item) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = item.name;
                    input.value = item.value;
                    block.appendChild(input);
                });

                if (entry.fileInput) {
                    entry.fileInput.name = 'jenis_pawai[' + entry.entryId + '][foto]';
                    block.appendChild(entry.fileInput);
                }

                jenisPawaiEntries.appendChild(block);
            }

            async function appendRow(type) {
                if (!typeTableBody) return;

                if (emptyRow && emptyRow.parentNode) {
                    emptyRow.remove();
                }

                const fileInput = getFileInput();
                const file = fileInput && fileInput.files && fileInput.files[0] ? fileInput.files[0] : null;
                if (!file) {
                    window.alert('Unggah foto peserta Tatung terlebih dahulu.');
                    return;
                }

                const maxBytes = 5 * 1024 * 1024;
                if (file.size > maxBytes) {
                    window.alert('Ukuran foto maksimal 5 MB.');
                    return;
                }

                const entryId = 'entry_' + Date.now() + '_' + (entrySequence++);
                const entry = {
                    entryId: entryId,
                    type: type,
                    data: type === 'Tatung'
                        ? {
                            nama_dewa: getFieldValue('nama_dewa') || '',
                            nama_tatung: getFieldValue('nama_tatung') || '',
                        }
                        : {
                            nama: getFieldValue('nama') || '',
                        },
                    foto: getFieldValue('foto') || '',
                    fileInput: fileInput,
                };

                typeEntries.push(entry);
                appendHiddenEntry(entry);
                typeTableBody.appendChild(createRow(entry));
            }

            if (openBtn) openBtn.addEventListener('click', openModal);
            if (closeBtn) closeBtn.addEventListener('click', closeModal);
            if (closeFormBtn) closeFormBtn.addEventListener('click', closeModal);
            if (cancelTypeForm) cancelTypeForm.addEventListener('click', closeModal);

            if (modal) {
                modal.addEventListener('click', function (event) {
                    if (event.target === modal) closeModal();
                });
            }

            document.addEventListener('click', function (event) {
                const choice = event.target.closest('[data-type-choice]');
                if (!choice) return;
                showForm(choice.dataset.typeChoice);
            });

            if (form) {
                form.addEventListener('submit', async function (event) {
                    event.preventDefault();
                    if (!currentType) return;
                    await appendRow(currentType);
                    closeModal();
                });
            }
        })();
    </script>
</body>
</html>
