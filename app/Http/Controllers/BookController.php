<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookOldmodel;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BookController extends Controller
{
    public function index()
    {
        
        return view('book.all', [
            'publishers' => Publisher::all(),
            'books' => Book::filter(request(['search', 'publisher_id']))->paginate(8),
        ]);
    }

    public function show(Book $book)
    {
        return view('book.detail', [
            'book' => $book
        ]);
    }

    public function create()
    {
        return view('book.create', [
            'publishers' => Publisher::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'publisher_id' => 'required',
            'nama' => 'required|max:255',
            'author' => 'required|max:255',
            'price' => 'required',
            'release' => 'required',
        ]);

        Book::create($validateData);
        return redirect('/book/all')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy(Book $book)
    {
        Book::destroy($book->id);
        return redirect('/book/all')->with('success', 'Data berhasil dihapus');
    }

    public function edit(Book $book){
        return view('book.edit', [
            'book' => $book,
            'publishers' => Publisher::all()
        ]);
    }

    public function update(Request $request, Book $book){
        $validateDate = $request->validate([
            'publisher_id' => 'required',
            'nama' => 'required|max:255',
            'author' => 'required|max:255',
            'price' => 'required',
            'release' => 'required',
        ]);

        Book::where('id', $book->id)
            ->update($validateDate);
        return redirect('/book/all')->with('success', 'Data berhasil diubah');
    }
}

