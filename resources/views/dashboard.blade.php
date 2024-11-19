<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Body+Gretesque:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #44b14e;
            font-weight: bold;
            font-size: 24px;
        }

        .search-form {
            display: flex;
            align-items: center;
            margin-left: auto; /* Align to the right */
        }

        .search-input {
            width: 200px;
            height: 35px;
            margin-right: 10px;
        }

        h2 {
          font-family: 'Body Gretesque Fit', sans-serif;
          font-weight: 700; /* Set a bold font weight */
          letter-spacing: 0.05em; /* Slightly increase letter spacing for a cleaner look */
          text-transform: uppercase;
        }

        .carousel-inner img {
            width: 100%;
            height: auto; /* Maintain aspect ratio */
        }

        main {
            flex: 1; /* Allow main to grow and take remaining space */
        }

        .section {
            padding: 20px;
        }

        .Lokasi {
            background-color: #f8f9fa;
            padding: 20px 0;
        }

        .Lokasi h2 {
            color: #44b14e;
        }

        .Lokasi h5 {
            color: #333;
            margin-top: 20px;
        }
        /* Responsive styles */
        @media (max-width: 768px) {
            .search-input {
                width: 150px; /* Adjust search input for smaller screens */
            }
            .navbar-nav {
                flex-direction: column; /* Stack navbar items */
            }
        }
    </style>
    <title>KLINIK KURNIA MEDIKA</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="img/logo-fiks.png" alt="Klinik Kurnia Medika" style="height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/regist') }}" style="color:#44b14e;">Registrasi</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/dokter') }}" style="color:#44b14e;">Dokter Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/farmasi') }}" style="color:#44b14e;">Farmasi Dashboard</a>
                    </li>
                </ul>
                <form class="search-form">
                    <input class="form-control search-input" type="search" placeholder="Search" />
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav ms-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="color:#44b14e;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('/login') }}">Login</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item" style="margin-left : 15px; background: none; border: none; color: inherit; padding: 0; text-align: left; cursor: pointer;">
                                    Logout
                                </button>
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="Menu section">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <div style="display: flex; justify-content: center; margin-top: 15px;">
                        <img src="img/dokum.png" class="d-block w-50" alt="...">
                    </div>
                    </div>
                    <div class="carousel-item">
                    <div style="display: flex; justify-content: center; margin-top: 15px;">
                        <img src="img/dokgi.png" class="d-block w-50" alt="...">
                    </div>
                    </div>
                    <div class="carousel-item">
                    <div style="display: flex; justify-content: center; margin-top: 15px;">
                        <img src="img/bidan.png" class="d-block w-50" alt="...">
                    </div>
                    </div>
                    <div class="carousel-item">
                    <div style="display: flex; justify-content: center; margin-top: 15px;">
                        <img src="img/lab.png" class="d-block w-50" alt="...">
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <section class="Lokasi Klinik section">
        <div class="container">
        <h2 class="col-md-6" style="color:#44b14e;">Lokasi</h2>
        <h2 class="col-md-6" style="color:#44b14e;">Klinik Kurnia Medika</h2>
        <div class="row">
            <div class="col-md-6">
                <h5  style="color:#44b14e;" >Alamat</h5>
                <p> Ruko, Jl. Green Leaf Residence No.1 Blok A, Mekarsari, Kec. Rajeg, Kabupaten Tangerang, Banten</p>
                <h5  style="color:#44b14e;">Jam Operasional</h5>
                <p>
                    Senin - Jumat: 08.00 - 17.00
                    <br>Sabtu: 08.00 - 14.00
                    <br>Minggu: Tutup
                </p>
            </div>
            <div class="col-md-6">
            <h5  style="color:#44b14e;">Peta Lokasi</h5>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15867.927550375822!2d106.52436521738282!3d-6.133135599999991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e41ff002ec40025%3A0xc4ecc099281fb51f!2sKlinik%20Kurnia%20Medika%20Rajeg!5e0!3m2!1sid!2sid!4v1726919047370!5m2!1sid!2sid" 
              width="550" 
              height="300" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
            </div>
        </section>
        <footer style="background-color: #44b14e; padding: 5px;">
    <div class="container">
            <div class="row text-center mt-4">
            <p>© Copyright 2024. Klinik Kurnia Medika.</p>
        </div>
    </div>
</footer>
    </main>
</body>
</html>
