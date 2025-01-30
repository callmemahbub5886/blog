@extends('layouts.app')

@section('auth')
    <div class="row justify-content-center">
        <div class="col-xl-4 col-md-5">
            <div class="card">
                <div class="card-body p-4">

                    <div class="text-center w-75 mx-auto auth-logo mb-4">
                        <a class='logo-dark' href='index.html'>
                            <span><img src="{{ asset('dashboard') }}/assets/images/logo-dark.png" alt=""
                                    height="22"></span>
                        </a>

                        <a class='logo-light' href='index.html'>
                            <span><img src="{{ asset('dashboard') }}/assets/images/logo-light.png" alt=""
                                    height="22"></span>
                        </a>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="emailaddress">Email address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <a class='text-muted float-end' href='pages-recoverpw.html'><small></small></a>
                            <label class="form-label" for="password">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <a class='text-muted float-end' href='pages-recoverpw.html'><small></small></a>
                            <label class="form-label" for="password">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                            name="password_confirmation">
                        </div>

                        <div class="form-group mb-3">
                            <div class="">
                                <input class="form-check-input" type="checkbox" id="checkbox-signin" required>
                                <label class="form-check-label ms-2" for="checkbox-signin">I agree to the <a href="#">Terms and Conditions</a></label>
                            </div>
                        </div>

                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary w-100" type="submit"> Sign Up </button>
                        </div>

                    </form>
                </div> </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-white-50">Already have an account ? <a class='text-white font-weight-medium ms-1'
                            href='{{ route('login') }}'>Log In</a></p>
                </div> </div>
            </div> </div>
@endsection