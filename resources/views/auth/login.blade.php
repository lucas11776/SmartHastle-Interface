@extends('layouts.authentication')

@section('content')
    <div class="card o-hidden border-0 shadow-lg col-sm-8 col-md-6 col-lg-4 col-xl-3 mt-5 mb-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-12">
                    <div class="p-2 pt-4 pb-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">SmartHassle </h1>
                        </div>
                        <form class="user"
                              method="POST"
                              action="{{ route('login')  }}">
                            @csrf
                            <div class="form-group">
                                <input id="email"
                                       type="text"
                                       class="form-control form-control-user @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       placeholder="Email address."
                                       autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback"
                                      role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password"
                                       type="password"
                                       class="form-control form-control-user @error('password') is-invalid @enderror"
                                       name="password"
                                       required
                                       placeholder="Password."
                                       autocomplete="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           name="remember"
                                           id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                                </div>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                        <hr>
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="small"
                                   href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            </div>
                        @endif
                        <div class="text-center">
                            <a class="small"
                               href="{{ route('register') }}">
                                Create an Account!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
