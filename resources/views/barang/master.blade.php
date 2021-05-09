@section('content')

@extends('layouts.app')

<div class="container">

<div class="row">
    @include('layouts.navbar')
    <div class="col-md-8">
        <div class="card">
            @yield('content-barang')
        </div>        
    </div>
</div>
</div>


@endsection