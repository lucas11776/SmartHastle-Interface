@extends('layouts.authentication')
@section('content')
    <div class="card o-hidden border-0 shadow-lg col-sm-8 col-md-6 col-lg-4 col-xl-3 mt-5 mb-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-12">
                    <div class="p-2 pt-4 pb-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">
                                <i class="fas fa-thumbs-up"></i> Confirm Password.
                            </h1>
                        </div>
                        <form class="user"
                              method="POST"
                              action="{{ route('password.confirm') }}">
                            @csrf
                            <div class="form-group">
                                <input id="password"
                                       type="password"
                                       class="form-control form-control-user @error('password') is-invalid @enderror"
                                       name="password"
                                       required
                                       autocomplete="current-password"
                                       placeholder="Confirm password."
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit"
                                        class="btn btn-primary btn-user btn-block">
                                    {{ __('Confirm Password') }}
                                </button>
                            </div>
                        </form>
                        <hr>
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="small"
                                   href="{{ route('password.request') }}">
                                    <i class="fas fa-link"></i> Forgot Your Password.
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
