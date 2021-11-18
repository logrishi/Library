@extends('layouts.master')

@include('shared.sidebar')
@include('shared.topbar')
@include('shared.footer')

@section('heading')
Member Defaults
@endsection

@section('content')

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Member Category</th>
            <th>Max Books</th>
            <th>Max Days</th>
            <th>Fine Amount</th>
        </tr>
    </thead>
    <tbody>

        @foreach($members as $member)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $member->member_category }}</td>
            <td>{{ $member->max_books }}</td>
            <td>{{ $member->max_days }}</td>
            <td>{{ $member->fine_amount }}</td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection