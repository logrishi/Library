@extends('layouts.master')

@include('shared.sidebar')
@include('shared.topbar')
@include('shared.footer')

@section('heading')
Member Registrations
@endsection

@section('content')

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Registration No / Roll No</th>
            <th>Member Name</th>
            <th>Member Category</th>
            <th>Phone</th>
            <th>details</th>
        </tr>
    </thead>
    <tbody>

        @foreach($members as $member)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $member->registration_no }}</td>
            <td>{{ $member->member_name }}</td>
            <td>{{ $member->memberDefaults->member_category}}</td>
            <td>{{ $member->phone }}</td>
            <td>{{ $member->details }}</td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection