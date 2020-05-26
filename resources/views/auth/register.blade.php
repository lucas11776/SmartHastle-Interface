@extends('layouts.authentication')

@section('content')
    <div class="row justify-content-center">
        <div class="card o-hidden border-0 shadow-lg col-sm-6 col-md-4">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-12">
                        <div class="p-2 pt-4 pb-4">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="first_name"
                                               type="text"
                                               class="form-control form-control-user @error('first_name') is-invalid @enderror"
                                               name="first_name"
                                               value="{{ old('first_name') }}"
                                               required
                                               placeholder="Name."
                                               autocomplete="first_name">
                                        @error('first_name')
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="last_name"
                                               type="text"
                                               class="form-control form-control-user @error('last_name') is-invalid @enderror"
                                               name="last_name"
                                               value="{{ old('last_name') }}"
                                               required
                                               placeholder="Surname."
                                               autocomplete="last_name">
                                        @error('last_name')
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="email"
                                           type="text"
                                           class="form-control form-control-user @error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required
                                           placeholder="Surname."
                                           autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback"
                                          role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password"
                                               type="password"
                                               class="form-control form-control-user @error('password') is-invalid @enderror"
                                               name="password"
                                               value="{{ old('password') }}"
                                               required
                                               placeholder="Password.">
                                        @error('password')
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="password_confirmation"
                                               type="password"
                                               class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                                               name="password_confirmation"
                                               value="{{ old('password_confirmation') }}"
                                               required
                                               placeholder="Password confirmation.">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback"
                                              role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit"
                                        class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small"
                                   href="{{ url('forgot/password')  }}">
                                    Forgot Password?
                                </a>
                            </div>
                            <div class="text-center">
                                <a class="small"
                                   href="{{ url('login') }}">
                                    Already have an account? Login!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
