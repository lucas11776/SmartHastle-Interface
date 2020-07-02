@extends('layouts.authentication')
@section('content')
    <div class="card o-hidden border-0 shadow-lg col-sm-8 col-md-6 col-lg-4 mt-5 mb-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-12">
                    <div class="p-2 pt-4 pb-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">
                                <i class="fas fa-envelope"></i> Verify Your Email Address.
                            </h1>
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif
                            <p>
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }}.
                            </p>
                            <form class="d-inline"
                                  method="POST"
                                  action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                        class="btn btn-primary btn-user btn-block mb-1 text-uppercase">
                                    <i class="fas fa-mouse-pointer"></i> {{ __('Click here to request another') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container d-none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
