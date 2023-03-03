@extends('layouts.main')

@section('content')
<div class="main mt-2"><h2>Book List</h2></div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role='alert'>
            {{ session()->get('success') }}
        </div>
    @endif
    <form action="/book/all" class="row">
                <div class="col-md-4">
                    <select name="publisher_id" value="0" id="" class="form-control form-select rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option name='publisher_id' value="0">All Publisher</option>
                        @foreach ($publishers as $publisher)
                            @if(request('publisher_id') == $publisher->id)
                                <option name='publisher_id' value="{{ $publisher->id }}" selected>{{ $publisher->nama }}</option>
                            @else
                                <option name='publisher_id' value="{{ $publisher->id }}">{{ $publisher->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
        
                    <div class="col-md-6">
                        <input type="search" name="search" value="{{ request()->input('search') }}" class="form-control w-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Search">
                    </div>
                    <button type='submit' class='col-md-2 btn btn-dark'>
                        {{ __('Search') }}
                    </button>
            </form>
    <div class="container container-fluid">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Harga</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
            <tr>
                <th scope="row">{{ $book['id'] }}</th>
                <td>{{ $book->nama }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex">
                {!! $books->links() !!}
            </div>  
    </div>
@endsection
