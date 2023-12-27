@extends('layouts.master')
<div class="page-heading">
    <h3>Data Surat Masuk</h3>
</div> 
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Surat Masuk</h3>
               
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Surat Masuk</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-3"><button class=" btn btn-primary rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#modalTambah"><i class="fas fa-plus"></i> Tambah Data</button></div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No Agenda</th>
                            <th>No Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Tanggal Masuk</th>
                            <th>Pengirim</th>
                            <th>Kepada</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratMasuk as $item)
                            
                        <tr>
                            <td>{{$item->nomor_agenda}}</td>
                            <td>{{$item->nomor_surat}}</td>
                            <td>{{$item->tanggal_surat}}</td>
                            <td>{{$item->tanggal_masuk}}</td>
                            <td>{{$item->pengirim}}</td>
                            <td>{{$item->kaprodi->nama_kaprodi}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td>
                                <a class="btn btn-warning btn-open-modal" data-bs-toggle="modal"
                                   data-bs-target="#modalEdit" data-id="{{ $item->id }}"> <i class="fas fa-pen"></i></a>
                                <a class="btn btn-warning" data-bs-toggle="modal"
                                   data-bs-target="#modalEdit"> <i class="fas fa-file-pdf"></i></a>
                                   <form id="delete-form-{{$item->id}}" action="./surat_masuk/{{ $item->id }}/hapus" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                
                                
                            </td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
    <!--Basic Modal -->
    <div class="modal fade text-left" id="modalEdit" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="myModalLabel1">Basic Modal</h5> --}}
                <h4 class="modal-title" >ID Surat Masuk <span id="idSuratMasuk"></span></h4>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Inputs</h4>
                        </div>
            
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="post" enctype="multipart/form-data" id="formSuratMasuk">
                                        
                                        @csrf
                                        <div class="form-group">
                                            <label for="basicInput">Nomor Agenda</label>
                                            <input  name="nomor_agenda" id="nomor_agenda" type="text" class="form-control" placeholder="nomor_agenda">
                                        </div>
                
                                        <div class="form-group">
                                            <label for="helpInputTop">Nomor Surat</label>
                                            <input  name="nomor_surat" type="text" class="form-control" id="nomor_surat">
                                        </div>
                                        <div class="form-group">
                                            <label for="helpInputTop">Tanggal Surat</label>
                                            <input  name="tanggal_surat" id="tanggal_surat" type="date" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="helperText">Pengirim</label>
                                            <input name="pengirim" type="text" id="pengirim" class="form-control">
                                        </div>
                                        <div class="form-group" >
                                            <label for="helperText">Tanggal Masuk</label>
                                            <input name="tanggal_masuk" type="date" id="tanggal_masuk" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="helperText">Kepada </label>
                                            <select name="kepada" id="kepada" class="form-control form-select">
                                                @foreach ($kaprodi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_kaprodi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        </div>
                                        <div class="form-group" >
                                            <label for="helperText">Keterangan</label>
                                            <input name="keterangan" type="text" id="keterangan" class="form-control">
                                        </div>
                                        <div class="form-group" >
                                            <label for="formFile">File</label>
                                            <input name="pdf" type="file" id="file" class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </section>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
                </form>
        </div>
     </div>
</div>
</div>
<!--Basic Modal -->
<div class="modal fade text-left" id="modalTambah" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Tambah Data Surat Masuk</h5>
            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="modal-body">
            <section class="section">
                <div class="card">        
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="./surat_masuk/tambah" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="basicInput">Nomor Agenda</label>
                                        <input  name="nomor_agenda" type="text" class="form-control" id="basicInput" placeholder="nomor_agenda">
                                    </div>
            
                                    <div class="form-group">
                                        <label for="helpInputTop">Nomor Surat</label>
                                        <input  name="nomor_surat" type="text" class="form-control" id="helpInputTop">
                                    </div>
                                    <div class="form-group">
                                        <label for="helpInputTop">Tanggal Surat</label>
                                        <input  name="tanggal_surat" type="date" class="form-control" >
                                    </div>
                                    
            
            
                                   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label for="helperText">Pengirim</label>
                                        <input name="pengirim" type="text" id="helperText" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label for="helperText">Tanggal Masuk</label>
                                        <input name="tanggal_masuk" type="date" id="helperText" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label for="helperText">Kepada</label>
                                        <select name="kepada" class="form-control form-select " id="">
                                        @foreach ($kaprodi as $item)
                                        <option value="{{$item->id}}">{{$item->nama_kaprodi}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group" >
                                        <label for="helperText">Keterangan</label>
                                        <input name="keterangan" type="text" id="helperText" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label for="formFile">File</label>
                                        <input name="pdf" type="file" id="formFile" class="form-control">
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Simpan</span>
                </button>
            </div>
            </form>
    </div>
 </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.btn-open-modal', function () {
            var idSuratMasuk = $(this).data('id');
            $('#idSuratMasuk').text(idSuratMasuk);

            var actionUrl = './surat_masuk/' + idSuratMasuk + '/update';
            $('#formSuratMasuk').attr('action', actionUrl);

            $.ajax({
                url: './get_data/' + idSuratMasuk, //Gantilah dengan url yang sesuai
                type: 'GET',
                success: function(data){
                    $('#nomor_agenda').val(data.nomor_agenda);
                    $('#nomor_surat').val(data.nomor_surat);
                    $('#tanggal_surat').val(data.tanggal_surat);
                    $('#tanggal_masuk').val(data.tanggal_masuk);
                    $('#pengirim').val(data.pengirim);
                    $('#kepada').val(data.kepada);
                    $('#keterangan').val(data.keterangan);
                    $('#file').val(data.file);
                }
            })
            // Menampilkan ID dalam modal
        });
    });
</script>
@endsection
