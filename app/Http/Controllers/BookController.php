<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\BookCopies;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateAuthorBook;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $books = Book::with('authors')->get();
        $copies = Book::with('bookCopies')->get();
        // return $copies;
        if ($request->is('api/*')) {
            return response()->json($books);     ///// for RN App
        }
        return view('books.index', compact('books', 'copies'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(validateAuthorBook $request)
    {
        $validated = $request->validated();
        if ($validated) {
            $book = new Book();
            $book->book_name = $request->book_name;
            $book->save();

            $authors = $request->author_name;
            for ($i = 0; $i < count($authors); $i++) {
                // $author = new Author();
                // $author->author_name = $authors[$i];             // normal method .. inserts all authors
                // $author->save();
                // $book->authors()->attach($author);

                $author = Author::firstOrCreate(                   // inserts only new authors. excludes existing ones :)
                    ['author_name' => $authors[$i]]
                );
                $author->save();
                $book->authors()->attach($author);
            }

            $copies = $request->copies;

            for ($i = 1; $i <= $copies; $i++) {
                $copy = new BookCopies();
                $copy->book_id = $book->id;
                // $copy->book_id = $book->id;
                $copy->save();
            }
        }
        return back()->with('status', 'Insert Successful!');
    }

    public function show(Book $book)
    {
        //
    }

    public function edit(Book $book)
    {
        //
    }

    public function update(Request $request, Book $book)
    {
        //
    }

    public function destroy(Book $book)
    {
        //
    }
    public function validateBookInputs()
    {
        return request()->validate([
            'book_name' => 'required'
        ]);
    }
    public function validateAuthorInputs()
    {
        return request()->validate([
            'author_name' => 'required'
        ]);
    }
}