@inject('categories', 'App\Category')
@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-pen-alt text-primary"></i> New Category
        </h1>
    </div>
    <div class="row justify-content-center pt-2 pb-4">
        <div class="col-md-10 col-lg-8 col-xl-6">
            <form method="POST"
                  action="{{ url('category') }}">
                @csrf
                <div class="form-group row">
                    <label for="name"
                           class="col-sm-4 col-form-label">
                        Name. <span class="text-danger" title="required">*</span>
                    </label>
                    <div class="col-sm-8">
                        <input id="name"
                               name="name"
                               placeholder="Category name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}"
                               type="text">
                        @error('name')
                        <span class="invalid-feedback"
                              role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-8 text-right">
                        <button name="submit" type="submit" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
