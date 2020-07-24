@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-6" style="margin-top:9%">
            <div class="card" style="-webkit-box-shadow: 11px 19px 35px -4px rgba(139,144,145,1);
-moz-box-shadow: 11px 19px 30px -4px rgba(139,144,145,1);
box-shadow: 11px 19px 30px -4px rgba(139,144,145,1);">
                <div class="card-header" style="text-align: center;
    font-size: x-large;
    font-family: inherit;
    background-color: #000;
    color: #fff;">{{ __('Gapeksindo Jaya Bersama') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('Email') }}</label>

                            <div class="col-md-8">
                                <input id="employee_email" type="email" class="form-control @error('employee_email') is-invalid @enderror" name="employee_email" value="{{ old('employee_email') }}" required autocomplete="email" autofocus>

                                @error('employee_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-left">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="text-align: center;font-family: unset;padding-left: 15%;padding-right: 15%;font-weight: 600;}">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
