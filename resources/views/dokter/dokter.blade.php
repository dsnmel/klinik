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

        h2, h4 {
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

        .Lokasi h2, .Lokasi h4 {
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
                <img src="img/logo-fiks.png" alt="Klinik Kurnia Medika" style="height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/dokter') }}" style="color:#44b14e;">Dokter Dashboard</a>
                    </li>
                </ul>
                <form class="search-form">
                    <input class="form-control search-input" type="search" placeholder="Search" />
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav ms-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" style="color: #44b14e;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="login.php">Login</a></li>
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
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="Layanan section py-5">
            <div class="container">
                <h2 class="mb-4">Dokter Dashboard</h2>
            </div>
        </section>

        <section>
            <div class="container">
                <h4 class="mb-3">Daftar Pasien</h4>
                <table class="table mt-3 container">
                    <thead>
                        <tr>
                            <th>No Antrian</th>
                            <th>No Registrasi</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Tujuan</th>
                            <th>Nomor Telepon</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $no => $data)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $data->no_reg }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->kelamin }}</td>
                                <td>{{ $data->ttl }}</td>
                                <td>{{ $data->tujuan }}</td>
                                <td>{{ $data->no_hp }}</td>
                                <td>
                                    <a href="?no_reg={{ $data->no_reg }}&nama={{ $data->nama }}#keluhan" class="btn btn-success">Action</a>
                                </td>
                                <td>
                                    <form action="{{ route('dokter.hapus', $data->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <section class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <h4 class="mb-3">Formulir Diagnosa</h4>
            <div class="col-md-6">
                <form id="keluhan" action="{{ route('farmasi.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">No Registrasi</label>
                        <input type="text" name="no_reg" class="form-control" placeholder="No Registrasi" value="{{ request()->get('no_reg') }}" readonly required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="{{ request()->get('nama') }}" readonly required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Diagnosa</label>
                        <input type="text" name="diagnosa" class="form-control" placeholder="Diagnosa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Resep Obat</label>
                        <input type="text" name="resep_obat" class="form-control" placeholder="Resep Obat" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Kirim Farmasi</button>
                    </div>
                </form>
            </div>
        </section>

        <section class="Layanan section py-5">
            <div class="container">
                <h2 class="mb-4">Layanan Kami</h2>
            </div>
        </section>
    </main>

    <footer style="background-color: #44b14e; padding: 5px 0; width: 100%; position: relative; bottom: 0;">
        <div class="container">
            <div class="row text-center mt-4">
                <p>© Copyright 2024. Klinik Kurnia Medika.</p>
            </div>
        </div>
    </footer>
</body>
</html>
