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
                   <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Table Customer</span>
               </li>
           </ul>
       </div>
       <div class="row justify-content-center">
           <div class="col-lg-12">
               <div class="card bg-white border-0 rounded-10 mb-4">
                   <div class="card-body p-4">
                       <div class="mb-3 d-flex align-items-center justify-content-between  ">
                           <h4 class="fs-18 ">Tabel Customer</h4>
                           <a href="/customer/create" class="btn btn-success text-white ">Tambah Customer</a>
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
                                                   <th scope="col">Qr Code</th>
                                                   <th scope="col">Nama</th>
                                                   <th scope="col">Nomer WhatsApp</th>
                                                   <th scope="col">Email</th>
                                                   {{-- <th scope="col">Paket</th> --}}
                                                   <th scope="col">Status</th>
                                                   <th scope="col">Date</th>
                                                   <th scope="col">Actions</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               @foreach ($dataCustomer as $get)
                                                   <tr>
                                                       <td>
                                                           <span>{{ $loop->iteration }}</span>
                                                       </td>
                                                       <td>
                                                           <span>

                                                               {!! QrCode::size(150)->generate($get->token_customer) !!}
                                                           </span>

                                                       </td>

                                                       <td>
                                                           <span>{{ $get->name }}</span>
                                                       </td>
                                                       <td>
                                                           <span>{{ $get->nomer_whatsapp }}</span>
                                                       </td>
                                                       <td>
                                                           <span>{{ $get->email }}</span>
                                                       </td>
                                                       {{-- <td>
                                                           <span>{{ $get->pakets_id }}</span>
                                                       </td> --}}
                                                       <td>
                                                           <span>
                                                               @if ($get->status == 'pending')
                                                                   <div class="btn btn-warning text-white"
                                                                       data-bs-toggle="modal"
                                                                       data-bs-target="#exampleModa5{{ $get->token_customer }}">
                                                                       Pending </div>

                                                                   <!-- Modal -->
                                                                   <div class="modal fade"
                                                                       id="exampleModa5{{ $get->token_customer }}"
                                                                       tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                       aria-hidden="true">
                                                                       <div class="modal-dialog modal-dialog-centered">
                                                                           <div class="modal-content">
                                                                               <div class="modal-header">
                                                                                   <h1 class="modal-title fs-5"
                                                                                       id="exampleModalLabel">Modal title
                                                                                   </h1>
                                                                                   <button type="button" class="btn-close"
                                                                                       data-bs-dismiss="modal"
                                                                                       aria-label="Close"></button>
                                                                               </div>
                                                                               <div class="modal-body">
                                                                                   {{ $get->name }}

                                                                                   <form method="POST"
                                                                                       action="/customer/{{ $get->token_customer }}/scannerstore">
                                                                                       @csrf

                                                                                       <input type="text"
                                                                                           name="token_customer"
                                                                                           value="{{ $get->token_customer }}"
                                                                                           id="token_customer">





                                                                               </div>
                                                                               <div class="modal-footer">
                                                                                   {{-- <button type="button"
                                                                                       class="btn btn-danger text-white"
                                                                                       data-bs-dismiss="modal">Close</button> --}}
                                                                                   <button type="submit"
                                                                                       class="btn btn-primary text-white">Save
                                                                                       changes</button>
                                                                                   </form>
                                                                               </div>
                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                               @elseif ($get->status == 'invalid')
                                                                   <div class="btn btn-danger text-white"> Invalid </div>
                                                               @elseif ($get->status == 'success')
                                                                   <div class="btn btn-success text-white"> Success </div>
                                                               @endif
                                                           </span>
                                                       </td>

                                                       <td>
                                                           <span> {{ $get->created_at }} </span>
                                                       </td>
                                                       <td>
                                                           <div class="dropdown action-opt">
                                                               <button class="btn bg p-0" type="button"
                                                                   data-bs-toggle="dropdown" aria-expanded="false">
                                                                   <i data-feather="more-horizontal"></i>
                                                               </button>
                                                               <ul
                                                                   class="dropdown-menu dropdown-menu-end bg-white border box-shadow">

                                                                   <li>
                                                                       <a class="dropdown-item"
                                                                           href="customer/{{ $get->id }}/detail">
                                                                           <i data-feather="download"></i>
                                                                           Detail
                                                                       </a>
                                                                   </li>
                                                                   <li>
                                                                       <a class="dropdown-item"
                                                                           href="customer/{{ $get->token_customer }}/update">
                                                                           <i data-feather="edit-3"></i>
                                                                           Edit
                                                                       </a>
                                                                   </li>
                                                                   <li>
                                                                       <button type="button" class="dropdown-item"
                                                                           data-bs-toggle="modal"
                                                                           data-bs-target="#exampleModal4{{ $get->token_customer }}">
                                                                           <i data-feather="trash-2"></i>
                                                                           Hapus
                                                                       </button>
                                                                   </li>
                                                               </ul>
                                                           </div>
                                                       </td>
                                                   </tr>

                                                   <!-- Modal -->
                                                   <div class="modal fade" id="exampleModal4{{ $get->token_customer }}"
                                                       tabindex="-1" aria-labelledby="exampleModalLabel"
                                                       aria-hidden="true">
                                                       <div class="modal-dialog modal-dialog-centered">
                                                           <div class="modal-content">
                                                               <div class="modal-header">
                                                                   <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                       Hapus data</h1>
                                                                   <button type="button" class="btn-close"
                                                                       data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                               <div class="modal-body">
                                                                   Yakin menghapus data "{{ $get->name }}"
                                                               </div>
                                                               <div class="modal-footer">
                                                                   <button type="button" class="btn btn-danger text-white"
                                                                       data-bs-dismiss="modal">Close</button>
                                                                   <a href="/customer/{{ $get->token_customer }}/delete"
                                                                       class="btn btn-primary text-white">Delete</a>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
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
   @endsection
