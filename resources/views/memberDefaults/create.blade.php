@extends('layouts.master')

@include('shared.sidebar')
@include('shared.topbar')
@include('shared.footer')

@section('heading')
Member Defaults
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<form action="/memberDefaults" method="POST">

    <div class="form-group">
        <label>Select Category </label>
        <select class="form-control @error('member_category') is-invalid 
             @enderror" name="member_category">
            <option value="">Select Category</option>
            <option value="Student">Student</option>
            <option value="Faculty">Faculty</option>
            <option value="Staff">Staff</option>
        </select>
        @error('member_category')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Enter Max Books</label>
        <input type="text" name="max_books" placeholder="Max Books" value="{{old('max_books')}}" class="form-control @error('max_books') is-invalid 
                 @enderror">
        @error('max_books')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Enter Max Days</label>
        <input type="text" name="max_days" placeholder="Max Days" value="{{old('max_days')}}" class="form-control @error('max_days') is-invalid 
                 @enderror">
        @error('max_days')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Enter Fine Amount </label>
        <input type="text" name="fine_amount" placeholder="Fine Amount" value="{{old('fine_amount')}}" class="form-control @error('fine_amount') is-invalid 
             @enderror">
        @error('fine_amount')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
    @csrf

</form>

@endsection