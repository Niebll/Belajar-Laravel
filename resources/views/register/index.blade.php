@extends('layouts.main')

@section('content')

<div class="row justify-content-center d-flex align-items-center" style="height: 80vh;">
        <div class="col-md-4 mt-4">
            <main class="form-signin w-100 m-auto">
                <div class="div">
                <form action="/register/add-user" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="text-center">
                    <img src="images/logo.png" alt="" style="height: 50vh;">
                        <h1 class="h3 mb-3 fw-normal">Sign Up</h1>
                </div>                    <div class="form-floating">
                        <input name="name" type="text" class="form-control" id="floatingInput" placeholder="name">
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating mt-1 mb-1">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="checkbox mb-3">
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
                    <p class="mt-3" style="text-align: center">have an account? <a href="/login" ><b>Sign In Here</b></a></p>
                </form>
                </div>
            </main>
        </div>
    </div>


@endsection
