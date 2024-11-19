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

        h4 {
            font-family: 'Body Gretesque', sans-serif;
            font-weight: 700; /* Set a bold font weight */
            letter-spacing: 0.05em; /* Slightly increase letter spacing for a cleaner look */
            text-transform: uppercase;
            color: #44b14e;
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
        .Lokasi h4 {
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
                        <a class="nav-link active" aria-current="page" href="{{ url('/farmasi') }}" style="color:#44b14e;">Farmasi Dashboard</a>
                    </li>
                    </li>
                    <form class="search-form" style="margin-left: 550px;">
                        <input class="form-control search-input" type="search" placeholder="Search" />
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav ms-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="margin-left: 30px; color: #44b14e;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <section class="Layanan section py-5">
            <div class="container">
                <h2 class="mb-4">Farmasi Dashboard</h2>
            </div>
    </section>
    <section>
    <div class="container">
        <h4 class="mb-3">Daftar Pasien</h4>
        <table class="table mt-3 container">
            <tr>
                <th>No Antrian</th>
                <th>No Registrasi</th>
                <th>Nama Lengkap</th>
                <th>Diagnosa</th>
                <th>Resep Obat</th>
                <th>Action</th>
                <th>Status</th>
            </tr>
            @foreach ($farmasi as $no=>$data)
                <tr>
                    <th>{{ $no+1 }}</th> 
                    <th>{{ $data->no_reg }}</th>
                    <th>{{ $data->nama }}</th>
                    <th>{{ $data->diagnosa }}</th>
                    <th>{{ $data->resep_obat }}</th>
                    <td>
                    <a href="?no_reg={{ $data->no_reg }}&nama={{ $data->nama }}#farmasi" class="btn btn-success">Action</a>
                </td>
                <td>
                    <form action="{{ route('farmasi.delete', $data->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </table>
    </section>
    <section class="section">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h2>Form Tebusan Obat</h2>
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="col-md-6">
                        <form id="farmasi" action="{{ route('farmasi.print')}}" method="POST">
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
                                <label for="poli" class="form-label">Harga Pengobatan</label>
                                <select id="poli" class="form-control" required onchange="updateForm()">
                                    <option value="">Pilih Layanan</option>
                                    <option value="umum">Dokter Umum</option>
                                    <option value="gigi">Dokter Gigi</option>
                                    <option value="bidan">Bidan</option>
                                    <option value="lab">Laboratorium</option>
                                </select>
                            </div>

                            <input type="hidden" name="poli" id="poliHidden" value="">
                            <input type="hidden" name="harga" id="hargaHidden" value="">

                            <div id="additionalFields" class="mb-3"></div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Total Harga (Rp)</label>
                                <input type="text" id="harga" class="form-control" readonly>
                            </div>
                                    </div>
                                        <div class="mb-3">
                                        <button type="button" class="btn btn-success" onclick="printData()">Cetak</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
        <script>
        function updateForm() {
            // Mengambil elemen dropdown dan field untuk menampilkan harga
            const poli = document.getElementById('poli').value;
                const harga = document.getElementById('harga');
                const poliHidden = document.getElementById('poliHidden');
                const hargaHidden = document.getElementById('hargaHidden');

            // Reset field tambahan dan harga
            additionalFields.innerHTML = '';
            harga.value = '';

            // Logic if-else berdasarkan pilihan dropdown
            if (poli === 'umum') {
                harga.value = '15.000';
                additionalFields.innerHTML = `
                    <label for="obat" class="form-label">Obat Farmasi</label>
                    <input type="text" id="obat" class="form-control" placeholder="Masukkan obat yang diperlukan">
                `;
            } else if (poli === 'gigi') {
                additionalFields.innerHTML = `
                    <label for="perawatan" class="form-label">Jenis Perawatan Gigi</label>
                    <select id="perawatan" class="form-control" onchange="updateHargaGigi()">
                        <option value="">Pilih Perawatan</option>
                        <option value="karang">Pembersihan Karang Gigi - Rp. 470.000</option>
                        <option value="tambal">Tambal Gigi - Rp. 200.000</option>
                    </select>
                `;
            } else if (poli === 'bidan') {
                additionalFields.innerHTML = `
                    <label for="layananBidan" class="form-label">Layanan Bidan</label>
                    <select id="layananBidan" class="form-control" onchange="updateHargaBidan()">
                        <option value="">Pilih Layanan</option>
                        <option value="usg">USG - Rp. 100.000</option>
                        <option value="lahir">Melahirkan - Rp. 1.500.000</option>
                    </select>
                `;
            } else if (poli === 'lab') {
                additionalFields.innerHTML = `
                    <label for="layananLab" class="form-label">Jenis Pemeriksaan Lab</label>
                    <select id="layananLab" class="form-control" onchange="updateHargaLab()">
                        <option value="">Pilih Pemeriksaan</option>
                        <option value="paru">Cek Paru-Paru - Rp. 300.000</option>
                        <option value="darah">Cek Darah - Rp. 150.000</option>
                    </select>
                `;
            }
        }

        // Fungsi tambahan untuk mengupdate harga berdasarkan layanan Dokter Gigi
        function updateHargaGigi() {
            const perawatan = document.getElementById('perawatan').value;
            const harga = document.getElementById('harga');

            if (perawatan === 'karang') {
                harga.value = '470.000';
            } else if (perawatan === 'tambal') {
                harga.value = '200.000';
            } else {
                harga.value = '';
            }
        }

        // Fungsi tambahan untuk mengupdate harga berdasarkan layanan Bidan
        function updateHargaBidan() {
            const layananBidan = document.getElementById('layananBidan').value;
            const harga = document.getElementById('harga');

            if (layananBidan === 'usg') {
                harga.value = '100.000';
            } else if (layananBidan === 'lahir') {
                harga.value = '1.500.000';
            } else {
                harga.value = '';
            }
        }

        // Fungsi tambahan untuk mengupdate harga berdasarkan layanan Lab
        function updateHargaLab() {
            const layananLab = document.getElementById('layananLab').value;
            const harga = document.getElementById('harga');

            if (layananLab === 'paru') {
                harga.value = '300.000';
            } else if (layananLab === 'darah') {
                harga.value = '150.000';
            } else {
                harga.value = '';
            }
        }

        function printData() {
            const noReg = document.querySelector('input[name="no_reg"]').value;
            const nama = document.querySelector('input[name="nama"]').value;
            const poli = document.getElementById('poli').value;
            const harga = document.getElementById('harga').value;
            const obat = document.getElementById('obat') ? document.getElementById('obat').value : '';
            const perawatan = document.getElementById('perawatan') ? document.getElementById('perawatan').value : '';
            const layananBidan = document.getElementById('layananBidan') ? document.getElementById('layananBidan').value : '';
            const layananLab = document.getElementById('layananLab') ? document.getElementById('layananLab').value : '';

            // Open a new window for printing
            let printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write(`
                <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Struk Cetak</title>
                    <style>
                        @media print {
                            body {
                                font-family: Arial, sans-serif;
                                font-size: 11px;
                                line-height: 1.4em;
                                width: 58mm;
                                margin: 0;
                                padding: 0;
                            }

                            .receipt {
                                padding: 0;
                                margin: 0;
                                width: 58mm;
                            }

                            .receipt-header {
                                text-align: center;
                                font-size: 12px;
                                font-weight: bold;
                                margin-bottom: 10px;
                            }

                            .receipt-header p {
                                margin: 0;
                            }

                            .receipt-details {
                                margin-top: 10px;
                                border-bottom: 1px dashed #000;
                                padding-bottom: 10px;
                            }

                            .receipt-details div {
                                display: flex;
                                justify-content: space-between;
                                margin-bottom: 5px;
                            }

                            .receipt-details div span {
                                font-weight: bold;
                            }

                            .receipt-footer {
                                text-align: center;
                                margin-top: 10px;
                                font-size: 10px;
                            }

                            .separator {
                                border-top: 1px dashed #000;
                                margin: 10px 0;
                            }
                        }

                        .receipt-header, .receipt-footer {
                            text-align: center;
                        }

                        .receipt-header p, .receipt-footer p {
                            margin: 0;
                        }

                        .receipt-details {
                            margin-top: 10px;
                        }

                        .receipt-details div {
                            display: flex;
                            justify-content: space-between;
                            margin-bottom: 5px;
                        }
                    </style>
                </head>
                <body>
                    <div class="receipt">
                        <div class="receipt-header">
                            <p>KLINIK KURNIA MEDIKA</p>
                            <p>Ruko, Jl. Green Leaf Residence No.1 Blok A</p>
                            <p>Mekarsari, Rajeg, Tangerang</p>
                            <p>Banten - Telp: 08111250031</p>
                        </div>

                        <div class="separator"></div>

                        <div class="receipt-details">
                                <p><strong>No Registrasi:</strong> ${noReg}</p>
                                <p><strong>Nama Pasien:</strong> ${nama}</p>
                                <p><strong>Pilih Layanan:</strong> ${poli}</p>
                                <p><strong>Total Harga:</strong> Rp. ${harga}</p>
                                <!-- Additional information based on service -->
                                ${poli === 'umum' ? `<p><strong>Obat Farmasi:</strong> ${obat}</p>` : ''}
                                ${poli === 'gigi' ? `<p><strong>Jenis Perawatan Gigi:</strong> ${perawatan}</p>` : ''}
                                ${poli === 'bidan' ? `<p><strong>Layanan Bidan:</strong> ${layananBidan}</p>` : ''}
                                ${poli === 'lab' ? `<p><strong>Jenis Pemeriksaan Lab:</strong> ${layananLab}</p>` : ''}
                            </div>

                        <div class="separator"></div>

                        <div class="receipt-footer">
                            <p>TANGERANG, {{ date('d-M-Y H:i') }}</p>
                            <p>Terima Kasih</p>
                        </div>
                    </div>
                </body>
            </html>
            `);
                            
    printWindow.document.close(); // Close the document
    printWindow.print(); // Open the print dialog
}
    </script>
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