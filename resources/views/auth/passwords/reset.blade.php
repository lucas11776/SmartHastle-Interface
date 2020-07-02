@extends('layouts.authentication')
@section('content')
    <div class="card o-hidden border-0 shadow-lg col-sm-8 col-md-6 col-lg-4 col-xl-3 mt-5 mb-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-12">
                    <div class="p-2 pt-4 pb-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">
                                <i class="fas fa-key"></i> Reset Password.
                            </h1>
                        </div>
                        <form class="user"
                              method="POST"
                              action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden"
                                   name="token"
                                   value="{{ $token }}">
                            <div class="form-group">
                                <div class="mb-3">
                                    <input id="email"
                                           type="email"
                                           class="form-control form-control-user @error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ $email ?? old('email') }}"
                                           required
                                           autocomplete="email"
                                           autofocus
                                           placeholder="Email address."
                                    @error('email')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <input id="password"
                                           type="password"
                                           class="form-control form-control-user @error('password') is-invalid @enderror"
                                           name="password"
                                           required
                                           autocomplete="new-password"
                                           placeholder="New password."
                                    @error('password')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="password-confirm"
                                       type="password"
                                       class="form-control form-control-user"
                                       name="password_confirmation"
                                       required
                                       autocomplete="new-password"
                                       placeholder="Confirm password.">
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary btn-user btn-block">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
