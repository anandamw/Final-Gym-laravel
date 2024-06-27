<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('') }}assets/css/sweetalert.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets_users/css/form.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets_users/css/style.css" />
</head>

<body>
    {{-- @include('sweetalert::alert') --}}

    <div class="container">
        <div class="container-form">
            <form method="POST" action="/daftar/member">
                @csrf
                <h1 class="member">Daftar Membersip</h1>
                <label class="label" for="name">Name</label>
                <input type="text" name="name" id="name" required />
                <label class="label" for="email">Email</label>
                <input type="text" name="email" id="email" />
                <label class="label" for="nomer_whatsapp">Nomer Whatsapp</label>
                <input type="text" name="nomer_whatsapp" id="nomer_whatsapp" />

                <input type="hidden" name="status" value="pending" id="nomer_whatsapp" />

                <label class="label" for="nomer_whatsapp">Pilih Pakets</label>
                <select name="pakets_id" id="">
                    <option disabled>No Selected</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->id }}">{{ $item->kategori_paket }} = {{ $item->harga_paket }}
                        </option>
                    @endforeach
                </select>

                <button type="submit">submit</button>
            </form>

            <div class="images"
                style="background: url('{{ asset('') }}assets_users/images/bg-form.jpg'); width: 500px;
    height: 550px;
    background-position: center;
    background-size: cover;
    border-radius: 20px;">
            </div>
        </div>
    </div>

</body>

</html>
