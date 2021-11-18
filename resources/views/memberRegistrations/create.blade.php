@extends('layouts.master')

@include('shared.sidebar')
@include('shared.topbar')
@include('shared.footer')

@section('heading')
Member Registrations
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<form action="/memberRegistrations" method="POST">

    <div class="form-group">
        <label>Enter Registration / Roll No</label>
        <input type="text" name="registration_no" placeholder="Registration / Roll No"
            value="{{old('registration_no')}}" class="form-control @error('registration_no') is-invalid 
                 @enderror">
        @error('registration_no')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Enter Member Name</label>
        <input type="text" name="member_name" placeholder="Member Name" value="{{old('member_name')}}" class="form-control @error('member_name') is-invalid 
             @enderror">
        @error('member_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Select Category </label>
        <select class="form-control @error('member_category_id') is-invalid 
             @enderror" name="member_category_id">
            <option value="">Select Category</option>
            @foreach ($memberCategory as $category)
            <option value="{{$category->id}}" @if (old('category')==$category->id) selected="selected"
                @endif>{{$category->member_category}}</option>
            @endforeach
        </select>
        @error('member_category')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Enter Phone No </label>
        <input type="text" name="phone" placeholder="Phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid 
             @enderror">
        @error('phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Enter Other Details</label>
        <input type="text" name="details" placeholder="Details" value="{{old('details')}}" class="form-control @error('details') is-invalid 
             @enderror">
        @error('details')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
    @csrf

</form>

@endsection