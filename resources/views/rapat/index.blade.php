@extends('layouts.master')
<div class="page-heading">
    <h3>Data Hasil Rapat</h3>
</div> 
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Hasil Rapat</h3>
               
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Hasil Rapat</li>
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
                            <th>Tanggal</th>
                            <th>Tempat</th>
                            <th>Judul</th>
                            <th>Agenda</th>
                            <th>Dipimpin</th>
                            <th>sekertaris</th>
                            <th>Rapat Dibuka</th>
                            <th>Rapat Ditutup</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rapat as $item)
                            
                        <tr>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->tempat }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->agenda }}</td>
                            <td>{{ $item->dipimpin }}</td>
                            <td>{{ $item->sekertaris}}</td>
                            <td>{{ $item->rapat_dibuka}}</td>
                            <td>{{ $item->rapat_ditutup}}</td>
                            <td>
                                <a class="btn btn-warning modalRapat" data-bs-toggle="modal"
                                data-bs-target="#modalEdit" data-id="{{ $item->judul }}" data-hasil="{{ $item->hasil }}"> <i class="fas fa-pen"></i></a>
                                
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
     <!--Basic Modal -->
     <div class="modal fade text-left" id="modalTambah" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel1">Tambah Data Rapat</h5>
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
                                    <form action="./rapat/tambah" method="post" enctype="multipart/form-data">
                                         @csrf
                                         <div class="form-group">
                                             <label for="basicInput">Tanggal</label>
                                             <input  name="tanggal" type="date" class="form-control" id="basicInput" >
                                         </div>
                 
                                         <div class="form-group">
                                             <label for="helpInputTop">Tempat</label>
                                             <input  name="tempat" type="text" class="form-control" id="helpInputTop">
                                         </div>
                 
                                         <div class="form-group">
                                            <label for="helpInputTop">Judul</label>
                                            <input  name="judul" type="text" class="form-control" id="helpInputTop">
                                        </div>
                                        <div class="form-group">
                                            <label for="helpInputTop">Dibuka</label>
                                            <input  name="rapat_dibuka" type="time" class="form-control" id="helpInputTop">
                                        </div>
                                        <div class="form-group">
                                            <label for="helpInputTop">Hasil</label>
                                            <textarea name="hasil" class="form-control" ></textarea>
                                            
                                        </div>
                                        
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="disabledInput">Agenda</label>
                                             <input  name="agenda" type="text" class="form-control" id="disabledInput" >
                                         </div>
                                         <div class="form-group" >
                                             <label for="helperText">Dipimpin</label>
                                             <input name="dipimpin" type="text"  class="form-control" >
                                         </div>
                                         <div class="form-group" >
                                            <label for="helperText">Jabatan Pimpinan</label>
                                            <input name="jabatan_pimpinan" type="text"  class="form-control" >
                                        </div>
                                         <div class="form-group" >
                                             <label for="helperText">Sekertaris</label>
                                             <input name="sekertaris" type="text"  class="form-control" >
                                         </div>
                                         <div class="form-group" >
                                            <label for="helperText">Jabatan Sekertaris</label>
                                            <input name="jabatan_sekertaris" type="text"  class="form-control" >
                                        </div>
                                        <div class="form-group" >
                                            <label for="helperText">Ditutup</label>
                                            <input name="rapat_ditutup" type="time"  class="form-control" >
                                        </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </section>
                 
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
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
      <div class="modal fade text-left" id="modalEdit" tabindex="-1" role="dialog"
      aria-labelledby="myModalLabel_rapat" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel1_rapat">Edit Data Rapat</h5>
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
                                     <form action="" method="post" enctype="multipart/form-data" id="formRapat">
                                          @csrf
                                          <div class="form-group">
                                            <label for="helpInputTop" ><span id="idrapat"></span><span id=""></span></label>
                             
                                        </div>
                                         <div class="form-group">
                                             <label for="helpInputTop">Hasil</label>
                                             <textarea name="hasil" class="form-control" id="hasil"></textarea>
                                         </div>
                                         
                                         <div class="form-group">
                                            <label for="file">Pilih Foto</label>
                                            <input name="photo" type="file" id="file" class="form-control">
                                        </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </section>
                  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger ms-1" data-bs-dismiss="modal"
                      aria-label="Close">
                      
                      Close
                  </button>
                      {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                          <i class="bx bx-x d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Close</span>
                      </button> --}}
                      <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal_rapat">
                          <i class="bx bx-check d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Simpan</span>
                      </button>
                  </div>
                  </form>
          </div>
      </div>
 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
 <script>
     $(document).ready(function () {
         $(document).on('click', '.modalRapat', function () {
             var idrapat = $(this).data('id');
             
        var hasil = $(this).data('hasil');
             $('#idrapat').text(idrapat);
             $('#hasil').text(hasil);
 
             var actionUrl = './rapat/' + idrapat + '/update';
             $('#formRapat').attr('action', actionUrl);
 
        });
    });
</script>
    @endsection
