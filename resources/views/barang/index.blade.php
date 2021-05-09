@extends('barang.master')
@section('content-barang')
<h5 class="card-header">Data Barang</h5>

            <div class="card-body">
            @if (@session('pesan'))
            <div class="alert alert-success">
                <p>{{ session('pesan') }}</p>
            </div>
            @endif
                <!-- <h5 class="card-title">Special title treatment</h5> -->
                <div class="row justify-content-between">
                    <div class="col-sm-3">
                        <a href="{{route('barang.excel')}}" class="btn btn-warning">Excel</a>
                    </div>

                    <div class="col-sm-3">
                        <a href="{{route('barang.create')}}" class="btn btn-primary">Tambah Barang</a>
                    </div>
                </div>
                <!-- end row tombol -->
                <br>
                <table class="table table-bordered mt-2" id="barang-datatable">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
@endsection
@push('scripts')
    {{--$dataTable->scripts()--}}
    <script type="text/javascript">
  $(function () {
    
     $('#barang-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('barang.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_barang', name: 'kode'},
            {data: 'nama_barang', name: 'nama_barang'},
            {data: 'harga', name: 'harga'},
            {data: 'stok', name: 'stok'},
            {data:'img',name:'img'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ],
        
    });
    
  });
</script>
@endpush
