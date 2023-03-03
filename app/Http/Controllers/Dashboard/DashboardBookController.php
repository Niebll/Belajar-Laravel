<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardBookController extends Controller
{
    public function index()
    {
        return view('dashboard.book.all', [
            'publishers' => Publisher::all(),
            'books' => Book::filter(request(['search', 'publisher_id']))->paginate(5),
        ]);
    }

    public function show(Book $book)
    {
        return view('dashboard.book.detail', [
            'book' => $book
        ]);
    }

    public function create()
    {
        return view('dashboard.book.create', [
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
        return redirect('/dashboard/book/all')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy(Book $book)
    {
        Book::destroy($book->id);
        return redirect('/dashboard/book/all')->with('success', 'Data berhasil dihapus');
    }

    public function edit(Book $book){
        return view('dashboard.book.edit', [
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
        return redirect('dashboard/book/all')->with('success', 'Data berhasil diubah');
    }
}