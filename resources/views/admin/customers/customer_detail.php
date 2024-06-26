<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Customer Detail</h1>
    <p><strong>Name:</strong> <?php echo $dataCustomer->name; ?></p>
    <p><strong>Email:</strong> <?php echo $dataCustomer->email; ?></p>
    <p><strong>WhatsApp Number:</strong> <?php echo $dataCustomer->nomer_whatsapp; ?></p>
    <p><strong>Package Category:</strong> <?php echo $dataCustomer->kategori_paket; ?></p>
    <!-- Menampilkan QR Code -->
    <!-- {{-- <img src="data:image/png;base64,{{ $dataCustomer->qrCode }}" alt="QR Code"> --}} -->

    <?php echo $dataCustomer->qrCode  ?>

    <!-- Tambahkan elemen HTML lainnya sesuai kebutuhan -->

</body>

</html>