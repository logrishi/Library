@extends('layouts.master')

@include('shared.sidebar')
@include('shared.topbar')
@include('shared.footer')

@section('heading')
Create Issue
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<form action="/issue" method="POST">

    <div id="app">
        <issue-check-acsno></issue-check-acsno>
    </div>
    {{-- <p id="res"></p> --}}

    <button type="submit" class="button-btn btn-success">Submit</button>
    @csrf
</form>

@endsection