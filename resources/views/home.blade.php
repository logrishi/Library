@extends('layouts.master')

@include('shared.sidebar')
@include('shared.topbar')
@include('shared.footer')

@section('heading')
Home
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<div class="container">
    <div class=" justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection