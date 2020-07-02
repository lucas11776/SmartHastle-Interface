@extends('layouts.authentication')
@section('content')
    <div class="card o-hidden border-0 shadow-lg col-sm-8 col-md-6 col-lg-4 col-xl-3 mt-5 mb-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-12">
                    <div class="p-2 pt-4 pb-4">
                        @if (session('status'))
                            <div class="alert alert-success"
                                 role="alert">
                                {{ session('status') }}
                            </div>
                        @else
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">
                                    <i class="fas fa-key"></i> Rest Password.
                                </h1>
                            </div>
                        @endif
                        <form class="user"
                              method="POST"
                              action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <input id="email"
                                       type="text"
                                       class="form-control form-control-user @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       placeholder="Email address."
                                       autocomplete="email"
                                       autofocus>
                                @error('email')
                                <span class="invalid-feedback"
                                      role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit"
                                            class="btn btn-primary btn-user btn-block">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small"
                               href="{{ route('login') }}">
                                <i class="fas fa-link"></i> I remember my password.
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
