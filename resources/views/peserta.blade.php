<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Peserta Pawai - Pawai Tatung Batam</title>
    <meta name="description" content="Daftar peserta resmi (Tatung, Tandu, Atraksi Budaya) Pawai Tatung Jilid 3 Batam.">
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

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            min-height: 2.6rem;
            padding: 0.6rem 1.15rem;
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

        .main-content {
            flex: 1;
            padding: 2.5rem 0 4rem;
        }

        /* Search & Title Section */
        .search-section {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .section-title h2 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            color: var(--red);
            line-height: 1.1;
        }

        .section-title p {
            margin: 0.3rem 0 0;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .category-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1.2rem;
        }

        .filter-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.45rem 1rem;
            border-radius: 12px;
            font-size: 0.82rem;
            font-weight: 700;
            background: rgba(255, 252, 247, 0.7);
            border: 1px solid rgba(195, 140, 58, 0.18);
            color: var(--muted);
            transition: all 0.2s ease;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .filter-btn:hover {
            border-color: var(--gold);
            color: var(--gold-deep);
            background: #fff;
            transform: translateY(-1px);
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #c74732, #a71917);
            color: #fff;
            border-color: transparent;
            box-shadow: 0 4px 10px rgba(167, 25, 23, 0.15);
        }

        .search-bar {
            width: 100%;
            max-width: 420px;
        }

        .search-form {
            display: flex;
            gap: 0.5rem;
        }

        .search-input {
            flex: 1;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(193, 136, 46, 0.22);
            border-radius: 12px;
            background: #fff;
            color: var(--text);
            font: inherit;
            outline: none;
        }

        .search-input:focus {
            border-color: rgba(167, 25, 23, 0.4);
            box-shadow: 0 0 0 3px rgba(167, 25, 23, 0.08);
        }

        /* Participant Grid & Cards */
        .participant-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(285px, 1fr));
            gap: 1.8rem;
        }

        .participant-card {
            border: 1px solid rgba(193, 136, 46, 0.16);
            border-radius: 22px;
            background: var(--paper);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow);
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }

        .participant-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 24px 50px rgba(104, 66, 20, 0.12);
        }

        .participant-img-wrapper {
            position: relative;
            width: 100%;
            height: 190px;
            overflow: hidden;
            background: #f2e9dc;
        }

        .participant-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: zoom-in;
            transition: transform 0.3s ease;
        }

        .participant-img:hover {
            transform: scale(1.04);
        }

        .participant-type-badge {
            position: absolute;
            top: 0.8rem;
            left: 0.8rem;
            background: rgba(255, 252, 246, 0.96);
            border: 1px solid rgba(193, 136, 46, 0.25);
            color: #8f5516;
            font-size: 0.72rem;
            font-weight: 800;
            padding: 0.35rem 0.65rem;
            border-radius: 8px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .participant-body {
            padding: 1.25rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .participant-name {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.55rem;
            color: #8f5516;
            font-weight: 700;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .participant-info {
            font-size: 0.88rem;
            color: var(--text);
            line-height: 1.45;
        }

        .participant-info strong {
            color: var(--muted);
        }

        /* Lightbox Image Preview overlay */
        .lightbox-backdrop {
            position: fixed;
            inset: 0;
            z-index: 120;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(32, 18, 8, 0.85);
            padding: 1rem;
            backdrop-filter: blur(8px);
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
            .topbar .btn {
                width: 100%;
                text-align: center;
            }
            .search-section {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
            }
            .search-bar {
                max-width: 100%;
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
            <div class="container">
                <div class="search-section">
                    <div class="section-title">
                        <h2>Peserta Pawai Tatung</h2>
                        <p>Daftar resmi peserta Tatung, Tandu, dan Atraksi Budaya Pawai Tatung Jilid 3.</p>
                        <div class="category-filters">
                            <a href="{{ route('peserta.index', ['category' => '', 'search' => $search]) }}" class="filter-btn {{ empty($category) ? 'active' : '' }}">Semua</a>
                            <a href="{{ route('peserta.index', ['category' => 'Tatung', 'search' => $search]) }}" class="filter-btn {{ $category === 'Tatung' ? 'active' : '' }}">Tatung</a>
                            <a href="{{ route('peserta.index', ['category' => 'Tandu', 'search' => $search]) }}" class="filter-btn {{ $category === 'Tandu' ? 'active' : '' }}">Tandu</a>
                            <a href="{{ route('peserta.index', ['category' => 'Budaya', 'search' => $search]) }}" class="filter-btn {{ $category === 'Budaya' ? 'active' : '' }}">Budaya</a>
                        </div>
                    </div>

                    <div class="search-bar">
                        <form action="{{ route('peserta.index') }}" method="GET" class="search-form">
                            @if (!empty($category))
                                <input type="hidden" name="category" value="{{ $category }}">
                            @endif
                            <input type="text" name="search" value="{{ $search }}" class="search-input" placeholder="Cari nama peserta / vihara / dewa...">
                            <button type="submit" class="btn btn-primary">Cari</button>
                            @if ($search)
                                <a href="{{ route('peserta.index', ['category' => $category]) }}" class="btn btn-secondary">Reset</a>
                            @endif
                        </form>
                    </div>
                </div>

                @if (empty($participants))
                    <div style="padding: 4rem 2rem; text-align: center; border: 1px dashed rgba(193, 136, 46, 0.22); border-radius: 20px; color: var(--muted); background: var(--paper);">
                        <h3>Tidak Ada Data Peserta</h3>
                        <p>Belum ada data peserta yang disetujui panitia atau cocok dengan kata kunci pencarian Anda.</p>
                    </div>
                @else
                    <div class="participant-grid">
                        @foreach ($participants as $participant)
                            <div class="participant-card">
                                <div class="participant-img-wrapper">
                                    @if ($participant['foto_path'])
                                        <img src="/public/storage/{{ $participant['foto_path'] }}" alt="Foto {{ $participant['name'] }}" class="participant-img" onclick="openLightbox(this.src)">
                                    @else
                                        <div style="width: 100%; height: 100%; display: grid; place-items: center; color: var(--muted); font-size: 0.85rem; font-weight: bold; background: #f2e9dc;">
                                            Tidak Ada Foto
                                        </div>
                                    @endif
                                    <span class="participant-type-badge">{{ $participant['type'] }}</span>
                                </div>

                                <div class="participant-body">
                                    <h3 class="participant-name">
                                        {{ $participant['vihara'] }}
                                    </h3>
                                    
                                    <div class="participant-info">
                                        <strong>Nama Peserta:</strong> {{ $participant['name'] }}
                                    </div>
                                    
                                    @if ($participant['type'] === 'Tatung' && $participant['deity_name'])
                                        <div class="participant-info">
                                            <strong>Nama Dewa:</strong> {{ $participant['deity_name'] }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </main>

        <footer class="footer">
            <div class="container">
                &copy; {{ date('Y') }} Pawai Tatung Batam - Kepri. Hak Cipta Dilindungi.
            </div>
        </footer>
    </div>

    <!-- LIGHTBOX IMAGE PREVIEW -->
    <div id="lightbox" class="lightbox-backdrop" onclick="closeLightbox()">
        <button type="button" class="lightbox-close" onclick="closeLightbox()">&times;</button>
        <div class="lightbox-content" onclick="event.stopPropagation()">
            <img id="lightboxImg" class="lightbox-img" src="" alt="Foto Entry">
        </div>
    </div>

    <script>
        function openLightbox(src) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightboxImg');
            lightboxImg.src = src;
            lightbox.classList.add('is-open');
            document.body.classList.add('modal-open');
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('is-open');
            document.body.classList.remove('modal-open');
        }
    </script>
</body>
</html>
