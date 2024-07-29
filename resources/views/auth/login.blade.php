@extends('layouts.auth')
@section('content')
    <style>
        /* Custom CSS */
        body {
            background-color: #f0f0f0;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .bg-gradient-primary {
    background-color: #000000;
    background-image: linear-gradient(180deg, #ffffff 10%, #ffffff 100%);
    background-size: cover;
}

        .text-center h1 {
            color: #53cc43;
            font-weight: bold;
            animation: fadeInDown 1s;
        }

        .btn-primary {
            background-color: #53cc43;
            border-color: #53cc43;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #53cc43;
            transform: scale(1.05);
        }

        .form-control {
            border-radius: 10px;
            transition: box-shadow 0.3s ease-in-out;
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgba(78, 115, 223, 0.25);
        }

        .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
            background-color: #53cc43;
        }

        .btn-link {
            color: #53cc43;
            transition: color 0.3s ease-in-out;
        }

        .btn-link:hover {
            color: #53cc43;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4">Welcome To Login!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" class="user" autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        {{-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div> --}}
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                        {{-- <a class="small" href="forgot-password.html">Forgot Password?</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
