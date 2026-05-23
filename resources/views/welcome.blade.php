@php
    $eventDate = \Carbon\Carbon::create(2026, 9, 27, 0, 0, 0, 'Asia/Jakarta');
    $now = now('Asia/Jakarta');
    $diffSeconds = max(0, $now->diffInSeconds($eventDate, false));

    $navLinks = [
        ['label' => 'Beranda', 'href' => '#beranda'],
        ['label' => 'Tentang', 'href' => '#tentang'],
        ['label' => 'Rangkaian Acara', 'href' => '#acara'],
        ['label' => 'Pendaftaran', 'href' => '#daftar'],
        ['label' => 'Galeri', 'href' => '#galeri'],
        ['label' => 'Sponsor', 'href' => '#sponsor'],
        ['label' => 'Kontak', 'href' => '#kontak'],
    ];

    $pillars = [
        ['key' => 'B', 'icon' => 'temple', 'title' => 'Budaya Lestari', 'text' => 'Warisan yang dirawat, dibawa pulang, dan diteruskan.'],
        ['key' => 'S', 'icon' => 'lotus', 'title' => 'Spiritual', 'text' => 'Doa bersama, ritus, dan nilai keselarasan.'],
        ['key' => 'T', 'icon' => 'drum', 'title' => 'Tradisi', 'text' => 'Langkah turun-temurun yang tetap hidup di kota ini.'],
        ['key' => 'H', 'icon' => 'hands', 'title' => 'Harmoni', 'text' => 'Persaudaraan lintas komunitas dalam satu perayaan.'],
        ['key' => 'K', 'icon' => 'island', 'title' => 'Kepri Maju', 'text' => 'Semangat Mengembangkan dan melestarikan Budaya Tradisi Nusantara yang Harmonis di Kepulauan Riau.'],
    ];

    $countdown = [
        ['value' => intdiv($diffSeconds, 86400), 'label' => 'Hari', 'key' => 'days'],
        ['value' => intdiv($diffSeconds % 86400, 3600), 'label' => 'Jam', 'key' => 'hours'],
        ['value' => intdiv($diffSeconds % 3600, 60), 'label' => 'Menit', 'key' => 'minutes'],
        ['value' => $diffSeconds % 60, 'label' => 'Detik', 'key' => 'seconds'],
    ];

    $highlights = [
        [
            'title' => 'Arak-arakan Tatung',
            'text' => 'Prosesi utama yang menjadi pusat perhatian dan energi acara.',
            'image' => asset('images/hero-banner.png'),
        ],
        [
            'title' => 'Atraksi Barongsai',
            'text' => 'Aksi penuh warna yang menghidupkan suasana sepanjang jalur pawai.',
            'image' => asset('images/atraksi-barongsai.png'),
        ],
        [
            'title' => 'Ritual Spiritual',
            'text' => 'Rangkaian doa dan penghormatan untuk keselamatan bersama.',
            'image' => asset('images/about-tatung.png'),
        ],
        [
            'title' => 'Atraksi Budaya',
            'text' => 'Perpaduan seni, gerak, dan kostum yang memikat mata.',
            'image' => asset('images/atraksi-budaya.png'),
        ],
        [
            'title' => 'Doa Bersama',
            'text' => 'Momen hening yang menegaskan kebersamaan dan harapan baik.',
            'image' => asset('images/doa-bersama.png'),
        ],
        [
            'title' => 'Pesta Kembang Api',
            'text' => 'Penutup malam yang menambah kemegahan suasana pawai.',
            'image' => asset('images/pesta-kembang-api.png'),
        ],
    ];

    $registrationCards = [
        [
            'accent' => 'red',
            'title' => 'Pendaftaran Peserta Tatung',
            'text' => 'Terbuka untuk Tatung dari berbagai daerah yang ingin berpartisipasi dalam prosesi arak-arakan.',
            'image' => asset('images/registration-tatung.png'),
            'points' => ['Syarat & Ketentuan', 'Formulir Pendaftaran', 'Informasi Teknis', 'Kontak Panitia'],
            'button' => 'Daftar sebagai Tatung',
        ],
    ];

    $schedule = [
        ['time' => '06.00', 'title' => 'Persiapan & Registrasi', 'place' => 'Vihara Duta Maitreya'],
        ['time' => '07.30', 'title' => 'Sembahyang Pembuka', 'place' => 'Vihara Duta Maitreya'],
        ['time' => '08.30', 'title' => 'Arak-arakan Tatung', 'place' => 'Rute Pawai'],
        ['time' => '12.00', 'title' => 'Istirahat & Makan Siang', 'place' => 'Area Kuliner'],
        ['time' => '14.00', 'title' => 'Atraksi Budaya', 'place' => 'Panggung Utama'],
        ['time' => '17.00', 'title' => 'Doa Bersama', 'place' => 'Panggung Utama'],
        ['time' => '20.00', 'title' => 'Pesta Kembang Api', 'place' => 'Waterfront City'],
    ];

    $gallery = [
        asset('images/hero-banner.png'),
        asset('images/about-tatung.png'),
        asset('images/registration-tatung.png'),
        asset('images/contact-bridge.png'),
        asset('images/hero-banner.png'),
        asset('images/about-tatung.png'),
    ];

    $sponsors = ['Logo Sponsor', 'Logo Sponsor', 'Logo Sponsor', 'Logo Sponsor', 'Logo Sponsor', 'Logo Sponsor'];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pawai Tatung Batam - Kepri</title>
    <meta name="description" content="Website resmi Pawai Tatung Jilid 3 Batam - Kepri. Informasi acara, pendaftaran, rute pawai, galeri, dan sponsor.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f8f2e6;
            --bg-soft: #fcf8f0;
            --panel: rgba(255, 252, 246, 0.94);
            --panel-strong: #fffaf0;
            --line: rgba(195, 140, 58, 0.22);
            --gold: #c88a2b;
            --gold-deep: #a96516;
            --red: #b92722;
            --red-soft: #d7553c;
            --text: #3f2a17;
            --muted: #6d5944;
            --shadow: 0 20px 50px rgba(104, 66, 20, 0.16);
            --radius-xl: 28px;
            --radius-lg: 22px;
            --radius-md: 18px;
            --radius-sm: 14px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            color: var(--text);
            background:
                radial-gradient(circle at 12% 18%, rgba(255, 215, 160, 0.4), transparent 20%),
                radial-gradient(circle at 88% 10%, rgba(255, 255, 255, 0.9), transparent 22%),
                linear-gradient(180deg, #fffdf7 0%, var(--bg) 35%, #f7efdf 100%);
            font-family: 'Inter', sans-serif;
        }

        body.modal-open {
            overflow: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img {
            display: block;
            width: 100%;
        }

        .site-shell {
            position: relative;
            overflow: hidden;
        }

        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 80;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            overflow: auto;
            background: rgba(32, 18, 8, 0.52);
            backdrop-filter: blur(8px);
        }

        .modal-backdrop.is-open {
            display: flex;
        }

        .modal-card {
            position: relative;
            width: min(880px, 100%);
            max-height: calc(100vh - 2rem);
            overflow: hidden;
            border: 1px solid rgba(197, 143, 57, 0.35);
            border-radius: 30px;
            background:
                radial-gradient(circle at 15% 14%, rgba(255, 219, 155, 0.26), transparent 18%),
                linear-gradient(180deg, rgba(255, 252, 246, 0.98), rgba(251, 245, 231, 0.98));
            box-shadow: 0 30px 80px rgba(32, 18, 8, 0.35);
        }

        .modal-card::before,
        .modal-card::after {
            content: '';
            position: absolute;
            width: 120px;
            height: 120px;
            pointer-events: none;
            background:
                radial-gradient(circle at 50% 50%, transparent 0 68%, rgba(214, 159, 58, 0.9) 69% 73%, transparent 74%),
                radial-gradient(circle at 50% 50%, transparent 0 77%, rgba(214, 159, 58, 0.22) 78% 80%, transparent 81%);
            opacity: 0.7;
        }

        .modal-card::before {
            top: -32px;
            left: -32px;
            transform: rotate(18deg);
        }

        .modal-card::after {
            right: -28px;
            bottom: -28px;
            transform: rotate(-14deg);
        }

        .modal-close {
            position: absolute;
            top: 0.8rem;
            right: 0.8rem;
            z-index: 2;
            display: inline-grid;
            place-items: center;
            width: 2.4rem;
            height: 2.4rem;
            border: 1px solid rgba(205, 149, 56, 0.38);
            border-radius: 999px;
            background: rgba(255, 251, 244, 0.95);
            color: #8d611d;
            font-size: 1.5rem;
            line-height: 1;
            cursor: pointer;
        }

        .modal-inner {
            max-height: calc(100vh - 2rem);
            overflow: auto;
            padding: 1.2rem 1.2rem 1.05rem;
        }

        .modal-brand {
            display: grid;
            place-items: center;
            margin-bottom: 0.55rem;
            color: #b2761d;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            text-align: center;
        }

        .modal-brand small {
            display: block;
            margin-top: 0.15rem;
            font-family: 'Inter', sans-serif;
            font-size: 0.72rem;
            letter-spacing: 0.14em;
        }

        .modal-title {
            margin: 0.1rem 0 0;
            text-align: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.7rem, 4vw, 2.7rem);
            line-height: 1.08;
            color: var(--red);
        }

        .modal-lead {
            margin: 0.45rem auto 0;
            max-width: 44rem;
            text-align: center;
            font-size: 1rem;
            line-height: 1.65;
            color: var(--muted);
        }

        .modal-separator {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            margin: 0.85rem auto 1rem;
            max-width: 480px;
            color: #c99235;
        }

        .modal-separator::before,
        .modal-separator::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(201, 146, 53, 0.7), transparent);
        }

        .modal-question {
            margin: 0 0 1rem;
            text-align: center;
            font-size: 1.15rem;
            font-weight: 700;
            color: #4b3524;
        }

        .modal-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
        }

        .modal-choice {
            overflow: hidden;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            border: 1px solid rgba(197, 143, 57, 0.28);
            border-radius: 22px;
            background: rgba(255, 252, 246, 0.98);
            box-shadow: 0 10px 24px rgba(104, 66, 20, 0.08);
        }

        .modal-choice.red {
            border-color: rgba(185, 39, 34, 0.32);
        }

        .modal-choice.gold {
            border-color: rgba(201, 146, 53, 0.32);
        }

        .modal-choice-media {
            position: relative;
            overflow: hidden;
            min-height: 210px;
            margin: 0;
        }

        .modal-choice-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-choice-media::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(255, 252, 246, 0.06), rgba(255, 252, 246, 0.2) 65%, rgba(255, 252, 246, 0.45));
        }

        .modal-choice-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 0.85rem;
            padding: 1rem 1rem 1.05rem;
        }

        .modal-choice-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .modal-badge {
            display: grid;
            place-items: center;
            flex: 0 0 3rem;
            width: 3rem;
            height: 3rem;
            border-radius: 999px;
            background: rgba(255, 243, 225, 0.95);
            color: #c9892d;
            border: 1px solid rgba(201, 146, 53, 0.22);
            font-size: 1.2rem;
        }

        .modal-choice.red .modal-badge {
            color: var(--red);
            border-color: rgba(185, 39, 34, 0.22);
        }

        .modal-choice-title {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.6rem;
            line-height: 1;
            color: #8f5516;
        }

        .modal-choice.red .modal-choice-title {
            color: var(--red);
        }

        .modal-choice p {
            margin: 0;
            color: var(--muted);
            line-height: 1.65;
            font-size: 0.95rem;
        }

        .modal-action {
            justify-content: space-between;
            width: 100%;
        }

        .modal-footer {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        .modal-skip {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.85rem 1.2rem;
            border: 1px solid rgba(197, 143, 57, 0.22);
            border-radius: 18px;
            background: rgba(255, 250, 243, 0.92);
            color: #5d4631;
            font-weight: 700;
        }

        .site-shell::before,
        .site-shell::after {
            content: '';
            position: fixed;
            inset: auto;
            pointer-events: none;
            z-index: 0;
            opacity: 0.6;
            background-repeat: no-repeat;
        }

        .site-shell::before {
            top: 5rem;
            left: -2rem;
            width: 10rem;
            height: 18rem;
            background:
                radial-gradient(circle at 50% 18%, #f8c76a 0 12%, transparent 12.5%),
                linear-gradient(180deg, rgba(204, 112, 44, 0.95), rgba(204, 112, 44, 0.95)) center 4rem/0.18rem 5.5rem no-repeat,
                radial-gradient(circle at 50% 50%, rgba(230, 78, 49, 0.94) 0 29%, transparent 30%),
                radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.45) 0 4%, transparent 4.5%);
        }

        .site-shell::after {
            right: -1rem;
            bottom: 4rem;
            width: 14rem;
            height: 14rem;
            background:
                radial-gradient(circle at 50% 50%, rgba(218, 172, 101, 0.18) 0 42%, transparent 43%),
                radial-gradient(circle at 50% 50%, rgba(198, 137, 43, 0.26) 0 50%, transparent 51%),
                radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.65) 0 62%, transparent 63%);
        }

        .container {
            position: relative;
            z-index: 1;
            width: min(1280px, calc(100% - 2rem));
            margin: 0 auto;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.25rem 0 0.8rem;
        }

        .brand {
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
        }

        .brand-mark {
            display: grid;
            place-items: center;
            width: 2.9rem;
            height: 2.9rem;
            border-radius: 16px 16px 8px 16px;
            color: white;
            background: linear-gradient(145deg, #ca8f32, #9f6116);
            box-shadow: 0 10px 25px rgba(165, 103, 18, 0.24);
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.85rem;
            font-weight: 700;
        }

        .brand-text h1 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.65rem;
            line-height: 0.95;
            color: #ba7422;
            letter-spacing: 0.02em;
        }

        .brand-text p {
            margin: 0.15rem 0 0;
            font-size: 0.74rem;
            letter-spacing: 0.28em;
            color: #8c6a40;
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .nav a {
            position: relative;
            padding-bottom: 0.35rem;
            font-size: 0.92rem;
            font-weight: 600;
            color: #5c4a36;
        }

        .nav a.active::after,
        .nav a:hover::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            border-radius: 999px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            min-height: 2.9rem;
            padding: 0.7rem 1.2rem;
            border: 1px solid transparent;
            border-radius: 14px;
            font-size: 0.95rem;
            font-weight: 700;
            line-height: 1;
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease, background 0.18s ease;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            color: #fff8ef;
            background: linear-gradient(135deg, #c74d34, #a72018);
            box-shadow: 0 14px 28px rgba(167, 32, 24, 0.22);
        }

        .btn-secondary {
            color: #7d4b13;
            border-color: rgba(199, 138, 43, 0.28);
            background: linear-gradient(180deg, rgba(255, 250, 241, 0.95), rgba(247, 235, 206, 0.95));
        }

        .btn-warning {
            color: #6f4310;
            border-color: rgba(219, 171, 80, 0.3);
            background: linear-gradient(180deg, rgba(255, 244, 215, 0.98), rgba(243, 212, 148, 0.96));
            box-shadow: 0 12px 22px rgba(175, 124, 30, 0.12);
        }

        .hero {
            margin-top: 0.6rem;
            padding: 0.8rem;
            border: 1px solid rgba(186, 133, 60, 0.2);
            border-radius: 34px;
            background:
                radial-gradient(circle at 15% 20%, rgba(255, 255, 255, 0.9), transparent 28%),
                linear-gradient(135deg, rgba(255, 251, 244, 0.98), rgba(248, 239, 224, 0.9));
            box-shadow: var(--shadow);
        }

        .hero-inner {
            position: relative;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 1rem;
            min-height: 760px;
            padding: 1.3rem;
            border-radius: 28px;
            background:
                linear-gradient(180deg, rgba(255, 248, 236, 0.65), rgba(255, 248, 236, 0.35)),
                radial-gradient(circle at 50% 16%, rgba(255, 238, 206, 0.8), transparent 32%),
                linear-gradient(90deg, rgba(255, 249, 241, 0.78), rgba(255, 249, 241, 0.42) 55%, rgba(232, 207, 165, 0.2));
        }

        .hero-banner {
            background:
                linear-gradient(90deg, rgba(255, 250, 244, 0.98) 0%, rgba(255, 248, 238, 0.88) 34%, rgba(255, 248, 238, 0.34) 58%, rgba(255, 248, 238, 0.12) 100%),
                var(--hero-image) center center / cover no-repeat;
        }

        .hero-inner::before,
        .hero-inner::after {
            content: '';
            position: absolute;
            pointer-events: none;
        }

        .hero-inner::before {
            inset: auto -8% 0 -8%;
            height: 150px;
            background:
                radial-gradient(circle at 8% 0, transparent 60px, rgba(94, 166, 205, 0.22) 61px 66px, transparent 67px),
                radial-gradient(circle at 18% 80%, transparent 38px, rgba(94, 166, 205, 0.24) 39px 44px, transparent 45px),
                radial-gradient(circle at 30% 18%, transparent 48px, rgba(94, 166, 205, 0.2) 49px 54px, transparent 55px),
                radial-gradient(circle at 44% 84%, transparent 54px, rgba(94, 166, 205, 0.22) 55px 60px, transparent 61px),
                radial-gradient(circle at 60% 16%, transparent 54px, rgba(94, 166, 205, 0.18) 55px 60px, transparent 61px),
                radial-gradient(circle at 76% 84%, transparent 54px, rgba(94, 166, 205, 0.22) 55px 60px, transparent 61px),
                radial-gradient(circle at 92% 16%, transparent 54px, rgba(94, 166, 205, 0.18) 55px 60px, transparent 61px);
            opacity: 0.9;
        }

        .hero-copy {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 1rem;
            padding: 2.2rem 1.2rem 1rem 0.6rem;
            max-width: 42rem;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            width: fit-content;
            padding: 0.45rem 0.8rem;
            border: 1px solid rgba(199, 138, 43, 0.2);
            border-radius: 999px;
            background: rgba(255, 247, 232, 0.78);
            color: #8a5e1a;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .hero-title {
            margin: 0.85rem 0 0;
            color: var(--red);
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(4rem, 7vw, 6.9rem);
            line-height: 0.87;
            letter-spacing: 0.02em;
            text-transform: uppercase;
        }

        .hero-title .line {
            display: block;
        }

        .hero-title .gold {
            color: #cb9638;
        }

        .hero-copy p.lead {
            max-width: 31rem;
            margin: 1rem 0 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.55rem, 2.6vw, 2rem);
            line-height: 1.22;
            color: #4f3924;
        }

        .hero-copy p.sublead {
            max-width: 28rem;
            margin: 0.5rem 0 0;
            font-size: 1rem;
            line-height: 1.8;
            color: var(--muted);
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin-top: 1.35rem;
        }

        .hero-meta {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 0.7rem;
            margin-top: 1.35rem;
        }

        .meta-chip {
            display: flex;
            gap: 0.65rem;
            align-items: center;
            padding: 0.88rem 0.95rem;
            border: 1px solid rgba(199, 138, 43, 0.2);
            border-radius: 18px;
            background: rgba(255, 250, 243, 0.9);
            box-shadow: 0 8px 18px rgba(109, 70, 18, 0.05);
        }

        .meta-chip .mark {
            display: grid;
            place-items: center;
            flex: 0 0 2rem;
            width: 2rem;
            height: 2rem;
            border-radius: 999px;
            background: linear-gradient(135deg, #f7ce77, #d18d23);
            color: #fff;
            font-size: 0.85rem;
            font-weight: 800;
        }

        .meta-chip strong {
            display: block;
            font-size: 0.88rem;
            color: #6d4a1d;
        }

        .meta-chip span {
            font-size: 0.82rem;
            color: var(--muted);
        }

        .hero-info {
            position: absolute;
            right: 1rem;
            bottom: 1.1rem;
            width: min(18rem, calc(100% - 2rem));
            padding: 1rem 1rem 0.95rem;
            border: 1px solid rgba(191, 137, 49, 0.24);
            border-radius: 18px;
            background: rgba(255, 248, 238, 0.92);
            backdrop-filter: blur(10px);
            box-shadow: 0 16px 24px rgba(102, 62, 13, 0.18);
        }

        .hero-info .row {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 0.9rem;
        }

        .hero-info .row:last-child {
            margin-bottom: 0;
        }

        .hero-info .icon {
            display: grid;
            place-items: center;
            flex: 0 0 2.1rem;
            width: 2.1rem;
            height: 2.1rem;
            border-radius: 12px;
            background: linear-gradient(145deg, #f7d484, #d08d23);
            color: white;
            font-weight: 800;
        }

        .hero-info small {
            display: block;
            margin-bottom: 0.15rem;
            color: #9a6c2d;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .hero-info strong {
            display: block;
            color: #5a3820;
            line-height: 1.35;
        }

        .hero-column {
            display: grid;
            align-self: end;
            justify-items: end;
            min-height: 100%;
            padding: 0.45rem 0.1rem 0.6rem;
        }

        .hero-column .small-card {
            max-width: 24rem;
            padding: 1rem;
            border: 1px solid rgba(189, 132, 52, 0.24);
            border-radius: 22px;
            background: rgba(255, 250, 241, 0.95);
            box-shadow: 0 14px 30px rgba(117, 79, 30, 0.12);
        }

        .small-card h3 {
            margin: 0 0 0.4rem;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.7rem;
            color: var(--red);
        }

        .small-card p {
            margin: 0;
            color: var(--muted);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        .section {
            margin-top: 1.25rem;
            padding: 1rem;
            border: 1px solid rgba(186, 133, 60, 0.18);
            border-radius: 30px;
            background: linear-gradient(180deg, rgba(255, 251, 244, 0.98), rgba(248, 240, 225, 0.92));
            box-shadow: var(--shadow);
        }

        .section-inner {
            position: relative;
            overflow: hidden;
            border-radius: 24px;
            padding: 1.4rem;
            background:
                radial-gradient(circle at 0 0, rgba(241, 204, 134, 0.18), transparent 28%),
                radial-gradient(circle at 100% 100%, rgba(94, 166, 205, 0.12), transparent 24%),
                rgba(255, 250, 243, 0.86);
        }

        .section-heading {
            margin: 0 0 0.4rem;
            text-align: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2rem, 3vw, 3rem);
            color: #9d6122;
        }

        .section-copy {
            max-width: 52rem;
            margin: 0 auto 1.3rem;
            text-align: center;
            color: var(--muted);
            line-height: 1.8;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 0.75rem;
            margin-top: -0.5rem;
        }

        .feature-card {
            padding: 1rem 0.9rem;
            border: 1px solid rgba(198, 137, 43, 0.18);
            border-radius: 18px;
            background: rgba(255, 251, 245, 0.95);
            text-align: center;
            box-shadow: 0 10px 22px rgba(120, 78, 21, 0.05);
        }

        .feature-card .glyph {
            display: grid;
            place-items: center;
            width: 2.8rem;
            height: 2.8rem;
            margin: 0 auto 0.7rem;
            border-radius: 16px;
            background: linear-gradient(145deg, rgba(247, 212, 132, 0.7), rgba(211, 144, 32, 0.92));
            color: #fff;
            font-weight: 800;
            box-shadow: 0 10px 18px rgba(146, 93, 18, 0.12);
        }

        .feature-card .glyph svg {
            width: 1.45rem;
            height: 1.45rem;
            stroke: currentColor;
        }

        .feature-card .glyph svg [fill="none"] {
            fill: none;
        }

        .feature-card .glyph svg .stroke {
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .feature-card h3 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.55rem;
            color: #8b551a;
        }

        .feature-card p {
            margin: 0.25rem 0 0;
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .countdown {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 0.9rem;
            margin-top: 1rem;
        }

        .count-card {
            padding: 1.2rem 1rem;
            border: 1px solid rgba(196, 136, 45, 0.22);
            border-radius: 20px;
            background: rgba(255, 252, 247, 0.98);
            text-align: center;
            box-shadow: 0 12px 25px rgba(105, 67, 18, 0.06);
        }

        .count-card strong {
            display: block;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2.6rem, 6vw, 4.4rem);
            line-height: 0.95;
            color: var(--red);
        }

        .count-card span {
            display: block;
            margin-top: 0.35rem;
            font-size: 1rem;
            color: #7b5d3a;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
            gap: 1.2rem;
            align-items: stretch;
        }

        .about-media,
        .about-copy,
        .register-card,
        .timeline-card,
        .route-card,
        .gallery-card,
        .sponsor-card,
        .cta-banner {
            border: 1px solid rgba(194, 136, 46, 0.18);
            border-radius: 24px;
            background: rgba(255, 251, 245, 0.97);
            box-shadow: 0 12px 26px rgba(109, 70, 18, 0.08);
        }

        .about-media {
            position: relative;
            overflow: hidden;
            min-height: 560px;
        }

        .about-media img,
        .register-media img {
            height: 100%;
            object-fit: cover;
        }

        .about-media::after,
        .register-media::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(255, 236, 200, 0.02), rgba(71, 35, 8, 0.22));
        }

        .about-copy {
            padding: 1.35rem;
        }

        .section-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.85rem;
            color: #a96418;
            font-size: 0.76rem;
            font-weight: 800;
            letter-spacing: 0.15em;
            text-transform: uppercase;
        }

        .section-tag::before,
        .section-tag::after {
            content: '';
            width: 2rem;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(183, 123, 38, 0.75), transparent);
        }

        .about-copy h3 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2.2rem, 3.6vw, 3.4rem);
            color: #8f5516;
        }

        .about-copy p {
            margin: 0.85rem 0 0;
            color: #5f4b39;
            line-height: 1.8;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 0.8rem;
            margin-top: 1.2rem;
        }

        .stat-card {
            padding: 1rem 0.8rem;
            border: 1px solid rgba(195, 140, 58, 0.18);
            border-radius: 18px;
            background: linear-gradient(180deg, rgba(255, 253, 247, 0.98), rgba(247, 236, 211, 0.88));
            text-align: center;
        }

        .stat-card .stat-icon {
            display: grid;
            place-items: center;
            width: 4.8rem;
            height: 4.8rem;
            margin: 0 auto 0.65rem;
            padding: 0.2rem;
            border-radius: 1.6rem;
            background: linear-gradient(180deg, rgba(255, 245, 223, 0.98), rgba(245, 214, 152, 0.85));
            color: var(--gold-deep);
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.7rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            box-shadow: inset 0 0 0 1px rgba(195, 140, 58, 0.14);
        }

        .stat-card strong {
            display: block;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            color: var(--red);
            line-height: 1;
        }

        .stat-card span {
            display: block;
            margin-top: 0.45rem;
            color: var(--muted);
            font-size: 0.84rem;
            line-height: 1.45;
        }

        .highlight-grid {
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            gap: 0.75rem;
        }

        .highlight-card {
            overflow: hidden;
            border: 1px solid rgba(193, 134, 44, 0.18);
            border-radius: 18px;
            background: rgba(255, 251, 245, 0.98);
        }

        .highlight-card img {
            height: 160px;
            object-fit: cover;
        }

        .highlight-card .body {
            padding: 0.8rem 0.75rem 0.95rem;
            text-align: center;
        }

        .highlight-card h4 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.35rem;
            color: #7f4f18;
        }

        .highlight-card p {
            margin: 0.35rem 0 0;
            color: var(--muted);
            font-size: 0.88rem;
            line-height: 1.55;
        }

        .register-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .register-card {
            overflow: hidden;
            display: grid;
            grid-template-columns: 0.92fr 1.08fr;
            min-height: 380px;
        }

        .register-card.blue {
            grid-template-columns: 1.08fr 0.92fr;
        }

        .register-media {
            position: relative;
            overflow: hidden;
            margin: 0;
            min-height: 100%;
        }

        .register-body {
            padding: 1.2rem 1.15rem;
        }

        .register-card.red .register-body {
            border-left: 2px solid rgba(193, 56, 42, 0.2);
        }

        .register-card.blue .register-body {
            border-right: 2px solid rgba(58, 103, 164, 0.2);
        }

        .register-body h3 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.2rem;
            line-height: 1.05;
        }

        .register-card.red h3 {
            color: var(--red);
        }

        .register-card.blue h3 {
            color: #2d5da0;
        }

        .register-body p {
            margin: 0.75rem 0 0;
            color: var(--muted);
            line-height: 1.75;
        }

        .checklist {
            display: grid;
            gap: 0.65rem;
            margin: 1rem 0 1.1rem;
            padding: 0;
            list-style: none;
        }

        .checklist li {
            position: relative;
            padding-left: 1.45rem;
            color: #5c4a36;
        }

        .checklist li::before {
            content: '✓';
            position: absolute;
            left: 0;
            top: 0.02rem;
            color: var(--gold);
            font-weight: 800;
        }

        .split-grid {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 1rem;
            margin-top: 1rem;
        }

        .timeline-card,
        .route-card {
            padding: 1.1rem;
        }

        .timeline-card h3,
        .route-card h3 {
            margin: 0 0 0.9rem;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.1rem;
            color: #8f5516;
            text-align: center;
        }

        .timeline-list {
            display: grid;
            gap: 0.65rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .timeline-item {
            display: grid;
            grid-template-columns: 5rem 1fr;
            gap: 0.8rem;
            align-items: start;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(194, 136, 46, 0.14);
        }

        .timeline-item:last-child {
            border-bottom: 0;
        }

        .timeline-time {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 0.65rem;
            border-radius: 999px;
            background: rgba(255, 235, 206, 0.9);
            color: #9a651c;
            font-weight: 800;
            letter-spacing: 0.02em;
        }

        .timeline-item strong {
            display: block;
            font-size: 1rem;
            color: #5a3820;
        }

        .timeline-item span {
            display: block;
            margin-top: 0.2rem;
            color: var(--muted);
            font-size: 0.88rem;
        }

        .route-map {
            position: relative;
            overflow: hidden;
            min-height: 290px;
            border: 1px solid rgba(194, 136, 46, 0.16);
            border-radius: 20px;
            background:
                linear-gradient(rgba(255, 255, 255, 0.72), rgba(255, 255, 255, 0.72)),
                linear-gradient(90deg, rgba(101, 166, 205, 0.14) 1px, transparent 1px),
                linear-gradient(0deg, rgba(101, 166, 205, 0.14) 1px, transparent 1px),
                linear-gradient(180deg, #f7eedf, #eae1cf);
            background-size: auto, 46px 46px, 46px 46px, auto;
        }

        .route-map svg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        .pin {
            position: absolute;
            z-index: 1;
            display: grid;
            place-items: center;
            width: 92px;
            height: 54px;
            border-radius: 15px;
            background: rgba(255, 252, 246, 0.96);
            border: 1px solid rgba(184, 128, 41, 0.18);
            box-shadow: 0 10px 20px rgba(109, 70, 18, 0.16);
            color: #5d3a1d;
            font-size: 0.75rem;
            font-weight: 800;
            text-align: center;
            letter-spacing: 0.05em;
        }

        .pin.start {
            top: 1rem;
            left: 1rem;
        }

        .pin.finish {
            right: 1rem;
            bottom: 1rem;
        }

        .route-summary {
            display: grid;
            gap: 0.8rem;
            margin-top: 0.9rem;
            font-size: 0.95rem;
            color: var(--muted);
            line-height: 1.7;
        }

        .route-pills {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 0.75rem;
            margin-top: 0.9rem;
        }

        .pill {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            padding: 0.85rem 0.9rem;
            border: 1px solid rgba(194, 136, 46, 0.15);
            border-radius: 16px;
            background: rgba(255, 250, 242, 0.9);
        }

        .pill strong {
            display: block;
            font-size: 1rem;
            color: #6b4417;
        }

        .pill span {
            display: block;
            margin-top: 0.12rem;
            font-size: 0.8rem;
            color: var(--muted);
        }

        .gallery-track {
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            gap: 0.75rem;
        }

        .gallery-card {
            overflow: hidden;
        }

        .gallery-card img {
            height: 185px;
            object-fit: cover;
        }

        .gallery-card .caption {
            padding: 0.75rem 0.7rem 0.9rem;
            text-align: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.35rem;
            color: #7e4c15;
        }

        .sponsor-grid {
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            gap: 0.8rem;
        }

        .sponsor-card {
            display: grid;
            place-items: center;
            min-height: 88px;
            padding: 1rem;
            color: #7a5f42;
            font-size: 0.9rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            background: linear-gradient(180deg, rgba(255, 252, 246, 0.98), rgba(247, 235, 206, 0.76));
        }

        .cta-banner {
            overflow: hidden;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: center;
            gap: 1rem;
            padding: 1.15rem;
            background:
                radial-gradient(circle at 12% 50%, rgba(225, 112, 52, 0.18), transparent 25%),
                radial-gradient(circle at 88% 50%, rgba(73, 128, 191, 0.18), transparent 25%),
                linear-gradient(135deg, rgba(255, 247, 234, 0.97), rgba(244, 230, 209, 0.95));
        }

        .cta-copy h3 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2.2rem, 4vw, 3.4rem);
            color: var(--red);
        }

        .cta-copy p {
            margin: 0.55rem 0 0;
            max-width: 42rem;
            color: #5f4b39;
            line-height: 1.7;
        }

        .cta-actions {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .cta-visual {
            min-height: 190px;
            border-radius: 22px;
            background:
                linear-gradient(90deg, rgba(255, 255, 255, 0.35), rgba(255, 255, 255, 0.08)),
                url('{{ asset('images/contact-bridge.png') }}') center/cover;
            box-shadow: inset 0 0 0 1px rgba(255, 248, 238, 0.38);
        }

        .footer {
            margin-top: 1rem;
            padding-bottom: 1rem;
        }

        .footer-panel {
            padding: 1.3rem 1.2rem 1rem;
            border: 1px solid rgba(194, 136, 46, 0.16);
            border-radius: 28px;
            background:
                radial-gradient(circle at 10% 0%, rgba(255, 206, 108, 0.14), transparent 22%),
                linear-gradient(180deg, rgba(255, 250, 243, 0.98), rgba(247, 235, 209, 0.88));
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.2fr repeat(3, minmax(0, 1fr));
            gap: 1rem;
        }

        .footer-brand h4 {
            margin: 0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            color: #9d6122;
        }

        .footer-brand p {
            margin: 0.5rem 0 0;
            max-width: 20rem;
            color: var(--muted);
            line-height: 1.7;
        }

        .footer-col h5 {
            margin: 0 0 0.65rem;
            font-size: 0.95rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #8a5e1a;
        }

        .footer-col ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .footer-col li + li {
            margin-top: 0.45rem;
        }

        .footer-col a,
        .footer-col span {
            color: var(--muted);
            line-height: 1.6;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            align-items: center;
            margin-top: 1rem;
            padding-top: 0.95rem;
            border-top: 1px solid rgba(194, 136, 46, 0.16);
            color: #8a6b49;
            font-size: 0.9rem;
        }

        .social {
            display: flex;
            gap: 0.55rem;
            flex-wrap: wrap;
        }

        .social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(194, 136, 46, 0.16);
            color: #8b5c1a;
            font-size: 0.8rem;
            font-weight: 800;
        }

        @media (max-width: 1200px) {
            .hero-inner {
                grid-template-columns: 1fr;
            }

            .feature-grid,
            .highlight-grid,
            .gallery-track,
            .sponsor-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .footer-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 900px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav {
                justify-content: flex-start;
                gap: 0.9rem 1rem;
            }

            .hero {
                padding: 0.55rem;
            }

            .hero-inner {
                min-height: auto;
            }

            .hero-copy {
                padding: 1.35rem 0.6rem 0.4rem;
            }

            .hero-meta,
            .countdown,
            .stat-grid,
            .register-grid,
            .split-grid,
            .cta-banner,
            .about-grid {
                grid-template-columns: 1fr;
            }

            .register-card,
            .register-card.blue {
                grid-template-columns: 1fr;
            }

            .register-card .register-body,
            .register-card.blue .register-body {
                border: 0;
            }

            .hero-column {
                justify-items: start;
            }

            .feature-grid,
            .highlight-grid,
            .gallery-track,
            .sponsor-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .route-pills {
                grid-template-columns: 1fr;
            }

            .modal-grid,
            .modal-choice {
                grid-template-columns: 1fr;
            }

            .modal-backdrop {
                align-items: flex-start;
                padding: 0.5rem;
            }

            .modal-card {
                width: 100%;
                max-height: calc(100vh - 1rem);
                border-radius: 24px;
            }

            .modal-inner {
                max-height: calc(100vh - 1rem);
                padding: 1rem 0.95rem 0.95rem;
            }

            .modal-title {
                font-size: clamp(1.55rem, 7vw, 2.1rem);
            }

            .modal-lead {
                font-size: 0.95rem;
            }

            .modal-question {
                font-size: 1rem;
                margin-bottom: 0.85rem;
            }

            .modal-choice-media {
                min-height: 155px;
            }

            .modal-choice-body {
                padding: 0.9rem 0.9rem 0.95rem;
            }

            .modal-choice-header {
                gap: 0.6rem;
            }

            .modal-badge {
                flex-basis: 2.55rem;
                width: 2.55rem;
                height: 2.55rem;
                font-size: 1rem;
            }

            .modal-choice-title {
                font-size: 1.35rem;
            }

            .modal-skip {
                width: 100%;
                justify-content: center;
                text-align: center;
            }
        }

        @media (max-width: 640px) {
            .container {
                width: min(100% - 1rem, 1280px);
            }

            .hero-title {
                font-size: clamp(3.1rem, 18vw, 4.8rem);
            }

            .feature-grid,
            .highlight-grid,
            .gallery-track,
            .sponsor-grid {
                grid-template-columns: 1fr;
            }

            .timeline-item {
                grid-template-columns: 1fr;
                gap: 0.4rem;
            }

            .footer-bottom {
                flex-direction: column;
                align-items: flex-start;
            }

            .modal-backdrop {
                padding: 0.35rem;
            }

            .modal-card {
                border-radius: 20px;
            }

            .modal-inner {
                padding: 0.9rem 0.8rem 0.85rem;
            }

            .modal-brand {
                margin-bottom: 0.35rem;
            }

            .modal-title {
                line-height: 1.02;
            }

            .modal-grid {
                gap: 0.75rem;
            }

            .modal-choice {
                border-radius: 18px;
            }

            .modal-choice-media {
                min-height: 135px;
            }

            .modal-action {
                min-height: 2.7rem;
                padding-inline: 0.9rem;
            }
        }
    </style>
</head>
<body>
<div class="modal-backdrop" id="welcomeModal" role="dialog" aria-modal="true" aria-labelledby="welcomeModalTitle">
    <div class="modal-card">
        <button class="modal-close" type="button" aria-label="Tutup modal" data-modal-close>×</button>
        <div class="modal-inner">
            <div class="modal-brand">
                <div>Pawai Tatung</div>
                <small>BATAM | JILID 3</small>
            </div>
            <h2 class="modal-title" id="welcomeModalTitle">Selamat Datang di<br>Pawai Tatung Batam</h2>
            <p class="modal-lead">Jadilah bagian dari tradisi dan budaya yang penuh makna.</p>
            <div class="modal-separator" aria-hidden="true">❖</div>
            <div class="modal-question">Silakan lanjutkan ke pendaftaran peserta Tatung.</div>

            <div class="modal-grid">
                <article class="modal-choice red">
                    <figure class="modal-choice-media">
                        <img src="{{ asset('images/registration-tatung.png') }}" alt="Daftar sebagai peserta tatung">
                    </figure>
                    <div class="modal-choice-body">
                        <div class="modal-choice-header">
                            <div class="modal-badge">👥</div>
                            <h3 class="modal-choice-title">Daftar sebagai PESERTA TATUNG</h3>
                        </div>
                        <p>Ikut serta dalam prosesi sakral Pawai Tatung Jilid 3.</p>
                        <a href="{{ route('pendaftaran.tatung') }}" class="btn btn-primary modal-action" data-modal-close>Daftar Sekarang</a>
                    </div>
                </article>

            </div>

            <div class="modal-footer">
                <button class="modal-skip btn btn-warning" type="button" data-modal-close onclick="document.getElementById('welcomeModal').classList.remove('is-open');document.body.classList.remove('modal-open');">Tidak, baca informasi lebih lengkap dulu</button>
            </div>
        </div>
    </div>
</div>
<div class="site-shell">
    <div class="container">
        <header class="topbar" id="beranda">
            <a href="#beranda" class="brand" aria-label="Pawai Tatung Batam Kepri">
                <span class="brand-mark">PT</span>
                <span class="brand-text">
                    <h1>Pawai Tatung</h1>
                    <p>BATAM - KEPRI</p>
                </span>
            </a>

            <nav class="nav" aria-label="Navigasi utama">
                @foreach ($navLinks as $link)
                    <a href="{{ $link['href'] }}" @class(['active' => $loop->first])>{{ $link['label'] }}</a>
                @endforeach
            </nav>
        </header>

        <main class="hero">
            <section class="hero-inner hero-banner" aria-label="Hero Pawai Tatung" style="--hero-image: url('{{ asset('images/hero-banner.png') }}');">
                <div class="hero-copy">
                    <div>
                        <span class="eyebrow">Festival budaya dan spiritual</span>
                        <h2 class="hero-title">
                            <span class="line">Pawai</span>
                            <span class="line">Tatung</span>
                            <span class="line gold">Jilid 3</span>
                        </h2>
                        <p class="lead">Warisan, keberanian &amp; doa dalam satu langkah.</p>
                        <p class="sublead">Satu perayaan besar yang merangkai tradisi, spiritualitas, dan kebersamaan untuk Kepri yang lebih maju.</p>

                        <div class="hero-actions">
                            <a href="{{ route('pendaftaran.tatung') }}" class="btn btn-primary">Daftar Peserta</a>
                            <a href="#tentang" class="btn btn-secondary">Tentang Pawai</a>
                        </div>
                    </div>

                    <div>
                        <div class="hero-meta">
                            <div class="meta-chip">
                                <span class="mark">1</span>
                                <div><strong>Tanggal</strong><span>27 September 2026</span></div>
                            </div>
                            <div class="meta-chip">
                                <span class="mark">2</span>
                                <div><strong>Lokasi</strong><span>Batam - Kepulauan Riau</span></div>
                            </div>
                            <div class="meta-chip">
                                <span class="mark">3</span>
                                <div><strong>Tema</strong><span>Pawai Tatung dan Budaya Nasional serta Malam Festival Mooncake</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <section class="section" aria-label="Nilai utama">
            <div class="section-inner">
                <div class="feature-grid">
                    @foreach ($pillars as $pillar)
                        <article class="feature-card">
                            <div class="glyph" aria-hidden="true">
                                @switch($pillar['icon'])
                                    @case('temple')
                                        <svg viewBox="0 0 24 24" fill="none">
                                            <path class="stroke" d="M4 9.5L12 4l8 5.5" />
                                            <path class="stroke" d="M6 9.5V18h12V9.5" />
                                            <path class="stroke" d="M9 18v-5h6v5" />
                                            <path class="stroke" d="M7 12h10" />
                                        </svg>
                                        @break
                                    @case('lotus')
                                        <svg viewBox="0 0 24 24" fill="none">
                                            <path class="stroke" d="M12 19c3.5 0 6-2.2 6-5 0-2.6-1.9-4.6-4.6-5.5" />
                                            <path class="stroke" d="M12 19c-3.5 0-6-2.2-6-5 0-2.6 1.9-4.6 4.6-5.5" />
                                            <path class="stroke" d="M12 8c1.8 0 3.3-1.5 3.3-3.3-.9.1-2 .6-3.3 1.8-1.3-1.2-2.4-1.7-3.3-1.8C8.7 6.5 10.2 8 12 8Z" />
                                            <path class="stroke" d="M7 18.5h10" />
                                        </svg>
                                        @break
                                    @case('drum')
                                        <svg viewBox="0 0 24 24" fill="none">
                                            <path class="stroke" d="M7 7.5h10v9H7z" />
                                            <path class="stroke" d="M5 10h2M17 10h2" />
                                            <path class="stroke" d="M9 7.5V5.8C9 4.8 9.8 4 10.8 4h2.4C14.2 4 15 4.8 15 5.8v1.7" />
                                            <path class="stroke" d="M9 16.5v2M15 16.5v2" />
                                        </svg>
                                        @break
                                    @case('hands')
                                        <svg viewBox="0 0 24 24" fill="none">
                                            <path class="stroke" d="M6 12c1.4 0 2.5 1.1 2.5 2.5V19" />
                                            <path class="stroke" d="M18 12c-1.4 0-2.5 1.1-2.5 2.5V19" />
                                            <path class="stroke" d="M8.5 14.5 12 11l3.5 3.5" />
                                            <path class="stroke" d="M4.5 15.5c1.3-1 2.7-1.5 4-1.5h7c1.3 0 2.7.5 4 1.5" />
                                        </svg>
                                        @break
                                    @case('island')
                                        <svg viewBox="0 0 24 24" fill="none">
                                            <path class="stroke" d="M5 17c2.1-2 4.3-3 7-3s4.9 1 7 3" />
                                            <path class="stroke" d="M7.2 16.2c.8-2.6 2.3-5.3 4.8-7.2 2.4 1.9 4 4.6 4.8 7.2" />
                                            <path class="stroke" d="M12 5.5v2.2" />
                                            <path class="stroke" d="M10.6 7.2 12 5.5l1.4 1.7" />
                                        </svg>
                                        @break
                                @endswitch
                            </div>
                            <h3>{{ $pillar['title'] }}</h3>
                            <p>{{ $pillar['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section" id="tentang">
            <div class="section-inner">
                <h2 class="section-heading">Menuju Pawai Tatung Jilid 3</h2>
                <p class="section-copy">Bersiaplah untuk menyaksikan kemeriahan dan keberanian Tatung di Kota Batam.</p>
                <div class="countdown" data-countdown data-target="{{ $eventDate->format('c') }}">
                    @foreach ($countdown as $item)
                        <div class="count-card">
                            <strong data-countdown-unit="{{ $item['key'] }}">{{ $item['value'] }}</strong>
                            <span>{{ $item['label'] }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="about-grid" style="margin-top: 1.25rem;">
                    <figure class="about-media">
                        <img src="{{ asset('images/about-tatung.png') }}" alt="Peserta Tatung">
                    </figure>
                    <article class="about-copy">
                        <span class="section-tag">Tentang</span>
                        <h3>Tentang Pawai Tatung</h3>
                        <p>Pawai Tatung adalah tradisi budaya dan spiritual yang telah menjadi bagian penting dari masyarakat Tionghoa di Batam dan Kepulauan Riau. Di mana para Tatung menunjukkan keteguhan iman, keberanian, serta pengabdian melalui arak-arakan megah yang sarat makna.</p>
                        <p>Lebih dari sekadar tradisi, Pawai Tatung adalah simbol persatuan, keberagaman, dan doa bersama untuk keselamatan serta kemajuan masyarakat.</p>

                        <div class="stat-grid">
                            <div class="stat-card">
                                <div class="stat-icon" aria-hidden="true">
                                    B
                                </div>
                                <strong>70+</strong>
                                <span>Peserta Tatung dari berbagai daerah</span>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon" aria-hidden="true">
                                    S
                                </div>
                                <strong>Spiritual</strong>
                                <span>Ritual sakral dan doa untuk keselamatan</span>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon" aria-hidden="true">
                                    T
                                </div>
                                <strong>Tradisi</strong>
                                <span>Tradisi budaya yang dilestarikan</span>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon" aria-hidden="true">
                                    K
                                </div>
                                <strong>Kebersamaan</strong>
                                <span>Persatuan dalam keberagaman</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" aria-label="Highlight acara">
            <div class="section-inner">
                <h2 class="section-heading">Highlight Acara</h2>
                <div class="highlight-grid">
                    @foreach ($highlights as $item)
                        <article class="highlight-card">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                            <div class="body">
                                <h4>{{ $item['title'] }}</h4>
                                <p>{{ $item['text'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section" id="daftar">
            <div class="section-inner">
                <h2 class="section-heading">Bergabung dalam Pawai Tatung Jilid 3</h2>
                <p class="section-copy">Daftarkan diri Anda dan jadilah bagian dari kemeriahan budaya dan spiritual ini.</p>

                <div class="register-grid">
                    @foreach ($registrationCards as $card)
                        <article class="register-card {{ $card['accent'] }}">
                            @if ($card['accent'] === 'red')
                                <figure class="register-media">
                                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}">
                                </figure>
                            @endif
                            <div class="register-body">
                                <h3>{{ $card['title'] }}</h3>
                                <p>{{ $card['text'] }}</p>
                                <ul class="checklist">
                                    @foreach ($card['points'] as $point)
                                        <li>{{ $point }}</li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('pendaftaran.tatung') }}" class="btn btn-primary">{{ $card['button'] }}</a>
                            </div>
                            @if ($card['accent'] === 'blue')
                                <figure class="register-media">
                                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}">
                                </figure>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section" id="acara" style="display: none;">
            <div class="section-inner">
                <div class="split-grid">
                    <article class="timeline-card">
                        <h3>Rangkaian Acara</h3>
                        <ul class="timeline-list">
                            @foreach ($schedule as $item)
                                <li class="timeline-item">
                                    <span class="timeline-time">{{ $item['time'] }}</span>
                                    <div>
                                        <strong>{{ $item['title'] }}</strong>
                                        <span>{{ $item['place'] }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div style="margin-top: 1rem; text-align: center;">
                            <a href="#kontak" class="btn btn-secondary">Lihat Detail Acara</a>
                        </div>
                    </article>

                    <article class="route-card">
                        <h3>Rute Pawai</h3>
                        <div class="route-map">
                            <span class="pin start">START<br>Vihara Duta Maitreya</span>
                            <span class="pin finish">FINISH<br>Waterfront City</span>
                            <svg viewBox="0 0 1100 600" preserveAspectRatio="none" aria-hidden="true">
                                <path d="M120 120 C 220 90, 320 130, 410 150 S 580 240, 650 190 S 810 110, 930 150" fill="none" stroke="rgba(55, 152, 96, 0.8)" stroke-width="6" stroke-linecap="round" stroke-dasharray="12 12" />
                                <path d="M120 120 C 220 90, 320 130, 410 150 S 580 240, 650 190 S 810 110, 930 150" fill="none" stroke="#e43a33" stroke-width="5" stroke-linecap="round" />
                                <circle cx="120" cy="120" r="10" fill="#315a2e" />
                                <circle cx="930" cy="150" r="10" fill="#b42323" />
                                <circle cx="250" cy="118" r="6" fill="#315a2e" />
                                <circle cx="420" cy="150" r="6" fill="#315a2e" />
                                <circle cx="650" cy="190" r="6" fill="#315a2e" />
                                <circle cx="810" cy="120" r="6" fill="#315a2e" />
                            </svg>
                        </div>

                        <div class="route-summary">
                            <div>Rute: Vihara Duta Maitreya - Nagoya - Batu Aji - Harbour Bay - Waterfront City</div>
                            <div class="route-pills">
                                <div class="pill">
                                    <div><strong>8 KM</strong><span>Jarak tempuh</span></div>
                                </div>
                                <div class="pill">
                                    <div><strong>4 - 5 Jam</strong><span>Durasi pawai</span></div>
                                </div>
                                <div class="pill">
                                    <div><strong>Penuh Makna</strong><span>Setiap langkah</span></div>
                                </div>
                            </div>
                            <div style="text-align: center; margin-top: .25rem;">
                                <a href="#" class="btn btn-secondary">Lihat Rute di Google Maps</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="sponsor">
            <div class="section-inner">
                <h2 class="section-heading">Sponsor &amp; Partner</h2>
                <div class="sponsor-grid">
                    @foreach ($sponsors as $sponsor)
                        <div class="sponsor-card">{{ $sponsor }}</div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section" id="kontak">
            <div class="section-inner">
                <div class="cta-banner">
                    <div class="cta-copy">
                        <h3>Mari Menjadi Bagian dari Pawai Tatung Jilid 3</h3>
                        <p>Bersama kita lestarikan budaya, perkuat persatuan, dan wujudkan doa untuk Kepri lebih maju.</p>
                        <div class="cta-actions">
                            <a href="{{ route('pendaftaran.tatung') }}" class="btn btn-primary">Daftar Sekarang</a>
                            <a href="#" class="btn btn-secondary">Download Poster</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="footer-panel">
                <div class="footer-grid">
                    <div class="footer-brand">
                        <h4>Pawai Tatung</h4>
                        <p>Warisan, keberanian &amp; doa untuk Batam, Kepri, dan masyarakat yang ingin menjaga tradisi tetap hidup.</p>
                        <div class="social" style="margin-top: 1rem;">
                            <a href="#" aria-label="Instagram">IG</a>
                            <a href="#" aria-label="Facebook">FB</a>
                            <a href="#" aria-label="YouTube">YT</a>
                            <a href="#" aria-label="TikTok">TT</a>
                        </div>
                    </div>

                    <div class="footer-col">
                        <h5>Menu</h5>
                        <ul>
                            @foreach (['Beranda', 'Tentang', /*'Rangkaian Acara',*/ 'Pendaftaran', 'Galeri', 'Kontak'] as $item)
                                <li><a href="#">{{ $item }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h5>Informasi</h5>
                        <ul>
                            <li><span>27 September 2026</span></li>
                            <li><span>Nagoya - Batu Aji, Batam</span></li>
                            <li><span>info@pawaitatung.co.id</span></li>
                            <li><span>+62 812 3456 7890</span></li>
                        </ul>
                    </div>

                    <div class="footer-col">
                        <h5>Quick Link</h5>
                        <ul>
                            <li><a href="{{ route('pendaftaran.tatung') }}">Pendaftaran Tatung</a></li>
                            <li><a href="#acara">Rute Pawai</a></li>
                            <li><a href="#tentang">FAQ</a></li>
                        </ul>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div>&copy; 2026 Pawai Tatung Jilid 3 - Batam, Kepri. All rights reserved.</div>
                    <div>Dibuat dengan cinta untuk melestarikan budaya.</div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script>
    (function () {
        const modal = document.getElementById('welcomeModal');
        const modalCooldownKey = 'pawai-tatung-welcome-modal-hidden-until';
        const modalCooldownMs = 30 * 60 * 1000;

        function getStoredUntil() {
            try {
                return Number(window.localStorage.getItem(modalCooldownKey) || 0);
            } catch (error) {
                return 0;
            }
        }

        function setStoredUntil(timestamp) {
            try {
                window.localStorage.setItem(modalCooldownKey, String(timestamp));
            } catch (error) {
                return;
            }
        }

        function shouldShowModal() {
            const storedUntil = getStoredUntil();
            return !storedUntil || Date.now() >= storedUntil;
        }

        function openModal() {
            if (!modal) return;
            modal.classList.add('is-open');
            document.body.classList.add('modal-open');
        }

        function closeModal() {
            if (!modal) return;
            modal.classList.remove('is-open');
            document.body.classList.remove('modal-open');
        }

        if (modal) {
            if (shouldShowModal()) {
                openModal();
            } else {
                closeModal();
            }

            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    setStoredUntil(Date.now() + modalCooldownMs);
                    closeModal();
                }
            });
        }

        document.addEventListener('click', function (event) {
            const trigger = event.target.closest('[data-modal-close]');
            if (!trigger) return;

            event.preventDefault();
            setStoredUntil(Date.now() + modalCooldownMs);
            closeModal();

            if (trigger.tagName === 'A' && trigger.getAttribute('href')) {
                const href = trigger.getAttribute('href');
                if (href.startsWith('#')) {
                    window.location.hash = href;
                } else {
                    window.location.href = href;
                }
            }
        });

        const countdown = document.querySelector('[data-countdown]');
        if (!countdown) return;

        const target = new Date(countdown.dataset.target).getTime();
        const units = {
            days: countdown.querySelector('[data-countdown-unit="days"]'),
            hours: countdown.querySelector('[data-countdown-unit="hours"]'),
            minutes: countdown.querySelector('[data-countdown-unit="minutes"]'),
            seconds: countdown.querySelector('[data-countdown-unit="seconds"]')
        };

        function format(value) {
            return String(value).padStart(2, '0');
        }

        function updateCountdown() {
            const diff = Math.max(0, target - Date.now());
            const totalSeconds = Math.floor(diff / 1000);
            const days = Math.floor(totalSeconds / 86400);
            const hours = Math.floor((totalSeconds % 86400) / 3600);
            const minutes = Math.floor((totalSeconds % 3600) / 60);
            const seconds = totalSeconds % 60;

            if (units.days) units.days.textContent = days;
            if (units.hours) units.hours.textContent = format(hours);
            if (units.minutes) units.minutes.textContent = format(minutes);
            if (units.seconds) units.seconds.textContent = format(seconds);
        }

        updateCountdown();
        window.setInterval(updateCountdown, 1000);
    })();
</script>
</body>
</html>
