<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>


    <video id="preview"></video>

    @if (session()->has('invalid'))
        <h1>gagal</h1>
    @endif

    @if (session()->has('success'))
        <h1>success</h1>
    @endif


    <form action="{{ route('store') }}" method="POST" id="form">
        @csrf
        <input type="text" name="customer" id="customer">

    </form>



    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        scanner.addListener('scan', function(content) {
            console.log(content);
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan', function(c) {
            document.getElementById('customer').value = c;
            document.getElementById('form').submit();
        })
    </script>
</body>

</html>
