@extends('layouts.app')
@section('title', 'Pembelian')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pembelian</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                            <li class="breadcrumb-item active">Pembelian</li>
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
                     <form action="{{ route('beli.store') }}" method="POST">
                      @csrf
                      <div class="form-group row">
                        <label for="notransaksi" class="col-sm-2 col-form-label">No Transaksi</label>
                        <div class="col-sm-10">
                          <input type="notransaksi" name="notransaksi" class="form-control @if ($errors->has('notransaksi'))is-invalid @endif" id="notransaksi"  value="{{ old('notransaksi', $notransaksi) }}" readonly>
                          @if ($errors->has('notransaksi'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('notransaksi') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="suplier" class="col-sm-2 col-form-label">Nama Suplier</label>
                        <div class="col-sm-10">
                          <select name="suplier" id="suplier" class="form-control @if ($errors->has('suplier'))is-invalid @endif">
                            <option value="0">-- Pilih Suplier --</option>
                            @foreach ($supliers as $suplier)
                            <option value="{{ $suplier->kode_suplier }}">{{ $suplier->kode_suplier }}-{{ $suplier->nama_suplier }}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('suplier'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('suplier') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tanggal_beli" class="col-sm-2 col-form-label">Tanggal Beli</label>
                        <div class="col-sm-10">
                          <input type="date" name="tanggal_beli" class="form-control @if ($errors->has('tanggal_beli'))is-invalid @endif " id="tanggal_beli" value="{{ old('tanggal_beli') }}">
                          @if ($errors->has('tanggal_beli'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tanggal_beli') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="namabarang" class="col-sm-2 col-form-label">Nama barang</label>
                        <div class="col-sm-10">
                          <select name="namabarang" id="namabarang" class="form-control @if ($errors->has('namabarang'))is-invalid @endif">
                            <option value="0">-- Pilih Nama Barang --</option>
                            @foreach ($barangs as $br)
                            <option value="{{ $br->kode_barang }}">{{ $br->kode_barang }}-{{ $br->nama_barang }}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('namabarang'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('namabarang') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="hargabeli" class="col-sm-2 col-form-label">Harga Beli</label>
                        <div class="col-sm-10">
                          <input type="number" name="hargabeli" class="form-control @if ($errors->has('hargabeli'))is-invalid @endif " id="hargabeli" value="{{ old('hargabeli') }}" placeholder="Harga beli">
                          @if ($errors->has('hargabeli'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('hargabeli') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="qty" class="col-sm-2 col-form-label">Qty</label>
                        <div class="col-sm-10">
                          <input type="number" name="qty" class="form-control @if ($errors->has('qty'))is-invalid @endif " id="qty" value="{{ old('qty') }}" placeholder="Qty">
                          @if ($errors->has('qty'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('qty') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="diskon" class="col-sm-2 col-form-label">Diskon(%)</label>
                        <div class="col-sm-10">
                          <input type="number" name="diskon" class="form-control @if ($errors->has('diskon'))is-invalid @endif " id="diskon" value="{{ old('diskon') }}" placeholder="Diskon(%)">
                          @if ($errors->has('diskon'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('diskon') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="subtotal" class="col-sm-2 col-form-label">Sub Total</label>
                        <div class="col-sm-10">
                          <input type="number" name="subtotal" class="form-control @if ($errors->has('subtotal'))is-invalid @endif " id="subtotal" value="{{ old('subtotal') }}" readonly placeholder="Sub Total">
                      
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="total" class="col-sm-2 col-form-label">Total</label>
                        <div class="col-sm-10">
                          <input type="number" name="total" class="form-control @if ($errors->has('total'))is-invalid @endif " id="total" value="{{ old('total') }}" placeholder="Total" readonly>
                          @if ($errors->has('total'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('total') }}</strong>
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
@push('javascript-internal')
<script>
    $('#hargabeli, #qty').on('change', function() {
      var hargabeli = $('#hargabeli').val();
      var qty = $('#qty').val();
      if (hargabeli && qty) {
        var subtotal = (hargabeli * qty);
        $('#subtotal').val(subtotal);
      }
    });

    $('#diskon').on('change', function() {
      var subtotal = $('#subtotal').val();
      var diskon = $('#diskon').val();
      if (subtotal && diskon) {
        var total = (subtotal * diskon / 100);
        $('#total').val(total);
      }
    });

</script>
@endpush
