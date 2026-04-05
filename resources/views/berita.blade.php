<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food | Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fff; }
        
        /* Hero Section */
        .hero-news {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1490818387583-1baba5e638af?q=80&w=1500');
            background-size: cover;
            background-position: center;
            height: 450px;
            display: flex;
            align-items: center;
            color: white;
        }

        /* Card Customization */
        .card-news {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: 0.3s;
            overflow: hidden;
            height: 100%;
        }
        .card-news:hover { transform: translateY(-10px); }
        .card-news img { height: 220px; object-fit: cover; }
        
        .btn-black {
            background: #000;
            color: #fff;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            border: none;
        }

        .link-selengkapnya {
            color: #f39c12;
            text-decoration: none;
            font-weight: 700;
            font-size: 13px;
        }

        footer { background: #111; color: #ccc; padding: 80px 0 20px; }
        .social-icon {
            width: 40px; height: 40px;
            background: #333;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark position-absolute w-100 mt-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">TASTY FOOD</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/tentang') }}">TENTANG</a></li>
                    <li class="nav-item"><a class="nav-link active fw-bold" href="#">BERITA</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">GALERI</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">KONTAK</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-news">
        <div class="container">
            <h1 class="display-3 fw-bold">BERITA KAMI</h1>
        </div>
    </header>

    <section class="py-5 my-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=800" class="img-fluid rounded-5 shadow-lg" alt="Main News">
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <h2 class="fw-bold mt-4">APA SAJA MAKANAN KHAS NUSANTARA?</h2>
                    <p class="text-muted my-4">Indonesia memiliki keberagaman kuliner yang tak terhitung jumlahnya. Dari Sabang sampai Merauke, setiap daerah memiliki cita rasa unik yang menggunakan rempah-rempah asli pilihan. Mari telusuri lebih dalam mengenai kekayaan rasa kita.</p>
                    <button class="btn btn-black">BACA SELENGKAPNYA</button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <h3 class="fw-bold mb-5">BERITA LAINNYA</h3>
            <div class="row g-4">
                @php
                    // Data dummy agar gambar dan judul beda-beda
                    $berita = [
                        ['img' => 'photo-1504674900247-0877df9cc836', 'title' => 'Rahasian Bumbu Rendang'],
                        ['img' => 'photo-1540189549336-e6e99c3679fe', 'title' => 'Salad Segar Ala Resto'],
                        ['img' => 'photo-1567620905732-2d1ec7bb7445', 'title' => 'Pancake Madu Pagi Hari'],
                        ['img' => 'photo-1484723088339-fe28233e56af', 'title' => 'Toast Buah Berry'],
                        ['img' => 'photo-1476514525535-07fb3b4ae5f1', 'title' => 'Sate Ayam Madura'],
                        ['img' => 'photo-1473093226795-af9932fe5856', 'title' => 'Pasta Italia Autentik'],
                        ['img' => 'photo-1565299624946-b28f40a0ae38', 'title' => 'Pizza Tungku Arang'],
                        ['img' => 'photo-1482049016688-2d3e1b311543', 'title' => 'Sandwich Sehat Siang Hari'],
                    ];
                @endphp

                @foreach($berita as $item)
                <div class="col-md-6 col-lg-3">
                    <div class="card card-news">
                        <img src="https://images.unsplash.com/{{ $item['img'] }}?q=80&w=500" class="card-img-top" alt="News">
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-uppercase">{{ $item['title'] }}</h5>
                            <p class="text-muted small">Mengenal lebih jauh tentang teknik memasak dan pemilihan bahan baku yang berkualitas tinggi...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="link-selengkapnya">baca selengkapnya</a>
                                <span class="text-muted fw-bold">...</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <h4 class="text-white fw-bold mb-4">Tasty Food</h4>
                    <p>Tempat terbaik untuk mengeksplorasi dunia kuliner nusantara dan internasional dengan ulasan mendalam dari para ahli masak.</p>
                    <div class="mt-4">
                        <a href="#" class="social-icon">FB</a>
                        <a href="#" class="social-icon">IG</a>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <h5 class="text-white fw-bold mb-4">Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-muted">Blog</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Galeri</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h5 class="text-white fw-bold mb-4">Privacy</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-muted">Karir</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="text-white fw-bold mb-4">Contact Info</h5>
                    <p class="mb-1">📧 tastyfood@gmail.com</p>
                    <p class="mb-1">📞 +62 812 3456 7890</p>
                    <p>📍 Kota Bandung, Jawa Barat</p>
                </div>
            </div>
            <hr class="mt-5 border-secondary">
            <p class="text-center small mb-0">Copyright © 2026 Tasty Food Project.</p>
        </div>
    </footer>

</body>
</html>