@extends('layouts.master')

@include('shared.sidebar')
@include('shared.topbar')
@include('shared.footer')

@section('heading')
issues
@endsection

@section('content')

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Accession No</th>
            <th>Registration No</th>
            <th>Issue Date</th>
            <th>Is Returned</th>
            <th>Return Date</th>
            <th>Due Date</th>
            <th>Fine</th>
            {{-- <th colspan="4" style="text-align : center">Actions</th> --}}
        </tr>
    </thead>
    <tbody>
        {{-- <th><a href="http://laravel/issue?sortBy={{ 1-Input::get('sortBy') }}">Issue No</a></th> --}}


        @foreach($issues as $issue)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $issue->accession_no }}</td>
            <td>{{ $issue->registration_no }}</td>
            <td>{{ date("d-m-Y", strtotime($issue->issue_date)) }}</td>
            <td>
                @if($issue->is_returned)
                Returned
                @else
                Not Returned
                @endif
            </td>
            <td>
                @if($issue->return_date!=0)
                {{ date("d-m-Y", strtotime($issue->return_date)) }}
                @else
                --
                @endif
            </td>
            <td>
                @if($issue->due_date!=0)
                {{ date("d-m-Y", strtotime($issue->due_date)) }}
                @else
                --
                @endif
            </td>
            <td>
                @if($issue->return_date!=0)
                @if ($issue->fine_generated!=0)
                {{$issue->fine_generated}}
                @else
                --
                @endif
                @else
                --
                @endif
            </td>

            {{-- <td>{{$issue->fine_generated}}</td> --}}
            {{-- <td>
                <a href="{{ route('issues.edit', $issue->id) }}">Edit</a>
            </td>
            <td>
                <a href="{{ route('issues.show', $issue->id) }}">Details</a>
            </td>
            <td>
                <a href="{{ route('issues.destroy', $issue->id) }}">Delete</a>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>

@endsection