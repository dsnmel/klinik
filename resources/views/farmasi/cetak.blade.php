<!DOCTYPE html>
<html lang="en">
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
    <h1>Data Pendaftaran Farmasi</h1>
    <p><strong>No Registrasi:</strong> {{ $no_reg }}</p>
    <p><strong>Nama Lengkap:</strong> {{ $nama }}</p>
    <p><strong>Layanan:</strong> {{ $poli }}</p>
    <p><strong>Total Harga:</strong> Rp {{ $harga }}</p>
</div>

        <div class="separator"></div>

        <div class="receipt-footer">
            <p>TANGERANG, {{ date('d-M-Y H:i') }}</p>
            <p>Terima Kasih</p>
        </div>
    </div>

    <script>
    window.onload = function() {
        window.print();
        // Redirect ke halaman dokter setelah cetak selesai
        window.onafterprint = function() {
            window.location.href = "{{ url('/farmasi') }}"; // Redirect kembali ke halaman farmasi
        };
    };
</script>
</body>
</html>
