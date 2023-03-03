@extends('layouts.main')




</style>
@section('content')
<div class="align-items-middle">
    <div class="row justify-content-center d-flex align-items-center" style="height: 80vh;">
        <div class="col-md-4">
            <main class="form-signin w-100 m-auto">
                <form action="/login" method="POST">
                    @csrf
                    <div class="text-center">
                    <img src="images/logo.png" alt="" style="height: 50vh;">
                        <h1 class="h3 mb-3 fw-normal">Sign In</h1>
                </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="checkbox mb-3">
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    <p class="mt-3" style="text-align: center">Dont have an account?  <a href="/register" ><b>Sign up Here</b></a></p>
                </form>
            </main>
        </div>
    </div>

</div>

@endsection
