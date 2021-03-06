@extends('layouts.app')

@section('content')

    <body id="login">
        <div class="container text-center" style="color: antiquewhite;
        font-weight: bold;
        font-size: 34px; background:rgb(117, 90, 39); border-radius:2rem">
            <p>MTS MATHLA'UL ANWAR</p>
            <p>BUARAN JATI KAB. TANGERANG</p>
        </div>
        <div class="container" style="padding: 10rem; margin-top:-4rem">
            {{-- Title --}}
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="border: 1px solid #c98200; border-radius: 2rem">
                        <div class="card-header text-center" style="font-weight: bold; background:#755a27;"><span
                                style="font-size: 20px; font-family:monospace; color:whitesmoke">Login</span></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn"
                                            style="background:#755a27; color:whitesmoke">
                                            Login
                                        </button>

                                        {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
