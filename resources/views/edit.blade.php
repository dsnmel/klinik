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
            background-color: #f8f9fa; /* Light background for contrast */
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
            font-family: 'Body Gretesque', sans-serif;
            font-weight: 700; /* Set a bold font weight */
            letter-spacing: 0.05em; /* Slightly increase letter spacing for a cleaner look */
            text-transform: uppercase;
            color: #44b14e; /* Consistent theme color */
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

        /* Centering the form */
        #reservation-form {
            max-width: 500px; /* Control the form width */
            margin: 0 auto; /* Center the form */
            background-color: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow for depth */
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
                <img src="{{ asset('img/logo-fiks.png') }}" style="height: 50px;" class="d-block w-100 mt-2" alt="Klinik Kurnia Medika">
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
                        <a class="nav-link active" aria-current="page" href="{{ url('/arsip') }}" style="color:#44b14e;">Arsip Pasien</a>
                    </li>
                    </li>
                    <form action="{{ route('arsip') }}" method="GET" class="search-form" style="margin-left: 500px;">
                        <input class="form-control search-input" type="text" name="query" placeholder="Search" />
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav ms-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="margin-left: 30px; color: #44b14e;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="register.php">Sign Up</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="Lokasi Klinik section">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <!-- Kolom teks -->
                    <div class="col-md-6">
                        <h2>Layanan Kesehatan Unggulan dari Klinik</h2>
                        <p>Untuk Kesehatan Anda dan Keluarga</p>
                        <a href="#reservation" class="btn btn-success">Pesan Sekarang</a>
                    </div>
                    <!-- Kolom gambar -->
                    <div class="col-md-6">
                    <img src="{{ asset('img/dokgi.png') }}" class="d-block w-100 mt-2" alt="Gambar Dokter">
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h2>Form Pengisian Data Reservasi</h2>
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="col-md-6">
                        <form id="keluhan" action="{{ route('regist.submit')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                                <label class="form-label">No Antrian</label>
                                <input type="text" name= "antrian" class="form-control" placeholder="Antrian" required>
                            </div>
                        <div class="mb-3">
                                <label class="form-label">No Registrasi</label>
                                <input type="text" name= "no_reg" class="form-control" placeholder="No Registrasi" 
                                value="{{ request()->get('no_reg') }}" readonly required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" 
                                value="{{ request()->get('nama') }}" readonly required>
                            </div>

                            <div class="mb-3">
                                <label for="poli" class="form-label">Jenis Kelamin</label>
                                <select id="poli" name="kelamin" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="ttl" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="poli" class="form-label">Tujuan</label>
                                <select id="poli" name="tujuan" class="form-control" required>
                                    <option value=""> Tujuan </option>
                                    <option value="Dokter Umum">Dokter Umum</option>
                                    <option value="Dokter Gigi">Dokter Gigi</option>
                                    <option value="Bidan dan Persalinan">Bidan</option>
                                    <option value="Laboratorium">Lab</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nomor Telepon</label>
                                <div class="d-flex">
                                    <input type="text" name ="no_hp" class="form-control" placeholder="Nomor Telepon" required>
                                </div>
                            </div>
                            <!-- Tombol Daftar dan Print -->
                            <div class="mb-3">
                            <button type="submit" class="btn btn-success">Daftar & Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="Layanan section py-5">
            <div class="container">
                <h2 class="mb-4">Layanan Kami</h2>
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