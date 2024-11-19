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
                </ul>
            </div>
        </div>
    </nav>
    <main>
    <section class="section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <h2>Hasil Pencarian</h2>
                    @if($results->isEmpty())
                        <p>Tidak ada hasil untuk pencarian "{{ request('query') }}"</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>No. Registrasi</th>
                                    <th>Diagnosa</th>
                                    <th>Resep Obat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($results as $no => $result)
                                    <tr>
                                        <td>{{ $no + 1 }}</td> <!-- Penomoran otomatis -->
                                        <td>{{ $result->nama }}</td>
                                        <td>{{ $result->no_reg }}</td>
                                        <td>{{ $result->diagnosa }}</td>
                                        <td>{{ $result->resep_obat }}</td>
                                        <td>
                                        <a href="{{ route('edit', ['id' => $result->id]) }}?no_reg={{ $result->no_reg }}&nama={{ $result->nama }}#keluhan" class="btn btn-success">Edit</a>
                                        <form action="{{ route('delete', ['id' => $result->id]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>



