<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('') }}assets_users/css/style.css" />
</head>

<body>
    <nav class="container header-top">
        <div class="header">
            <a href="">+62 87740505052</a>
            <div style="color: white">|</div>
            <a href="">maxgym@gmail.com</a>
        </div>
    </nav>

    <div class="container nav-top">
        <div class="navbar">
            <h1>MaxGym</h1>

            <ul class="ul-list">
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="/daftar/member">Member</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="/logout">Logout</a></li>
                <li>
                    <a href="">
                        <img src="{{ asset('') }}assets_users/images/admin.png" alt="" />
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container main">
        <div class="cover"
            style="background: url('{{ asset('') }}assets_users/images/bg-form.jpg') no-repeat; background-
     height: 600px; background-position: center;
        background-size: cover; background-position-y: -70px;">
        </div>
        <div class="list">Price List</div>

        <div class="card">
            <ul class="ul-card">

                @foreach ($getData as $item)
                    <li class="list-card">
                        <a href="/daftar/member" style="color: white; text-decoration: none; ">
                            <h2>{{ $item->kategori_paket }}</h2>
                            <p>Rp. {{ $item->harga_paket }}</p>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>

        <div class="list"></div>


        <div class="container ">
            <div class="maps">
                <div class="list-contact">
                    <ul>
                        <li><a href="">Nama : Adminus</a></li>
                        <li><a href="">Email : Adminus@gmail.com</a></li>
                        <li><a href="">Nomer Telepon : 087740505052</a></li>
                    </ul>
                </div>
                <a href="https://maps.app.goo.gl/cffVRjiRbpne9CiD7
">
                    <img src="{{ asset('') }}assets_users/images/maps.png" width="450" alt="">
                </a>
            </div>
        </div>


        <footer class="container">
            <div class="footer">
                <h1>MaxGym</h1>


                <ul>
                    <li><a
                            href="https://www.instagram.com/maxgymptk?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">Instagram</a>
                    </li>
                    <li><a href="https://id-id.facebook.com/maxgymmalang/">Facebook</a></li>
                    <li><a href="https://www.youtube.com/live/tMUxHx5fatA?si=Yc2lBYUwKVCQS0u3">Youtube</a></li>
                </ul>
            </div>
        </footer>

    </div>
</body>

</html>
