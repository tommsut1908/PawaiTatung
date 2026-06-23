<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Panitia - Pawai Tatung Batam</title>
    <meta name="description" content="Dashboard manajemen pendaftaran Pawai Tatung Batam.">
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
                radial-gradient(circle at 90% 10%, rgba(255, 255, 255, 0.9), transparent 22%),
                linear-gradient(180deg, #fffdf8 0%, var(--bg) 100%);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        body.modal-open {
            overflow: hidden;
        }

        a { color: inherit; text-decoration: none; }
        img { display: block; width: 100%; }

        .page-shell {
            width: 100%;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .container {
            width: min(1280px, calc(100% - 2rem));
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.25rem 0;
            border-bottom: 1px solid rgba(195, 140, 58, 0.12);
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

        .user-nav {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .user-info {
            font-size: 0.9rem;
            color: var(--muted);
        }

        .user-info strong {
            color: var(--text);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            min-height: 2.5rem;
            padding: 0.55rem 1.05rem;
            border: 1px solid transparent;
            border-radius: 12px;
            font-weight: 700;
            line-height: 1;
            transition: transform .18s ease, box-shadow .18s ease, background-color 0.2s;
            cursor: pointer;
            font-size: 0.88rem;
            font-family: inherit;
        }

        .btn:hover { transform: translateY(-1px); }
        
        .btn-primary {
            color: #fff;
            background: linear-gradient(135deg, #c74732, #a71917);
            box-shadow: 0 8px 16px rgba(167, 25, 23, 0.15);
        }
        
        .btn-secondary {
            color: #8a5616;
            border-color: rgba(201, 146, 53, 0.25);
            background: linear-gradient(180deg, rgba(255, 250, 242, 0.96), rgba(247, 236, 211, 0.94));
        }

        .btn-danger {
            color: #fff;
            background: linear-gradient(135deg, #e04b4b, #b92222);
            box-shadow: 0 8px 16px rgba(185, 34, 34, 0.15);
        }

        .btn-sm {
            min-height: 2.1rem;
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            font-size: 0.82rem;
        }

        .main-content {
            flex: 1;
            padding: 2.5rem 0 4rem;
        }

        .dashboard-header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .dashboard-title h2 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.6rem;
            color: #8f5516;
            line-height: 1.1;
        }

        .dashboard-title p {
            margin: 0.35rem 0 0;
            color: var(--muted);
            font-size: 0.98rem;
        }

        .search-bar {
            width: 100%;
            max-width: 420px;
        }

        .search-form {
            display: flex;
            gap: 0.5rem;
        }

        .search-input-wrapper {
            position: relative;
            flex: 1;
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(193, 136, 46, 0.22);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.95);
            color: var(--text);
            font: inherit;
            outline: none;
        }

        .search-input:focus {
            border-color: rgba(167, 25, 23, 0.4);
            box-shadow: 0 0 0 3px rgba(167, 25, 23, 0.08);
        }

        .tab-nav {
            display: flex;
            border-bottom: 1px solid rgba(195, 140, 58, 0.18);
            gap: 1.5rem;
            margin-bottom: 1.8rem;
        }

        .tab-btn {
            background: none;
            border: none;
            padding: 0.85rem 0.5rem;
            font-size: 1rem;
            font-weight: 700;
            color: var(--muted);
            cursor: pointer;
            position: relative;
            font-family: inherit;
            transition: color 0.2s;
        }

        .tab-btn:hover {
            color: var(--text);
        }

        .tab-btn.active {
            color: #8f5516;
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), var(--gold-deep));
            border-radius: 99px;
        }

        .card-panel {
            border: 1px solid rgba(193, 136, 46, 0.16);
            border-radius: 22px;
            background: var(--paper);
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .data-table th,
        .data-table td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid rgba(193, 136, 46, 0.1);
        }

        .data-table th {
            background: rgba(255, 248, 236, 0.72);
            color: #8f5516;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 700;
        }

        .data-table tbody tr:hover {
            background: rgba(255, 252, 246, 0.5);
        }

        .data-table td {
            font-size: 0.92rem;
            color: var(--text);
            vertical-align: middle;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.35rem 0.7rem;
            border-radius: 99px;
            font-size: 0.78rem;
            font-weight: 700;
            line-height: 1;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .badge-pending {
            color: #8a5e1a;
            background: rgba(255, 247, 232, 0.9);
            border: 1px solid rgba(199, 138, 43, 0.2);
        }

        .badge-approved {
            color: #165a2c;
            background: rgba(233, 248, 237, 0.9);
            border: 1px solid rgba(36, 132, 56, 0.2);
        }

        .badge-rejected {
            color: #8f1d19;
            background: rgba(252, 235, 235, 0.9);
            border: 1px solid rgba(167, 25, 23, 0.2);
        }

        .status-select {
            font-family: inherit;
            font-size: 0.82rem;
            font-weight: 700;
            padding: 0.4rem 1.6rem 0.4rem 0.7rem;
            border-radius: 10px;
            border: 1px solid transparent;
            cursor: pointer;
            outline: none;
            background-repeat: no-repeat;
            background-position: right 0.5rem center;
            background-size: 0.65rem auto;
            appearance: none;
            -webkit-appearance: none;
            transition: all 0.2s;
            width: 120px;
        }

        /* Customize select icons using SVG backgrounds for premium look */
        .status-select.status-pending {
            color: #8a5e1a;
            background-color: rgba(255, 247, 232, 0.9);
            border-color: rgba(199, 138, 43, 0.2);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%238a5e1a'%3E%3Cpath fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'/%3E%3C/svg%3E");
        }

        .status-select.status-approved {
            color: #165a2c;
            background-color: rgba(233, 248, 237, 0.9);
            border-color: rgba(36, 132, 56, 0.2);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%23165a2c'%3E%3Cpath fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'/%3E%3C/svg%3E");
        }

        .status-select.status-rejected {
            color: #8f1d19;
            background-color: rgba(252, 235, 235, 0.9);
            border-color: rgba(167, 25, 23, 0.2);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%238f1d19'%3E%3Cpath fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'/%3E%3C/svg%3E");
        }

        .status-select:focus {
            box-shadow: 0 0 0 3px rgba(199, 138, 43, 0.15);
        }

        .table-empty {
            padding: 3rem 2rem;
            text-align: center;
            color: var(--muted);
        }

        .table-empty p {
            margin: 0.5rem 0 0;
            font-size: 0.95rem;
        }

        .alert-success {
            padding: 0.9rem 1rem;
            border-radius: 16px;
            border: 1px solid rgba(36, 132, 56, 0.2);
            background: rgba(233, 248, 237, 0.95);
            color: #165a2c;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        /* Modal Details styling */
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
            width: min(800px, 100%);
            max-height: calc(100vh - 2rem);
            border: 1px solid rgba(193, 136, 46, 0.18);
            border-radius: 24px;
            background: rgba(255, 252, 246, 0.98);
            box-shadow: 0 24px 60px rgba(104, 66, 20, 0.24);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .modal-header {
            padding: 1.5rem 1.5rem 1rem;
            border-bottom: 1px solid rgba(195, 140, 58, 0.12);
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1.5rem;
        }

        .modal-header h3 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            color: #8f5516;
        }

        .modal-header p {
            margin: 0.2rem 0 0;
            font-size: 0.88rem;
            color: var(--muted);
        }

        .modal-close-btn {
            background: none;
            border: 1px solid rgba(193, 136, 46, 0.28);
            width: 2rem;
            height: 2rem;
            border-radius: 999px;
            display: grid;
            place-items: center;
            cursor: pointer;
            color: #8f5516;
            font-size: 1.2rem;
            transition: background-color 0.2s;
        }

        .modal-close-btn:hover {
            background-color: rgba(193, 136, 46, 0.08);
        }

        .modal-body {
            padding: 1.5rem;
            overflow-y: auto;
            flex: 1;
        }

        .detail-meta-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
            background: rgba(255, 248, 236, 0.4);
            padding: 1rem;
            border-radius: 14px;
            border: 1px solid rgba(193, 136, 46, 0.1);
        }

        .detail-meta-item strong {
            display: block;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #8f5516;
            margin-bottom: 0.2rem;
        }

        .detail-meta-item span {
            font-size: 0.95rem;
            color: var(--text);
        }

        .entries-list {
            display: grid;
            gap: 1.25rem;
        }

        .entry-card {
            border: 1px solid rgba(193, 136, 46, 0.15);
            border-radius: 16px;
            background: #fff;
            padding: 1rem;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .entry-badge {
            align-self: flex-start;
            padding: 0.25rem 0.55rem;
            border-radius: 8px;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            background: rgba(193, 136, 46, 0.1);
            color: #8f5516;
            border: 1px solid rgba(193, 136, 46, 0.15);
        }

        .entry-content {
            flex: 1;
        }

        .entry-title {
            margin: 0 0 0.5rem;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.4rem;
            color: #8f5516;
            font-weight: 700;
        }

        .entry-details-grid {
            display: grid;
            gap: 0.25rem;
            margin-bottom: 0.5rem;
        }

        .entry-detail-row {
            font-size: 0.88rem;
            color: var(--text);
        }

        .entry-detail-row strong {
            color: var(--muted);
        }

        .entry-foto {
            width: 140px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid rgba(193, 136, 46, 0.15);
            cursor: zoom-in;
            transition: transform 0.2s;
        }

        .entry-foto:hover {
            transform: scale(1.02);
        }

        .modal-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(195, 140, 58, 0.12);
            display: flex;
            justify-content: flex-end;
        }

        /* Lightbox Image Preview overlay */
        .lightbox-backdrop {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.85);
            padding: 1rem;
        }

        .lightbox-backdrop.is-open {
            display: flex;
        }

        .lightbox-content {
            max-width: 90vw;
            max-height: 90vh;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            position: relative;
        }

        .lightbox-img {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
            display: block;
        }

        .lightbox-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            color: #fff;
            font-size: 2rem;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.4);
            border: none;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 99px;
            display: grid;
            place-items: center;
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
            .user-nav {
                width: 100%;
                justify-content: space-between;
            }
            .dashboard-header {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
            }
            .search-bar {
                max-width: 100%;
            }
            .tab-nav {
                gap: 0.8rem;
            }
            .tab-btn {
                font-size: 0.9rem;
                padding: 0.75rem 0.35rem;
            }
            .detail-meta-grid {
                grid-template-columns: 1fr;
            }
            .entry-card {
                flex-direction: column;
                gap: 0.75rem;
            }
            .entry-foto {
                width: 100%;
                height: 180px;
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
                <div class="user-nav">
                    <div class="user-info">
                        Masuk sebagai: <strong>{{ Auth::user()->name }}</strong>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Keluar</button>
                    </form>
                </div>
            </header>
        </div>

        <main class="main-content">
            <div class="container">
                @if (session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="dashboard-header">
                    <div class="dashboard-title">
                        <h2>Dashboard Pendaftaran</h2>
                        <p>Manajemen data registrasi peserta Pawai Tatung dan Panitia.</p>
                    </div>

                    <div class="search-bar">
                        <form action="{{ route('dashboard') }}" method="GET" class="search-form">
                            <input type="hidden" name="tab" value="{{ $tab }}">
                            <div class="search-input-wrapper">
                                <input type="text" name="search" value="{{ $search }}" class="search-input" placeholder="Cari berdasarkan nama/kontak...">
                            </div>
                            <button type="submit" class="btn btn-primary">Cari</button>
                            @if ($search)
                                <a href="{{ route('dashboard', ['tab' => $tab]) }}" class="btn btn-secondary">Reset</a>
                            @endif
                        </form>
                    </div>
                </div>

                <!-- Tab Navigation -->
                <div class="tab-nav">
                    <a href="{{ route('dashboard', ['tab' => 'tatung', 'search' => $search]) }}" class="tab-btn {{ $tab === 'tatung' ? 'active' : '' }}">
                        Peserta Tatung ({{ $tatungs->count() }})
                    </a>
                    <a href="{{ route('dashboard', ['tab' => 'panitia', 'search' => $search]) }}" class="tab-btn {{ $tab === 'panitia' ? 'active' : '' }}">
                        Panitia ({{ $panitias->count() }})
                    </a>
                </div>

                <div class="card-panel">
                    @if ($tab === 'tatung')
                        <!-- TATUNG TAB -->
                        @if ($tatungs->isEmpty())
                            <div class="table-empty">
                                <h3>Tidak Ada Pendaftaran Tatung</h3>
                                <p>Belum ada data pendaftaran Tatung yang cocok dengan kriteria pencarian.</p>
                            </div>
                        @else
                            <div class="table-wrapper">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Cetya/Vihara/Kelenteng</th>
                                            <th>Penanggung Jawab</th>
                                            <th>Kontak</th>
                                            <th>Jumlah Pawai</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tatungs as $tatung)
                                            <tr>
                                                <td style="font-weight: 700;">{{ $tatung->nama_cetya_vihara_kelenteng }}</td>
                                                <td>{{ $tatung->penanggung_jawab }}</td>
                                                <td>{{ $tatung->no_kontak_penanggung_jawab }}</td>
                                                <td>
                                                    <span class="badge badge-pending" style="font-size:0.75rem;">
                                                        {{ count($tatung->jenis_pawai_json ?? []) }} Pilihan
                                                    </span>
                                                </td>
                                                <td class="muted">{{ $tatung->created_at->format('d M Y H:i') }}</td>
                                                <td>
                                                    <form action="{{ route('dashboard.status') }}" method="POST" style="margin:0;">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $tatung->id }}">
                                                        <input type="hidden" name="type" value="tatung">
                                                        <select name="status" onchange="this.form.submit()" class="status-select status-{{ $tatung->status }}">
                                                            <option value="pending" {{ $tatung->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="approved" {{ $tatung->status === 'approved' ? 'selected' : '' }}>Disetujui</option>
                                                            <option value="rejected" {{ $tatung->status === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary btn-sm" onclick="showTatungDetail({{ json_encode($tatung) }})">
                                                        Lihat Detail
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @else
                        <!-- PANITIA TAB -->
                        @if ($panitias->isEmpty())
                            <div class="table-empty">
                                <h3>Tidak Ada Pendaftaran Panitia</h3>
                                <p>Belum ada data pendaftaran Panitia yang cocok dengan kriteria pencarian.</p>
                            </div>
                        @else
                            <div class="table-wrapper">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Kontak</th>
                                            <th>Tanggal Pendaftaran</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($panitias as $panitia)
                                            <tr>
                                                <td style="font-weight: 700;">{{ $panitia->nama }}</td>
                                                <td>{{ $panitia->no_kontak }}</td>
                                                <td class="muted">{{ $panitia->created_at->format('d M Y H:i') }}</td>
                                                <td>
                                                    <form action="{{ route('dashboard.status') }}" method="POST" style="margin:0;">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $panitia->id }}">
                                                        <input type="hidden" name="type" value="panitia">
                                                        <select name="status" onchange="this.form.submit()" class="status-select status-{{ $panitia->status }}">
                                                            <option value="pending" {{ $panitia->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="approved" {{ $panitia->status === 'approved' ? 'selected' : '' }}>Disetujui</option>
                                                            <option value="rejected" {{ $panitia->status === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                                        </select>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="container">
                &copy; {{ date('Y') }} Pawai Tatung Batam - Kepri. Hak Cipta Dilindungi.
            </div>
        </footer>
    </div>

    <!-- DETAIL MODAL FOR TATUNG -->
    <div id="tatungDetailModal" class="modal-backdrop">
        <div class="modal-card">
            <div class="modal-header">
                <div>
                    <h3 id="modalVihara">Nama Vihara/Cetya/Kelenteng</h3>
                    <p id="modalDate">Terdaftar pada: -</p>
                </div>
                <button type="button" class="modal-close-btn" onclick="closeTatungModal()">&times;</button>
            </div>
            
            <div class="modal-body">
                <h4 style="margin: 0 0 0.85rem; font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; color: #8f5516; border-bottom: 1px solid rgba(195,140,58,0.1); padding-bottom: 0.5rem;">
                    Informasi Penanggung Jawab
                </h4>
                <div class="detail-meta-grid">
                    <div class="detail-meta-item">
                        <strong>Nama Penanggung Jawab</strong>
                        <span id="modalPenanggungJawab">-</span>
                    </div>
                    <div class="detail-meta-item">
                        <strong>No. Kontak Penanggung Jawab</strong>
                        <span id="modalKontak">-</span>
                    </div>
                </div>

                <h4 style="margin: 1.5rem 0 0.85rem; font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; color: #8f5516; border-bottom: 1px solid rgba(195,140,58,0.1); padding-bottom: 0.5rem;">
                    Daftar Jenis Pawai / Entry
                </h4>
                <div id="modalEntries" class="entries-list">
                    <!-- Entries will be dynamically populated here -->
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeTatungModal()">Tutup</button>
            </div>
        </div>
    </div>

    <!-- EDIT ENTRY MODAL -->
    <div id="entryEditModal" class="modal-backdrop" style="z-index: 110;">
        <div class="modal-card" style="width: min(500px, 100%);">
            <div class="modal-header">
                <div>
                    <h3 style="margin: 0; font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; color: #8f5516;">Edit Data Peserta</h3>
                    <p style="margin: 0.2rem 0 0; font-size: 0.88rem; color: var(--muted);">Perbarui informasi peserta pawai.</p>
                </div>
                <button type="button" class="modal-close-btn" onclick="closeEntryEditModal()">&times;</button>
            </div>
            
            <form action="{{ route('peserta.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="editId">
                <input type="hidden" name="index" id="editIndex">
                
                <div class="modal-body" style="display: flex; flex-direction: column; gap: 1rem; padding: 1.5rem;">
                    <div>
                        <label style="display: block; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: #8f5516; margin-bottom: 0.3rem;">Nama Cetya/Vihara/Kelenteng</label>
                        <input type="text" name="vihara" id="editVihara" class="search-input" style="width: 100%;" required>
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: #8f5516; margin-bottom: 0.3rem;">Nama Penanggung Jawab</label>
                        <input type="text" name="penanggung_jawab" id="editPenanggungJawab" class="search-input" style="width: 100%;" required>
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: #8f5516; margin-bottom: 0.3rem;">No. Kontak Penanggung Jawab</label>
                        <input type="text" name="no_kontak" id="editKontak" class="search-input" style="width: 100%;" required>
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: #8f5516; margin-bottom: 0.3rem;">Jenis Pawai</label>
                        <select name="type" id="editType" class="search-input" style="width: 100%; height: 2.6rem; padding: 0.5rem 1rem; border: 1px solid rgba(193, 136, 46, 0.22); border-radius: 12px; font: inherit;" onchange="toggleEditDeityField(this.value)" required>
                            <option value="Tatung">Tatung</option>
                            <option value="Tandu">Tandu</option>
                            <option value="Budaya">Budaya</option>
                        </select>
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: #8f5516; margin-bottom: 0.3rem;">Nama Peserta</label>
                        <input type="text" name="name" id="editName" class="search-input" style="width: 100%;" required>
                    </div>

                    <div id="editDeityField">
                        <label style="display: block; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: #8f5516; margin-bottom: 0.3rem;">Nama Dewa (Khusus Tatung)</label>
                        <input type="text" name="deity_name" id="editDeityName" class="search-input" style="width: 100%;">
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: #8f5516; margin-bottom: 0.3rem;">Foto Baru (Opsional)</label>
                        <input type="file" name="foto" accept="image/*" class="search-input" style="width: 100%; padding: 0.4rem;">
                    </div>
                </div>

                <div class="modal-footer" style="padding: 1rem 1.5rem; border-top: 1px solid rgba(195,140,58,0.12); display: flex; justify-content: flex-end; gap: 0.5rem;">
                    <button type="button" class="btn btn-secondary" onclick="closeEntryEditModal()">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- LIGHTBOX IMAGE PREVIEW -->
    <div id="lightbox" class="lightbox-backdrop" onclick="closeLightbox()">
        <button type="button" class="lightbox-close" onclick="closeLightbox()">&times;</button>
        <div class="lightbox-content" onclick="event.stopPropagation()">
            <img id="lightboxImg" class="lightbox-img" src="" alt="Foto Entry">
        </div>
    </div>

    <script>
        function showTatungDetail(tatung) {
            document.getElementById('modalVihara').textContent = tatung.nama_cetya_vihara_kelenteng;
            
            // Format created_at date
            const dateStr = new Date(tatung.created_at).toLocaleString('id-ID', {
                day: 'numeric',
                month: 'short',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
            document.getElementById('modalDate').textContent = 'Terdaftar pada: ' + dateStr;
            document.getElementById('modalPenanggungJawab').textContent = tatung.penanggung_jawab;
            document.getElementById('modalKontak').textContent = tatung.no_kontak_penanggung_jawab;

            const entriesContainer = document.getElementById('modalEntries');
            entriesContainer.innerHTML = '';

            const entries = tatung.jenis_pawai_json || [];

            if (entries.length === 0) {
                entriesContainer.innerHTML = '<p class="muted" style="text-align:center;">Tidak ada data entri pawai.</p>';
            } else {
                entries.forEach((entry, index) => {
                    const card = document.createElement('div');
                    card.className = 'entry-card';

                    const badge = document.createElement('span');
                    badge.className = 'entry-badge';
                    badge.textContent = entry.type;

                    const content = document.createElement('div');
                    content.className = 'entry-content';

                    const title = document.createElement('h5');
                    title.className = 'entry-title';
                    
                    const detailsGrid = document.createElement('div');
                    detailsGrid.className = 'entry-details-grid';

                    if (entry.type === 'Tatung') {
                        title.textContent = 'Tatung: ' + (entry.data.nama_tatung || '-');
                        detailsGrid.innerHTML = `
                            <div class="entry-detail-row"><strong>Nama Dewa:</strong> ${entry.data.nama_dewa || '-'}</div>
                        `;
                    } else if (entry.type === 'Tandu') {
                        title.textContent = 'Tandu: ' + (entry.data.nama || '-');
                    } else {
                        title.textContent = 'Budaya: ' + (entry.data.nama || '-');
                    }

                    content.appendChild(title);
                    content.appendChild(detailsGrid);

                    card.appendChild(badge);
                    card.appendChild(content);

                    if (entry.foto_path) {
                        const img = document.createElement('img');
                        img.className = 'entry-foto';
                        img.src = '/public/storage/' + entry.foto_path;
                        img.alt = 'Foto ' + entry.type;
                        img.onclick = function() {
                            openLightbox(img.src);
                        };
                        card.appendChild(img);
                    }

                    // Action buttons
                    const actionsDiv = document.createElement('div');
                    actionsDiv.className = 'entry-actions';
                    actionsDiv.style.display = 'flex';
                    actionsDiv.style.flexDirection = 'column';
                    actionsDiv.style.gap = '0.5rem';
                    actionsDiv.style.marginLeft = '1rem';
                    actionsDiv.style.alignSelf = 'center';

                    const editBtn = document.createElement('button');
                    editBtn.type = 'button';
                    editBtn.className = 'btn btn-secondary btn-sm';
                    editBtn.style.padding = '0.35rem 0.75rem';
                    editBtn.style.fontSize = '0.8rem';
                    editBtn.style.minHeight = '1.8rem';
                    editBtn.textContent = 'Edit';
                    editBtn.onclick = function() {
                        openEntryEditModal(tatung.id, index, entry, tatung.nama_cetya_vihara_kelenteng, tatung.penanggung_jawab, tatung.no_kontak_penanggung_jawab);
                    };

                    const deleteForm = document.createElement('form');
                    deleteForm.action = "{{ route('peserta.delete') }}";
                    deleteForm.method = 'POST';
                    deleteForm.style.margin = '0';
                    deleteForm.onsubmit = function() {
                        return confirm('Apakah Anda yakin ingin menghapus peserta ini dari daftar?');
                    };

                    const csrfToken = document.querySelector('input[name="_token"]').value;
                    deleteForm.innerHTML = `
                        <input type="hidden" name="_token" value="${csrfToken}">
                        <input type="hidden" name="id" value="${tatung.id}">
                        <input type="hidden" name="index" value="${index}">
                        <button type="submit" class="btn btn-danger btn-sm" style="padding: 0.35rem 0.75rem; font-size: 0.8rem; min-height: 1.8rem; width: 100%;">Hapus</button>
                    `;

                    actionsDiv.appendChild(editBtn);
                    actionsDiv.appendChild(deleteForm);
                    card.appendChild(actionsDiv);

                    entriesContainer.appendChild(card);
                });
            }

            const modal = document.getElementById('tatungDetailModal');
            modal.classList.add('is-open');
            document.body.classList.add('modal-open');
        }

        function closeTatungModal() {
            const modal = document.getElementById('tatungDetailModal');
            modal.classList.remove('is-open');
            document.body.classList.remove('modal-open');
        }

        // Close modal when clicking outside the card
        document.getElementById('tatungDetailModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeTatungModal();
            }
        });

        // Lightbox functions
        function openLightbox(src) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightboxImg');
            lightboxImg.src = src;
            lightbox.classList.add('is-open');
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('is-open');
        }

        function openEntryEditModal(id, index, entry, vihara, penanggungJawab, kontak) {
            document.getElementById('editId').value = id;
            document.getElementById('editIndex').value = index;
            document.getElementById('editVihara').value = vihara;
            document.getElementById('editPenanggungJawab').value = penanggungJawab;
            document.getElementById('editKontak').value = kontak;
            document.getElementById('editType').value = entry.type;
            
            if (entry.type === 'Tatung') {
                document.getElementById('editName').value = entry.data.nama_tatung || '';
                document.getElementById('editDeityName').value = entry.data.nama_dewa || '';
            } else {
                document.getElementById('editName').value = entry.data.nama || '';
                document.getElementById('editDeityName').value = '';
            }
            
            toggleEditDeityField(entry.type);

            const modal = document.getElementById('entryEditModal');
            modal.classList.add('is-open');
        }

        function closeEntryEditModal() {
            const modal = document.getElementById('entryEditModal');
            modal.classList.remove('is-open');
        }

        function toggleEditDeityField(type) {
            const deityField = document.getElementById('editDeityField');
            const deityInput = document.getElementById('editDeityName');
            if (type === 'Tatung') {
                deityField.style.display = 'block';
                deityInput.required = true;
            } else {
                deityField.style.display = 'none';
                deityInput.required = false;
            }
        }
        
        // Close modal when clicking outside the card
        document.getElementById('entryEditModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeEntryEditModal();
            }
        });
    </script>
</body>
</html>
