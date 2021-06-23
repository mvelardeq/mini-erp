@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>
                {{ __('Please confirm your password before continuing.') }}

                <form method="POST" action="{{ route('password.confirmp') }}">
                    @csrf
                    <div class="card-body">


                            <div class="form-group row">
                                <label for="password" class="col-lg-3 col-form-label">{{ __('Contraseña') }}</label>

                                <div class="col-lg-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

{{--
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">

                                </div>
                            </div> --}}
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
