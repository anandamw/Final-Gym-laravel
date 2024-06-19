@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
        <ul class="ms-auto ps-0 mb-0 list-unstyled d-flex justify-content-center">
            <li>
                <a href="index.html" class="text-decoration-none">
                    <i class="ri-home-2-line" style="position: relative; top: -1px"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Table Rekapitulasi</span>
            </li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card bg-white border-0 rounded-10 mb-4">
                <div class="card-body p-4">
                    <div class="mb-3 d-flex align-items-center justify-content-between  ">
                        <div>
                            <div class="pointer" data-bs-toggle="modal" data-bs-target="#exampleModal4">Scanner</div>
                            <h4 class="fs-18 ">Tabel Rekapitulasi</h4>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            Admin : {{ auth()->user()->name }}
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <video id="preview" width="400px" style="border-radius: 1rem;"></video>
                                    </div>

                                    {{-- scanner create --}}
                                    <form id="form">
                                        @csrf
                                        <input type="hidden" name="name" id="name">
                                        <input type="hidden" name="email" id="email">
                                        <input type="hidden" name="kategori_paket" id="kategori_paket">
                                        <input type="hidden" name="nomer_whatsapp" id="nomer_whatsapp">
                                        <button type="hidden" id="submit-btn">Submit</button>
                                    </form>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger text-white"
                                            data-bs-dismiss="modal">Close</button>
                                        {{-- <button type="button" class="btn btn-primary text-white">Save changes</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="/rekapitulasi/tambah" class="btn btn-success text-white ">Tambah Rekapitulasi</a>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel"
                            aria-labelledby="preview-tab" tabindex="0">
                            <div class="default-table-area members-list">
                                <div class="table-responsive">
                                    <table class="table align-middle text-center" id="myTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                {{-- <th scope="col">Code</th> --}}
                                                <th scope="col">Nama</th>
                                                <th scope="col">Kategori Paket</th>
                                                <th scope="col">harga paket</th>
                                                <th scope="col">Waktu Dibuat</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataRekap as $get)
                                                <tr>
                                                    <td><span>{{ $loop->iteration }}</span></td>
                                                    {{-- <td>
                                                        <span>{{ $get->customer }}</span>
                                                    </td> --}}
                                                    <td>
                                                        <span> {{ $get->name }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span> {{ $get->kategori_paket }} </span>
                                                    </td>
                                                    <td>
                                                        <span>Rp, {{ $get->harga_paket }} </span>
                                                    </td>
                                                    <td>
                                                        <span> {{ $get->created_at }} </span>
                                                    </td>
                                                    {{-- <td>
                                                        <div class="dropdown action-opt">
                                                            <button class="btn bg p-0" type="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i data-feather="more-horizontal"></i>
                                                            </button>
                                                            <ul
                                                                class="dropdown-menu dropdown-menu-end bg-white border box-shadow">

                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="/rekapitulasi-paket/{{ $get->id }}/update">
                                                                        <i data-feather="edit-3"></i>
                                                                        Edit
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:;">
                                                                        <i data-feather="download"></i>
                                                                        Detail
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:;">
                                                                        <i data-feather="trash-2"></i>
                                                                        Hapus
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script>
        $name = document.getElementById('name');
        $email = document.getElementById('email');
        $kategori_paket = document.getElementById('kategori_paket');
        $nomer_whatsapp = document.getElementById('nomer_whatsapp');

        $(document).ready(function() {
            // Function to scan data (mock function for demonstration purposes)
            function scanData() {
                // Simulate scanning data
                return {
                    name: $name,
                    email: $email,
                    kategori_paket: $kategori_paket,
                    nomer_whatsapp: $nomer_whatsapp
                };
            }

            $('#submit-btn').click(function(e) {
                e.preventDefault();

                // Get scanned data
                var scannedData = scanData();

                // Set the hidden input fields with scanned data
                $('#name').val(scannedData.name);
                $('#email').val(scannedData.email);
                $('#kategori_paket').val(scannedData.kategori_paket);
                $('#nomer_whatsapp').val(scannedData.nomer_whatsapp);

                // Collect form data
                var formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    kategori_paket: $('#kategori_paket').val(),
                    nomer_whatsapp: $('#nomer_whatsapp').val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                };

                // Send AJAX request
                $.ajax({
                    url: "{{ route('store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $('#success-message').show();
                        $('#error-message').hide();
                    },
                    error: function(response) {
                        var errors = response.responseJSON.errors;
                        var errorMessage = '<ul>';
                        $.each(errors, function(key, value) {
                            errorMessage += '<li>' + value + '</li>';
                        });
                        errorMessage += '</ul>';
                        $('#error-message').html(errorMessage).show();
                        $('#success-message').hide();
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
@endsection
