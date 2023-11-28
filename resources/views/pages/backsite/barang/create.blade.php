@extends('layouts.app')
@section('title', 'Tambah Data Barang')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data Barang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                            <li class="breadcrumb-item active">Tambah Data Barang</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div> --}}
                    <!-- /.card-header -->

                    <div class="card-body">
                     <form action="{{ route('barang.store') }}" method="POST">
                      @csrf
                      <div class="form-group row">
                        <label for="kodebarang" class="col-sm-2 col-form-label">Kode Barang</label>
                        <div class="col-sm-10">
                          <input type="kodebarang" name="kodebarang" class="form-control @if ($errors->has('kodebarang'))is-invalid @endif" id="kodebarang" placeholder="Kode barang" value="{{ old('kodebarang') }}">
                          @if ($errors->has('kodebarang'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('kodebarang') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="namabarang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                          <input type="text" name="namabarang" class="form-control @if ($errors->has('namabarang'))is-invalid @endif " id="namabarang" placeholder="Nama barang" value="{{ old('namabarang') }}">
                          @if ($errors->has('namabarang'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('namabarang') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group row">
                       <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                       <div class="col-sm-10">
                         <input type="text" name="satuan" class="form-control @if ($errors->has('satuan'))is-invalid @endif" id="satuan" placeholder="Satuan" value="{{ old('satuanbarang') }}">
                         @if ($errors->has('satuan'))
                         <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('satuan') }}</strong>
                         </span>
                         @endif
                       </div>
                     </div>

                     <div class="form-group row">
                      <label for="hargabeli" class="col-sm-2 col-form-label">Harga Beli</label>
                      <div class="col-sm-10">
                        <input type="number" name="hargabeli" class="form-control @if ($errors->has('hargabeli'))is-invalid @endif" id="hargabeli" placeholder="Harga beli" value="{{ old('hargabeli') }}">
                        @if ($errors->has('hargabeli'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('hargabeli') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    
                    
                      <div class="form-group row">
                        <div class="col-sm-10">
                         <a href="{{ route('barang.index') }}" class="btn btn-danger">Kembali</a>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>
                     
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- END: Content-->

@endsection
