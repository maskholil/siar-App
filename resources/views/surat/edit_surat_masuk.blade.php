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
                        data-bs-target="#default"><i class="fas fa-plus"></i> Tambah Data</button></div>
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
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat_masuk as $item)
                            
                        <tr>
                            <td>{{$item->nomor_agenda}}</td>
                            <td>{{$item->nomor_surat}}</td>
                            <td>{{$item->tanggal_surat}}</td>
                            <td>{{$item->tanggal_masuk}}</td>
                            <td>{{$item->pengirim}}</td>
                            <td>{{$item->kaprodi->nama_kaprodi}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td>{{$item->file}}</td>
                            <td>
                                <a class="btn btn-warning" href="./surat_masuk/{{$item->id}}/edit"> <i class="fas fa-pen" ></i></a>
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
    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Basic Modal</h5>
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
                                    <form action="../{{$surat_masuk->id}}/update" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="basicInput">Nomor Agenda</label>
                                            <input  name="nomor_agenda" type="text" class="form-control" id="basicInput" placeholder="nomor_agenda" value="{{$surat_masuk->nomor_agenda}}">
                                        </div>
                
                                        <div class="form-group">
                                            <label for="helpInputTop">Nomor Surat</label>
                                            <input  name="nomor_surat" type="text" class="form-control" id="helpInputTop" value="{{$surat_masuk->nomor_surat}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="helpInputTop">Tanggal Surat</label>
                                            <input  name="tanggal_surat" type="date" class="form-control" value="{{$surat_masuk->tanggal_surat}}">
                                        </div>
                                        
                
                
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="helperText">Pengirim</label>
                                            <input name="pengirim" type="text" id="helperText" class="form-control" value="{{$surat_masuk->pengirim}}">
                                        </div>
                                        <div class="form-group" >
                                            <label for="helperText">Tanggal Masuk</label>
                                            <input name="tanggal_masuk" type="date" id="helperText" class="form-control" value="{{$surat_masuk->tanggal_masuk}}">
                                        </div>
                                        <div class="form-group" >
                                            <label for="helperText">Kepada</label>
                                            <input name="kepada" type="text" id="helperText" class="form-control" value="{{$surat_masuk->kepada}}">
                                        </div>
                                        <div class="form-group" >
                                            <label for="helperText">Keterangan</label>
                                            <input name="keterangan" type="text" id="helperText" class="form-control" value="{{$surat_masuk->keterangan}}">
                                        </div>
                                        <div class="form-group" >
                                            <label for="formFile">File</label>
                                            <input name="pdf" type="file" id="formFile" class="form-control" value="{{$surat_masuk->pdf}}">
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
@endsection