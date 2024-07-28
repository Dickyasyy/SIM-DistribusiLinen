<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Linen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            display: none;
        }
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .header div {
            width: 48%; /* Adjust to make both divs take up the full width of the container */
        }
        .footer {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        }
        .signature-box {
            border: 1px solid #000;
            height: 100px;
            width: 45%; /* Atur lebar kotak tanda tangan */
            position: relative; /* Mengatur posisi relatif untuk pengaturan internal */
        }
        .signature-text {
            text-align: center;
            margin-top: 5px; /* Ubah margin sesuai kebutuhan */
            position: absolute; /* Mengatur posisi absolut untuk tetap di atas kotak */
            width: 100%; /* Menyesuaikan lebar dengan kotak tanda tangan */
            bottom: 5px; /* Mengatur jarak dari bawah kotak */
        }
        .left {
            float: left; /* Mengatur kotak di sebelah kiri */
        }
        .right {
            float: right; /* Mengatur kotak di sebelah kanan */
        }
        @media print {
            .footer {
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
            }
            .signature-box {
                border: 1px solid #000;
                height: 100px;
                width: 45%; /* Atur lebar kotak tanda tangan untuk cetak */
                display: inline-block; /* Membuat kotak tanda tangan inline */
            }
            .signature-text {
                text-align: center;
                margin-top: 110px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div>
                <h5>Nama Petugas: {{ $linenKotor->nama_petugas }}</h5>
                <h5>No Pinta: {{ $linenKotor->no_pinta }}</h5>
                <h5>Unit Peminta: {{ $linenKotor->unit_peminta }}</h5>
            </div>
            <div>
                <h5>Unit Pemberi: {{ $linenKotor->unit_pemberi }}</h5>
                <h5>Tanggal Entry: {{ $linenKotor->tanggal_entry }}</h5>
                <h5>Status: {{ $linenKotor->status }}</h5>
            </div>
        </div>
        <!-- Tabel Linen -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Jenis Linen</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($linenKotor->users as $user)
                    <tr>
                        <td>{{ $user->pivot->jenis_linen }}</td>
                        <td>{{ $user->pivot->jumlah }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Footer -->
        <div class="footer">
            <div class="signature-box left">
                <p class="signature-text">TTD Kepala Bidang (Permintaan)</p>
            </div>
            <div class="signature-box right">
                <p class="signature-text">TTD Kepala Bidang (Pengeluaran)</p>
            </div>
        </div>
    </div>
</body>
</html>
