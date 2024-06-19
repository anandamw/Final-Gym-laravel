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
                <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Validation Form</span>
            </li>
        </ul>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card bg-white border-0 rounded-10 mb-4">
                <div class="card-body p-4">
                    <h4 clas s="fs-18 mb-4">Form Paket</h4>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="preview-tab-pane" role="tabpanel"
                            aria-labelledby="preview-tab" tabindex="0">
                            <form class="row g-3 needs-validation" method="POST"
                                action="/paket/{{ $getPakets->token_paket }}/update" novalidate>
                                @csrf
                                <div class="col-md-6">
                                    <label for="kategori_paket" class="form-label label">Kategori Paket </label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control h-58 ps-5" id="kategori_paket"
                                            name="kategori_paket" value="{{ $getPakets->kategori_paket }}"
                                            placeholder="Kategori Paket..." required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <i class="ri-user-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20"
                                            style="top: 13px !important"></i>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="harga_paket" class="form-label label">Harga Paket </label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control h-58 ps-5" id="harga_paket"
                                            name="harga_paket" value="{{ $getPakets->harga_paket }}"
                                            placeholder="Harga Paket" required />
                                        <div class="valid-feedback">Looks good!</div>
                                        <i class="ri-user-line position-absolute top-0 start-0 fs-20 text-gray-light ps-20"
                                            style="top: 13px !important"></i>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value id="invalidCheck" required />
                                        <label class="form-check-label" for="invalidCheck">
                                            Agree to terms and conditions
                                        </label>

                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary fw-semibold text-white py-2 px-3" type="submit">
                                        Submit Form
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-grow-1"></div>

        <footer class="footer-area bg-white text-center rounded-top-10">
            <p class="fs-14">
                © <span class="text-primary">Farol</span> is Proudly Owned by
                <a href="https://hibootstrap.com/" target="_blank" class="text-decoration-none">HiBootstrap</a>
            </p>
        </footer>
    @endsection
