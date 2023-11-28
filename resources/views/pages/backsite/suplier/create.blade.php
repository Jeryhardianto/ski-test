@extends('layouts.app')
@section('title', 'Tambah Data Suplier')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data Suplier</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                            <li class="breadcrumb-item active">Tambah Data Suplier</li>
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
                     <form action="{{ route('suplier.store') }}" method="POST">
                      @csrf
                      <div class="form-group row">
                        <label for="kodesuplier" class="col-sm-2 col-form-label">Kode Suplier</label>
                        <div class="col-sm-10">
                          <input type="kodesuplier" name="kodesuplier" class="form-control @if ($errors->has('kodesuplier'))is-invalid @endif" id="kodesuplier" placeholder="Kode barang" value="{{ old('kodesuplier') }}">
                          @if ($errors->has('kodesuplier'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('kodesuplier') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="namasuplier" class="col-sm-2 col-form-label">Nama Suplier</label>
                        <div class="col-sm-10">
                          <input type="text" name="namasuplier" class="form-control @if ($errors->has('namasuplier'))is-invalid @endif " id="namasuplier" placeholder="Nama barang" value="{{ old('namasuplier') }}">
                          @if ($errors->has('namasuplier'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('namasuplier') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>

                 
                      <div class="form-group row">
                        <div class="col-sm-10">
                         <a href="{{ route('suplier.index') }}" class="btn btn-danger">Kembali</a>
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
