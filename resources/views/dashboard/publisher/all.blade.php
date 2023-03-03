@extends('dashboard.layout.main')

@section('content')

    <div class="main mt-2"><h2>Publisher List</h2></div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role='alert'>
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="container container-fluid">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($publishers as $publisher)
            <tr>
                <th scope="row">{{ $publisher['id'] }}</th>
                <td>{{ $publisher->nama }}</td>
                <td>{{ $publisher->email }}</td>
                <td>{{ $publisher->alamat }}</td>
                <td>
                    <a href="/dashboard/publisher/{{ $publisher->nama }}" class="btn btn-primary">Detail</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
            </div>  
    </div>
@endsection
