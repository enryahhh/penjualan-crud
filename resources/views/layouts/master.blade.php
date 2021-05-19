@extends('layouts.app')
@section('content')
<div class="main-wrapper">
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('section-header')</h1>
          </div>

          <div class="section-body">
                @yield('content-section-body')
          </div>
        </section>
      </div>
</div>

@endsection