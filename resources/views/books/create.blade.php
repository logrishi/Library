@extends('layouts.master')

@include('shared.sidebar')
@include('shared.topbar')
@include('shared.footer')

@section('heading')
Books
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<form action="/books" method="POST">
    <div class="form-group">
        <label>Enter Book Name</label>
        <input type="text" name="book_name" placeholder="Book Name" value="{{old('book_name')}}" class="form-control @error('book_name') is-invalid 
             @enderror">
        @error('book_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Enter No of Copies</label>
        <input type="text" name="copies" placeholder="Copies" value="{{old('copies')}}" class="form-control @error('copies') is-invalid 
             @enderror">
        @error('copies')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Enter Author Name</label>
        <input type="text" name="author_name[]" placeholder="Author Name" class="form-control @error('author_name[]') is-invalid 
             @enderror" value="{{old('author_name.0')}}">
        @error('author_name[]')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div id="app">
        <author-component></author-component>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
    @csrf
</form>

@endsection