@extends('layouts.master')

@include('shared.sidebar')
@include('shared.topbar')
@include('shared.footer')

@section('heading')
Books
@endsection

@section('content')
@section('content')

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Sl No</th>
            <th>Book Name</th>
            <th>Author Name(s)</th>
            <th>Copies</th>
        </tr>
    </thead>
    <tbody>
        @php
        $bookCount = 0;
        @endphp
        @foreach($books as $book)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $book->book_name }}</td>
            <td>
                @foreach($book->authors as $author)
                {{ $author->author_name }}<br />
                @endforeach
            </td>
            <td>
                @foreach($book->bookCopies as $copy)
                {{ $copy->accession_no }}<br />
                @php
                $bookCount = $loop->count
                @endphp
                @endforeach
                <p>Total Books: {{$bookCount}}</p>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection