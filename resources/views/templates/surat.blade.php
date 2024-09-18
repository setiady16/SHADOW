<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 0;
            font-size: 18px;
        }
        .content {
            margin-bottom: 40px;
        }
        .barcode {
            text-align: right;
        }
        .footer {
            text-align: right;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Surat Resmi</h1>
    <p>{{ $tanggal }}</p>
</div>

<div class="content">
    <p>Kepada Yth,</p>
    <p>{{ $penerima }}</p>
    <p>{{ $isi_surat }}</p>
</div>

<div class="barcode">
    <img src="{{ asset($barcode) }}" alt="Barcode" style="width: 150px;">
</div>

<div class="footer">
    <p>Hormat kami,</p>
    <p>{{ $pengirim }}</p>
</div>

</body>
</html>
