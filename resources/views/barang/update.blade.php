@extends('layouts.master')
@section('section-header','Data Barang')
@section('content-section-body')
<div class="card">
            <div class="card-body">
            @if (@session('pesan'))
            <div class="alert alert-success">
                <p>{{ session('pesan') }}</p>
            </div>
            @endif
                <!-- <h5 class="card-title">Special title treatment</h5> -->
                <div class="row">
                    <div class="col-md-12">
                    <form method="POST" action="{{route('barang.update',$data->id_barang)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                            <label>Kode Barang</label>
                            <input type="text" name="kode" readonly="" class="form-control" value="{{$data->id_barang}}" >
                        </div>
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama" value="{{$data->nama_barang}}" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                            @error('nama')
                                <h6 class="text-danger">{{ $message }}</h6>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input type="number" value="{{$data->harga}}" name="harga" class="form-control" id="inlineFormInputGroup">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{$data->stok}}" id="inlineFormInputGroup" min="1">
                        </div>
                        <div id="foto">
                            <label>Priview Foto</label>
                            <br>
                            <!-- <input type="number" class="form-control" id="formGroupExampleInput2" min="1"> -->
                            <img src="{{asset('img/barang/'.$data->foto)}}" class="img-thumbnail" alt="..." width="300">
                        </div>
                        <div class="form-group">
                            <label>Foto Baru</label>
                            <input type="file" name="foto" class="form-control" id="inlineFormInputGroup" >
                            <!-- <input type="number" class="form-control" id="formGroupExampleInput2" min="1"> -->
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    </div>
                </div>
            </div>
</div>
@endsection