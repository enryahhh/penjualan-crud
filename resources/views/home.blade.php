@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-3">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Secondary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Secondary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="row justify-content-center">
        @include('layouts.navbar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} , Role : {{Auth::user()->role}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
